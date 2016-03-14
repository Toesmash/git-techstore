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

// VRATI VSETKY POLOZKY KTORE ZAKAZNIK MA V AKTUALNEJ OBJEDNAVKE KT. JE V STATUSE PROCESSING
function fetchOrderProducts($acc_id){
	global $con;

	// zisti order_id z orders tabulky
	$order_id = getOrderId($acc_id);

	if($order_id>0){
		$sql = "SELECT products.pro_id, products.pro_name, products.pro_price, products.pro_desc, products.pro_image, brands.brand_name, orderDetails.details_qnty, orderDetails.details_price, orders.order_totalprice FROM products JOIN brands ON products.pro_brand = brands.brand_id JOIN orderDetails ON products.pro_id = orderDetails.details_productid JOIN orders ON orders.order_id = orderDetails.details_orderid WHERE orderDetails.details_accountid = $acc_id";
		$run_data = mysqli_query($con, $sql);

		// spocita kolko produktov sa nachadza v jednej objednavke
		$rowcount = mysqli_num_rows($run_data);

		echo '
			<h3>Order number: '.$order_id.'</h3>
			<h4>Number of products: '.$rowcount.'</h4>
		';
		// Horna cast table elementu
		echo '
			<table class="table table-responsive">
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
			$product_id = $data['pro_id'];
			$product_name = $data['pro_name'];
			$product_price = $data['pro_price'];
			$product_desc = $data['pro_desc'];	
			$product_image = $data['pro_image'];
			$brand_name = $data['brand_name'];
			$order_qnty = $data['details_qnty'];
			$order_subprice = $data['details_price'];
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
                            <input type="number" class="form-control text-center" value="'.$order_qnty.'">
                        </td>
                        <td class="col-md-1 text-center"><strong>'.$product_price.' €</strong></td>
                        <td class="col-md-1 text-center"><strong>'.$order_subprice.' €</strong></td>
                        <td class="col-md-1">
                        <a href="orders.php?delete=true&order_id='.$order_id.'&product_id='.$product_id.'" class="btn btn-danger btn-block">
                            <span class="glyphicon glyphicon-remove"></span> Delete
                        </a>

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
                        <a class="btn btn-success btn-block" href="#">Checkout</a>
                        </td>
                    </tr>
                </tbody>
            </table>
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
	return $data['totalprice'];

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