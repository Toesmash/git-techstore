<?php 

// CONNECTION NA LOCALHOST DATABAZU
$con = mysqli_connect("localhost","root","","techstore");

// SPOCITA KOLKO JE RIADKOV V KATEGORIACH
function getRows($selector, $database){

	global $con;
	$sql = "SELECT $selector FROM $database";
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
				data-parent="#affix_sidebar"><b>'.$cat_name.'</b></a>


			';
		getSubCategory($x);
	}
}


// VYTVORI COLLAPSE PANELI A VNUTRI VOLA FUNKCIU NA REQUEST VSETKYCH UNIQUE BRANDOV
function getSubCategory($collapse_n){
	global $con;
	$sql = "SELECT * FROM category";

	$category_n = $collapse_n +1; 
	$unique_brands = getRows('DISTINCT pro_brand', 'products WHERE pro_category="'.$category_n.'"');

				echo '<div class="collapse" id="collapse'.$collapse_n.'">';
					getBrand($category_n, $unique_brands, $collapse_n);
				echo '</div>';
}

// VRATI VSETKY UNIQUE ZNACKY PRE KATEGORIE
function getBrand($x, $unique, $collapse_n){
	global $con;
	for($i=0; $i<$unique; $i++){

		$sql = "SELECT DISTINCT pro_brand FROM products WHERE pro_category='$x' ORDER BY pro_brand LIMIT 1 OFFSET $i";
		$run_sql = mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($run_sql)){
			$get_brand = $row['pro_brand'];
			$sql2 = "SELECT brand_name FROM brands WHERE brand_id = $get_brand";
			$run_sql2 = mysqli_query($con, $sql2);

			while($row2 = mysqli_fetch_array($run_sql2)){
					$get_brand_name = $row2['brand_name'];
					echo '<li class="list-group-item sidebar_menu_affix"><a href="products.php?cat='.$x.'&brand='.$get_brand_name.'">'.$get_brand_name.'</a></li>';
					
			}
		}
	}
}

function getBrandProducts($cat_num, $brand_product){

		$sql = "SELECT products.* FROM products JOIN brands ON products.pro_brand = brands.brand_id WHERE q.pro_category = $cat_num AND t.brand_name = $brand_product";



	
}


function getProducts($query){

		global $con;

		$x = 0;

		$sql = $query;
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