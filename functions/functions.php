<?php 

// CONNECTION NA LOCALHOST DATABAZU
$con = mysqli_connect("localhost","root","","techstore");

// SPOCITA KOLKO JE RIADKOV V KATEGORIACH
function getCategoryRows(){

	global $con;
	$sql = "SELECT * FROM category";
	$result=mysqli_query($con,$sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;

}


//VYPISE IBA NAZVY DAT V TABULKE
function listData($database, $name, $id){


	global $con;
	$sql = 'SELECT * FROM '.$database.'';
	$run_data = mysqli_query($con, $sql);



	while ($data = mysqli_fetch_array($run_data)){
		$data_name = $data[$name];
		$data_id = $data[$id];
		echo '<option value="'.$data_id.'">'.$data_name.'</option>';
	} 

}



// VRATI VSETKY KATEGORIE PRE DB + VSETKY PODKATEGORIE
function getCategory($n_rows){
	global $con;
	$sql = "SELECT * FROM category";
	$run_cat = mysqli_query($con, $sql);

	for ($x=0 ; $x<$n_rows; $x++){

		$row_cat = mysqli_fetch_array($run_cat);
		$cat_id = $row_cat['cat_id'];
		$cat_name = $row_cat['cat_name'];
		echo '
				<a href="#collapse'.$x.'" class="list-group-item list-group-item-info" data-toggle="collapse" 
				data-parent="#affix_sidebar">'.$cat_name.'</a>';
		getSubCategory($x);

		
		

	}


	
}


// VRATI VSETKY UNIQUE ZNACKY PRE KATEGORIE
function getSubCategory($collapse_n){
	global $con;
	$sql = "SELECT * FROM category";
	$run_cat = mysqli_query($con, $sql);
	$n_unique=3;

	echo '<div class="collapse" id="collapse'.$collapse_n.'">';
	for ($x=0; $x<$n_unique; $x++){
		echo '<li class="list-group-item">ITEM #'.$x.'</li>';
	}
	echo '</div>';




}




function getProducts(){


	if(!isset($_GET['category'])){
		echo "

		<h1>Nooo asi sa tu nic nepredava (KLIKNI NA KATEGORIU :)</h1>
		";

	}
	else {

		global $con;
		$cat_id = $_GET['category'];

		$x = 0;
		$sql = "SELECT * FROM products WHERE pro_category like $cat_id";


		$run_pro = mysqli_query($con, $sql);

		while ($row_products = mysqli_fetch_array($run_pro)) {
			$product_id = $row_products['pro_id'];
			$product_category = $row_products['pro_category'];
			$product_name = $row_products['pro_name'];
			$product_price = $row_products['pro_price'];
			$product_image = $row_products['pro_image'];
			$product_desc = $row_products['pro_desc'];


			echo '
				<div class="col-md-4 single_product" >
					<div class="product_title">
					<p>'.$product_name.'</p>
					</div>
					<div class="product_image"  data-toggle="modal" data-target="#modalnr_'.$x.'">
					<img src="admin/product_images/'.$product_image.'"/>
					</div>
					<div class="product_price">
					<p>'.$product_price.'€</p>
					</div>
					<button class="btn btn-primary btn-sm">Pridaj do kosika</button>
					

				</div>

				<div id="modalnr_'.$x.'" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
        						<button type="button" class="close" data-dismiss="modal">&times;</button>
        						<h4 class="modal-title">'.$product_name.'</h4>
      						</div>
      						<div class="modal-body">
       	 						<div class="description">
       	 							<p>'.$product_desc.'</p>
       	 							<img src="admin/product_images/'.$product_image.'"/>
       	 						</div>
       	 						<div class="col-md-8">
       	 							<h2>Cena s DPH:</h2>
       	 						</div>
       	 						<div class="col-md-4">
       	 							<h2>'.$product_price.' €</h2>
       	 						</div>
       	 						<div class="col-md-8">
       	 							<p>Cena bez DPH:</p>
       	 						</div>
       	 						<div class="col-md-4">
       	 							<p>'.calculateDPH($product_price, 20).' €</p>
       	 						</div>

      						</div>
      						<div class="modal-footer">
        						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      						</div>
						</div>
					</div>				
				</div>
			';
			$x++;
		}
	}
}








function calculateDPH($price, $tax){
	return round($price / ($tax/100+1),2);
}

function insert(){
		global $con;

		$pro_name = $_POST['pro_name'];
		$pro_cat = $_POST['pro_cat'];
		$pro_brand = $_POST['pro_brand'];
		$pro_price = $_POST['pro_price'];
		$pro_desc = $_POST['pro_desc'];
		$pro_keywords = $_POST['pro_keywords'];

		$pro_image = $_FILES['pro_image']['name'];
		$pro_image_tmp = $_FILES['pro_image']['tmp_name'];

		move_uploaded_file($pro_image_tmp, 'product_images/'.$pro_image.'');
		$sql = "INSERT into products (pro_category, pro_brand, pro_name, pro_price, pro_desc, pro_image, pro_keywords) 
		VALUES('$pro_cat','$pro_brand','$pro_name','$pro_price','$pro_desc','$pro_image','$pro_keywords')";


		if ($con->query($sql) === TRUE) {
		    echo 	'<div class="alert alert-success">
    					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   						<strong>Super!</strong> Bol pridany novy produkt.
  					</div>';
		} else {
		    echo "Chyba: " . $sql . "<br>" . $con->error;
		}

}





?>