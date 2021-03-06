<?php 

// ZISTENIE CI MA USER ORDER V STAVE PROCESSING
function checkMyOrders($acc_id, $product_id){
	global $con;
	$sql = 'SELECT * FROM orders WHERE order_userid='.$acc_id.' AND order_status = "processing"';
	$run_data = mysqli_query($con, $sql);
	$rowcount = mysqli_num_rows($run_data);

	if($rowcount==1){
		// Prihlaseny user uz ma objednavku v processing stave, tj. chcem najprv najst cislo tej objednavky a potom do nej pridat novy produkt
		$order_id = getOrderId($acc_id);
		// Doplnim do orderDetails produkt
		addProductToOrderDetails($order_id, $acc_id, $product_id);

	}
	else{
		createNewOrder($acc_id, $product_id);

	}

}


// VYTVORENIE UPLNE NOVEJ OBJEDNAVKY
function createNewOrder($acc_id, $product_id){
	global $con;

	// Vloz hodnotu do tabulky orders - napln iba status na 'processing' a dopln kto objednava
	$sql = "INSERT INTO orders (order_userid, order_status) VALUES ('$acc_id','processing')";
	$run_data = mysqli_query($con, $sql);

	// Znova volaj rekurzivne funkciu checkMyOrders- teraz bude rowcount uz jedna vdaka zaciatku tejto funkcie, tj if statement sa vyhodnoti ako spravny, a zavola sa funkcia na pridanie produktu do orderu. 
	checkMyOrders($acc_id, $product_id);

}

// VLOZENIE PRODUKTU DO PROCESSING ORDERU USERA
function addProductToOrderDetails($order_id, $acc_id, $product_id){
	global $con;

	// Zisti cenu za kus a uloz do premennej $product_price
	$sql = "SELECT * FROM products WHERE pro_id = $product_id";
	$run_data = mysqli_query($con, $sql);
	$data = mysqli_fetch_array($run_data);
	$product_price = $data['pro_price'];
	
	// Zisti ci produkt uz neni linknuty na order v orderDetails
	$sql = "SELECT * FROM orderDetails WHERE details_orderid = $order_id AND details_accountid = $acc_id AND details_productid = $product_id";
	$run_data = mysqli_query($con, $sql);
	$rowcount = mysqli_num_rows($run_data);

	// Ak uz produkt je linknuty v orderDetials vypise info
	if($rowcount==1){
		header('Location: products.php?all&errorcode=duplicate');
	}
	else {
		// Vloz produkt do tabulky orderDetails
		$sql = "INSERT INTO orderDetails (details_orderid, details_accountid, details_productid, details_qnty, details_price) VALUES ('$order_id','$acc_id', '$product_id','1','$product_price')";
		$run_data = mysqli_query($con, $sql);

	}
}


function historyFetch($acc_id){
	global $con;
	$sql = "SELECT * FROM orders WHERE order_userid=$acc_id AND order_status='disbursed'";
	$run_data = mysqli_query($con, $sql);

	$rowcount = mysqli_num_rows($run_data);

	if($rowcount==0){
		header('Location: products.php?all&errorcode=nohistoryorder');
	}
	else {
		echo '
			<table class="table table-striped">
			    <thead>
			      <tr>
			      	<th>Order ID</th>
			      	<th>Total price</th>
			        <th>Timestamp</th>
			        <th>Ship address</th>
			        <th>Status</th>
			      </tr>
			    </thead>
			    <tbody>
		';

		while ($data = mysqli_fetch_array($run_data)){
			$order_id = $data['order_id'];
			$order_totalprice = $data['order_totalprice'];
			$order_ts = $data['order_timestamp'];
			$order_address = $data['order_shipaddress'];	
			$order_status = $data['order_status'];	
			echo '
				<tr>
			        <td>'.$order_id.'</td>
			        <td>'.$order_totalprice.' €</td>
			        <td>'.$order_ts.'</td>
			        <td>'.$order_address.'</td>
			        <td>'.$order_status.'</td>
			    </tr>
			';
		}

		echo '
			    </tbody>
			  </table>
		';
	}
}


// VRATI VSETKY POLOZKY KTORE ZAKAZNIK MA V AKTUALNEJ OBJEDNAVKE KT. JE V STATUSE PROCESSING
function fetchOrderProducts($acc_id){
	global $con;
	$increment=0;

	// zisti order_id z orders tabulky
	$order_id = getOrderId($acc_id);

	if($order_id>0){
		$sql = "SELECT products.pro_id, products.pro_name, products.pro_price, products.pro_desc, products.pro_image, brands.brand_name, orderDetails.details_qnty, orderDetails.details_price, orders.order_totalprice FROM products JOIN brands ON products.pro_brand = brands.brand_id JOIN orderDetails ON products.pro_id = orderDetails.details_productid JOIN orders ON orders.order_id = orderDetails.details_orderid WHERE orderDetails.details_accountid = $acc_id AND orders.order_status = 'processing'";
		$run_data = mysqli_query($con, $sql);

		// spocita kolko produktov sa nachadza v jednej objednavke
		$rowcount = mysqli_num_rows($run_data);

		echo '
			<h3>Order number: '.$order_id.'</h3>
			<h4>Number of products: '.$rowcount.'</h4>
		';
		// Horna cast table elementu
		echo '
			<div class="table-responsive order-table">
				<table class="table">
	                <thead>
	                    <tr>
	                        <th style="width: 50%;">Product</th>
	                        <th style="width: 10%;">Quantity</th>
	                        <th class="text-center" style="width: 10%;">Item price</th>
	                        <th class="text-center" style="width: 10%;">Total</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>
		';

		// Sekcia kde je loop ktory zobrazi vsetky produkty objednavky ako TABLE ROW <tr>

		while ($data = mysqli_fetch_array($run_data)){
			$increment++;
			$product_id = $data['pro_id'];
			$product_name = $data['pro_name'];
			$product_price = $data['pro_price'];
			$product_desc = $data['pro_desc'];	
			$product_image = $data['pro_image'];
			$brand_name = $data['brand_name'];
			$order_qnty = $data['details_qnty'];
			$order_subprice = $product_price * $order_qnty;

			$sql = "UPDATE orderDetails SET details_price = '$order_subprice' WHERE details_orderid = '$order_id' AND details_productid='$product_id'";
			$update_data= mysqli_query($con, $sql);


			echo '
					<tr>
                        <td class="col-sm-8 col-md-6">
                          <div class="media">
                          	<a class="media-left media-middle">
                              <img src="admin/product_images/'.$product_image.'" style="max-width: 100px; height:auto;">
                            </a>
                              <div class="media-body">
                                  <h4 class="media-heading"><span class="text-primary">'.$product_name.'</span></h4>
                                  <h5 class="media-heading"> by '.$brand_name.'</h5>
                                  <p>'.$product_desc.'</p>
                              </div>
                          </div>
                        </td>


                        <td class="col-md-1" style="text-align: center">
                        	<form method="post" id="quantity'.$increment.'" action="orders.php?update=true&order_id='.$order_id.'&product_id='.$product_id.'">
                        		 <input type="number" min=0 max=10 class="form-control text-center" name="qnty" value="'.$order_qnty.'"&>
							</form>
                        </td>
                        <td class="col-md-1 text-center"><strong>'.$product_price.' €</strong></td>
                        <td class="col-md-1 text-center"><strong>'.$order_subprice.' €</strong></td>
                        <td class="col-md-1">
                        <a href="orders.php?delete=true&order_id='.$order_id.'&product_id='.$product_id.'" class="btn btn-danger btn-block">
                            <span class="glyphicon glyphicon-remove"></span> Delete
                        </a>
                        <button class="btn btn-info btn-block" form="quantity'.$increment.'" type="submit">
                            <span class="glyphicon glyphicon-refresh"></span> Update
                        </button>

                        </td>
                    </tr>
			';
		}


		// Dolna cast table elementu
		$totalprice = calculateTotalePrice($order_id, $acc_id);
		echo '
						<tr>
	                        <td>   </td>
	                        <td>   </td>
	                        <td>   </td>
	                        <td><h3>Total</h3></td>
	                        <td class="text-right"><h3><strong>'.$totalprice.' €</strong></h3></td>
	                    </tr>
	                    <tr>
	                        <td> 
	                          <a class="btn btn-warning" href="products.php?all">Continue Shopping</a>
	                        </td>
	                        <td></td>
	                        <td></td>
	                        <td></td>
	                        <td>
	                        <a class="btn btn-success btn-block" href="checkout.php?acc_id='.$acc_id.'&order_id='.$order_id.'">Checkout</a>
	                        </td>
	                    </tr>
	                </tbody>
	            </table>
            </div>
		';

	}
	else{
		header('Location: products.php?all&errorcode=noorder');
	}
}


// SPOCITA SUMU VSETKYCH PRODUKTOV KTORE SU LINKNUTE PRE JEDNU OBJEDNAVKU
function calculateTotalePrice($order_id, $acc_id){
	global $con;
	$sql = "SELECT SUM(details_price) AS totalprice FROM orderDetails WHERE details_orderid = $order_id AND details_accountid = $acc_id";
	$run_data = mysqli_query($con, $sql);
	$data = mysqli_fetch_array($run_data);
	$totalprice = $data['totalprice'];

	// Updatene aj data aj v orders
	$sql = "UPDATE orders SET order_totalprice = $totalprice WHERE order_id = $order_id AND order_userid = $acc_id";
	$run_data = mysqli_query($con, $sql);

	// vrati celkovu sumu objednavky
	return $totalprice;

}


// VRATI CISLO OBJEDNAVKY PRE UZIVATELA, KTORA JE V STATUSE PROCESSING
function getOrderId($acc_id){
	global $con;

	$sql = "SELECT * FROM orders WHERE order_userid =  $acc_id AND order_status='processing'";
	$run_data = mysqli_query($con, $sql);
	$rowcount = mysqli_num_rows($run_data);
	if ($rowcount==0){
		return 0;
	}
	else {
		$data = mysqli_fetch_array($run_data); //ak je hit tak bude len jeden riadok predno ziadny loop
		return $data['order_id'];

	}
}


// VYMAZE PRESNY PRODUKT Z PRESNEHO ORDERU OD PRESNEHO UZIVATELA - UZIVATEL SA PRENASA CEZ SESSION
function deleteFromOrderDetials($acc_id, $order_id, $product_id){
	global $con;
	$sql = "DELETE FROM orderDetails WHERE details_accountid = $acc_id AND details_orderid = $order_id AND details_productid = $product_id";

	if ($con->query($sql) === TRUE) {
		header('Location: orders.php');
	} 
	else {
		echo "Chyba: " . $sql . "<br>" . $con->error;
	}
}


// ZOBRAZUJE PRI HOVERNUTIE NA KOSIV V NAVBARE KOLKO PRODUKTOV SA NACHADZA V KOSIKU + TOTAL CENU
function getTooltip($acc_id){
	global $con;
	$order_id = getOrderId($acc_id);
	$totalprice = calculateTotalePrice($order_id, $acc_id);

	$sql = "SELECT * FROM orderDetails WHERE details_accountid = $acc_id AND details_orderid = $order_id";
	$run_data = mysqli_query($con, $sql);
	$rowcount = mysqli_num_rows($run_data);

	if ($rowcount == 1) {
		return "$rowcount product, worth $totalprice €";
	}
	else {
		return "$rowcount products, worth $totalprice €";
	}	
}


// DISBURSTNE ORDER A NASTAVI ADRESU
function disburseOrder($acc_id, $order_id){
	global $con;
	$address = array();

	$sql2 = "SELECT * FROM accounts WHERE acc_id = $acc_id";
	$run_data = mysqli_query($con, $sql2);
	$data = mysqli_fetch_array($run_data);
	$order_address = $data['acc_street'];
	$address[0] = $order_address; 
	$order_address = $data['acc_house_nr'];
	$address[1] = $order_address; 
	$order_address = $data['acc_city'];
	$address[2] = $order_address; 

	// join 3 hodnot z 3 sql stlpcov do jedneho stringu = adresa + cislo domu + mesto
	$order_address = implode(" ", $address);
    $sql = "UPDATE orders SET order_status = 'disbursed', order_shipaddress = '$order_address' WHERE order_id = $order_id AND order_userid = $acc_id";
    $run_data = mysqli_query($con, $sql);
}


//
function getPersonalInfo($acc_id){
	global $con;
    $sql = "SELECT * FROM accounts WHERE acc_id = $acc_id";
    $run_data = mysqli_query($con, $sql);
    $address = array();

    $data = mysqli_fetch_array($run_data);
    $name = $data['acc_name'];
    $surname = $data['acc_surname'];
    $email = $data['acc_email'];
    $phone = $data['acc_phone'];
	$order_address = $data['acc_street'];
	$address[0] = $order_address; 
	$order_address = $data['acc_house_nr'];
	$address[1] = $order_address; 
	$order_address = $data['acc_city'];
	$address[2] = $order_address; 

	// join 3 hodnot z 3 sql stlpcov do jedneho stringu = adresa + cislo domu + mesto
	$order_address = implode(" ", $address);

    return array($name, $surname, $email, $phone, $order_address);
}


function getOrdersCheckout($acc_id, $order_id){
	global $con;
	$sql = "SELECT  products.pro_name, products.pro_price, orderDetails.details_qnty FROM products JOIN orderDetails ON products.pro_id = orderDetails.details_productid WHERE orderDetails.details_accountid = $acc_id AND orderDetails.details_orderid = $order_id";
	$run_data = mysqli_query($con, $sql);


	echo '
			<table class="table table-responsive">
                <thead>
                    <tr>
                        <th >Product</th>
                        <th >Qnty</th>
                        <th style="width: 20%;">Price</th>
                    </tr>
                </thead>
                <tbody>
		';

	while ($data = mysqli_fetch_array($run_data)){
			$product_name = $data['pro_name'];
			$product_price = $data['pro_price'];
			$order_qnty = $data['details_qnty'];

			echo '
					<tr>
						<td><strong>'.$product_name.'</strong></td>
						<td>x '.$order_qnty.'</td>
						<td>'.$product_price.' €</td>
                    </tr>
			';
		}

	$totalprice = calculateTotalePrice($order_id, $acc_id);
	echo '
					<tr>
                        <td>   </td>
                        <td><h4>Total</h4></td>
                        <td class="text-right"><h5><strong>'.$totalprice.' €</strong></h5></td>
                    </tr>
                </tbody>
            </table>
        ';

}


// ZOBRAZI ALERT MESSAGE POUZIVATELOVI O PODROBNOSTIACH [info, warning, success, danger]
function displayAlert($level, $level_string, $string, $sec){
	$timer = $sec * 1000;

	echo '<div class="alert alert-'; 
	echo $level;
	echo' text-center"><strong>';
	echo $level_string;
	echo' </strong>';
	echo $string;
	echo '</div>
        <script>window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
            });
          }, ';
    echo $timer;
    echo ');
        </script>';
}

?>