<?php 
include ("connection.php");
include ("orders.php");

// SPOCITA KOLKO JE RIADKOV V KATEGORIACH
function getRows($selector, $database){

	global $con;
	$sql = "SELECT $selector FROM $database";
	$result=mysqli_query($con,$sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;

}


function adminFetchTable($id, $database, $separator){
	global $con;

	if($database=='products'){
		if($separator==0){
			$sql = 'SELECT products.pro_id, products.pro_name, brands.brand_name, products.pro_price, products.pro_image, products.pro_keywords FROM products LEFT JOIN brands ON pro_brand = brand_id WHERE pro_category = '.$id.'';
		}
		else {
			$sql = 'SELECT products.pro_id, products.pro_name, brands.brand_name, products.pro_price, products.pro_image FROM products JOIN brands ON pro_brand = brand_id WHERE pro_category = '.$id.' AND pro_id='.$separator.'';

		}
		echo $sql;
		$run_data = mysqli_query($con, $sql);

		while ($data = mysqli_fetch_array($run_data)){
			$data_id = $data['pro_id'];
			$data_name = $data['pro_name'];
			$data_brand = $data['brand_name'];	
			$data_price = $data['pro_price'];
			$data_image = $data['pro_image'];
			$data_keywords = $data['pro_keywords'];

			echo '<tr>
					<td>'.$data_id.'</td>
					<td>'.$data_name.'</td>
					<td>'.$data_brand.'</td>
					<td>'.$data_price.' €</td>
					<td><img src="product_images/'.$data_image.'" class="imageClip" /></td>
					<td>'.$data_keywords.'</td>
					';
			if($separator==0){
				echo'
					<td><a href="update.php?id='.$data_id.'&db=products&idname=pro_id" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
					<td><a href="delete.php?id='.$data_id.'&db=products&idname=pro_id&category_id='.$id.'&action=deleteproduct" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
				';
			}
			else {
				echo '
					<td>
						<a href="index.php?id='.$data_id.'&db=products&idname=pro_id&category_id='.$id.'&action=deleteproduct&delete=true" class="btn btn-danger btn-lg">YES</a>
					</td>
					<td>
						<a href="modify.php?action=changeproduct" class="btn btn-primary btn-lg">NO</a>
					</td>

					';

			}
					
	        echo '
	        	</tr>
	        ';
		}
	}
	else if($database=='category'){
		if($separator==0){
			$sql = 'SELECT * FROM category';
		}
		else{
			$sql = 'SELECT * FROM category WHERE cat_id='.$separator.'';

		}

		$run_data = mysqli_query($con, $sql);

		while ($data = mysqli_fetch_array($run_data)){
			$data_id = $data['cat_id'];
			$data_name = $data['cat_name'];
			echo '
				<tr>
					<td scope="row">'.$data_id.'</td>
					<td>'.$data_name.'</td>
				';
			if($separator==0){
				echo'
					<td><a href="update.php?id='.$data_id.'&db=category&idname=cat_id" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
					<td><a href="delete.php?id='.$data_id.'&db=category&idname=cat_id&action=deletecategory" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
					';
			}
			else {
				echo '
					<td>
						<a href="index.php?id='.$data_id.'&db=category&idname=cat_id&action=deletecategory&delete=true" class="btn btn-danger btn-lg">YES</a>
						<a href="modify.php?action=changecategory" class="btn btn-primary btn-lg">NO</a>
					</td>

					';

			}
					
	        echo '
	        	</tr>
	        ';
		}
	}

	else if($database=='brands'){
		if($separator==0){
			$sql = 'SELECT * FROM brands';
		}
		else{
			$sql = 'SELECT * FROM brands WHERE brand_id='.$separator.'';

		}

		$run_data = mysqli_query($con, $sql);

		while ($data = mysqli_fetch_array($run_data)){
			$data_id = $data['brand_id'];
			$data_name = $data['brand_name'];
			echo '
				<tr>
					<td scope="row">'.$data_id.'</td>
					<td>'.$data_name.'</td>
				';
			if($separator==0){
				echo'
					<td><a href="update.php?id='.$data_id.'&db=brands&idname=brand_id" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
					<td><a href="delete.php?id='.$data_id.'&db=brands&idname=brand_id&action=deletebrand" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
	            ';
			}
			else {
				echo '
					<td>
						<a href="index.php?id='.$data_id.'&db=brands&idname=brand_id&action=deletebrand&delete=true" class="btn btn-danger btn-lg">YES</a>
						<a href="modify.php?action=changebrand" class="btn btn-primary btn-lg">NO</a>
					</td>

					';

			}
					
	        echo '
	        	</tr>
	        ';

		}
	}
}

function deleteAdmin($database,$idname, $id ){
	global $con;
	$sql = 'DELETE FROM '.$database.' WHERE '.$idname.'="'.$id.'"';
	// echo $sql;
	returnAlert("You have succesfully removed a record from database!", $sql);

}

function updateAdmin($database,$idname, $id ){
	global $con;
	$sql = 'SELECT * FROM '.$database.' WHERE '.$idname.'="'.$id.'"';

	$run_sql = mysqli_query($con, $sql);
	$data = mysqli_fetch_array($run_sql);



	if($database == 'products') {
		$data_id = $data['pro_id'];
		$data_category = $data['pro_category'];
		$data_brand = $data['pro_brand'];
		$data_name = $data['pro_name'];
		$data_price = $data['pro_price'];
		$data_desc = $data['pro_desc'];
		$data_keywords = $data['pro_keywords'];
		$data_image = $data['pro_image'];

		$sql = 'SELECT * FROM category WHERE cat_id='.$data_category.'';
		$run_sql = mysqli_query($con, $sql);
		$data = mysqli_fetch_array($run_sql);
		$category_name = $data['cat_name'];

		$sql = 'SELECT * FROM brands WHERE brand_id='.$data_brand.'';
		// echo $sql;
		$run_sql = mysqli_query($con, $sql);
		$data = mysqli_fetch_array($run_sql);
		$brand = $data['brand_name'];


		echo '
			
			<form class="form-horizontal" method="post" enctype="multipart/form-data">
				<div class="form-group">
			      	<label class="control-label col-sm-2">ID:</label>
			      	<div class="col-sm-1">
			        	<input type="text" class="form-control"  value="'.$data_id.'" name="pro_id" readOnly="true">
			      	</div>
			      	
			      	<label class="control-label col-sm-2">Product name:</label>
			      	<div class="col-sm-5">
			        	<input type="text" class="form-control" value="'.$data_name.'" name="pro_name" required>
			      	</div>
			      	
			    </div>

			    <div class="form-group">
			    	<label class="control-label col-sm-2">Category:</label>
			      	<div class="col-sm-8">
			        	<select class="form-control" name="pro_cat">
			        	<option value="'.$data_category.'" selected="selected">'.$category_name.'</option>
			        	<option disabled>──────────</option>
			        	';
			        	listData(category, cat_name, cat_id);
			    echo '
			        	
						</select>
			      	</div>
			    </div>

			    <div class="form-group">
			      	<label class="control-label col-sm-2">Brand:</label>
			      	<div class="col-sm-8">
			        	<select class="form-control" name="pro_brand" required>
			        	<option value="'.$data_brand.'" selected="selected">'.$brand.'</option>
			        	<option disabled>──────────</option>
			     ';
			        		listData(brands, brand_name, brand_id);
			     echo '
						</select>
			      	</div>
			    </div>

			    <div class="form-group">
				        <label class="control-label col-sm-2">Price (with tax):</label>
				        <div class="col-sm-8">
				            <input type="number" value="'.$data_price.'" class="form-control" min="0" step="1" name="pro_price" required>
				        </div>
		    	</div>

		    	<div class="form-group">
				        <label class="control-label col-sm-2">Image:</label>
				        <div class="col-sm-8">
				        	<img src="product_images/'.$data_image.'" style="max-width: 150px; heigh: auto;">
				        </div>
		    	</div>

			    <div class="form-group">
			    	<label class="control-label col-sm-2">Description:</label>
			      	<div class="col-sm-8">
			      		<textarea class = "form-control" rows = "7" name="pro_desc">'.$data_desc.'</textarea>
			      	</div>
			    </div>

			    <div class="form-group">
			      	<label class="control-label col-sm-2">Keywords:</label>
			      	<div class="col-sm-8">
			        	<input type="text" class="form-control" value="'.$data_keywords.'" name="pro_keywords"/>
			      	</div>
			    </div>

			    <div class="form-group">
			    	<div class="row">
			    		<div class="col-sm-2"></div>
			      		<div class="col-sm-8">
			        		<input class=" btn btn-warning btn-block text-center" action="update.php" type="submit" name="update_product" value="Update" />
			      		</div>
			      	</div>
			    </div>

		 </form>



		';
	}

	if($database == 'category') {

		$data_id = $data['cat_id'];
		$data_name = $data['cat_name'];

		echo '
			<form class="form-horizontal" method="post" enctype="multipart/form-data">
				<div class="form-group">
			      	<label class="control-label col-sm-2">ID:</label>
			      	<div class="col-sm-1">
			        	<input type="text" class="form-control"  value="'.$data_id.'" name="cat_id" readOnly="true">
			      	</div>
			      	
			      	<label class="control-label col-sm-2">Category name:</label>
			      	<div class="col-sm-5">
			        	<input type="text" class="form-control" value="'.$data_name.'" name="cat_name" required>
			      	</div>
			      	
			    </div>
			    <div class="form-group">
			    	<div class="row">
			    		<div class="col-sm-2"></div>
			      		<div class="col-sm-8">
			        		<input class=" btn btn-warning btn-block text-center" action="update.php" type="submit" name="update_category" value="Update" />
			      		</div>
			      	</div>
			    </div>
		 	</form>

		';
	}

	if($database == 'brands') {

		$data_id = $data['brand_id'];
		$data_name = $data['brand_name'];

		echo '
			<form class="form-horizontal" method="post" enctype="multipart/form-data">
				<div class="form-group">
			      	<label class="control-label col-sm-2">ID:</label>
			      	<div class="col-sm-1">
			        	<input type="text" class="form-control"  value="'.$data_id.'" name="brand_id" readOnly="true">
			      	</div>
			      	
			      	<label class="control-label col-sm-2">Category name:</label>
			      	<div class="col-sm-5">
			        	<input type="text" class="form-control" value="'.$data_name.'" name="brand_name" required>
			      	</div>
			      	
			    </div>
			    <div class="form-group">
			    	<div class="row">
			    		<div class="col-sm-2"></div>
			      		<div class="col-sm-8">
			        		<input class=" btn btn-warning btn-block text-center" action="update.php" type="submit" name="update_brand" value="Update" />
			      		</div>
			      	</div>
			    </div>
		 	</form>

		';
	}


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
	// echo'<p>POCET ROWS'.$n_rows.'</p>';
	$sql = "SELECT * FROM category";
	$run_cat = mysqli_query($con, $sql);

	$sql2 = "SELECT cat_id FROM category ORDER BY cat_id DESC LIMIT 1 OFFSET 0";
	$result = mysqli_query($con, $sql);


	$pole = array();
	while ($row = mysqli_fetch_array($result)) {
	  $pole[] = $row['cat_id'];
	}


	for ($x=0 ; $x<$n_rows; $x++){
		// echo'<p>POCET ROWS'.$x.'</p>';
		$row_cat = mysqli_fetch_array($run_cat);
		// $cat_id = $row_cat['cat_id'];
		$cat_name = $row_cat['cat_name'];

		echo '	

				<a href="#collapse'.$x.'" class="list-group-item list-group-item-info" data-toggle="collapse" 
				data-parent="#affix_sidebar"><b>'.$cat_name.'</b></a>


			';

		getSubCategory($x, $pole[$x]);
	}
}


// VYTVORI COLLAPSE PANELI A VNUTRI VOLA FUNKCIU NA REQUEST VSETKYCH UNIQUE BRANDOV
function getSubCategory($collapse_number, $product_category){
	global $con;
	$sql = "SELECT * FROM category";

	// echo'<p>POCET BRANDS'.$collapse_number.'</p>';

	$unique_brands = getRows('DISTINCT pro_brand', 'products WHERE pro_category="'.$product_category.'"');

				echo '<div class="collapse" id="collapse'.$collapse_number.'">';
					getBrand($product_category, $unique_brands);
				echo '</div>';
}

// VRATI VSETKY UNIQUE ZNACKY PRE KATEGORIE
function getBrand($product_category, $unique_brands){
	global $con;
	for($i=0; $i<$unique_brands; $i++){

		$sql = "SELECT DISTINCT pro_brand FROM products WHERE pro_category='$product_category' ORDER BY pro_brand LIMIT 1 OFFSET $i";
		$run_sql = mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($run_sql)){
			$brand_id = $row['pro_brand'];

			$sql2 = "SELECT brand_name FROM brands WHERE brand_id = $brand_id";
			$run_sql2 = mysqli_query($con, $sql2);

			while($row2 = mysqli_fetch_array($run_sql2)){
					$get_brand_name = $row2['brand_name'];
					echo '<li class="list-group-item sidebar_menu_affix"><a href="products.php?cat='.$product_category.'&brand='.$get_brand_name.'">'.$get_brand_name.'</a></li>';
					
			}
		}
	}
}

// function getBrandProducts($cat_num, $brand_product){

// 		$sql = "SELECT products.* FROM products JOIN brands ON products.pro_brand = brands.brand_id WHERE q.pro_category = $cat_num AND t.brand_name = $brand_product";
// }


function getProducts($query){

		global $con;

		$x = 0;

		$sql = $query;
		$run_pro = mysqli_query($con, $sql);
		$rowcount=mysqli_num_rows($run_pro);

		if($rowcount==0){
			echo '
				<div class="alert alert-info">
					<a class="close" data-dismiss="alert" aria-label="Close">&#215;</a>
				  	<strong>Info!</strong> No results found for your search.
				</div>

			';

		}


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
					<button class="btn btn-md btn_add_to_cart"><strong>Add to cart</strong></button>
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

function returnAlert($string, $sql){
	global $con;

	if ($con->query($sql) === TRUE) {
		echo 	'
			<div class="alert alert-success text-center" role="alert">
 				<strong>Success!</strong> '.$string.'
			</div>
			<script>
				window.setTimeout(function() {
					$(".alert").fadeTo(600, 0).slideUp(200, function(){
    					$(this).remove(); 
    				});
			}, 2000);

			</script>
		';
	} 
	else {
		echo "Chyba: " . $sql . "<br>" . $con->error;
	}

}

 
function insert($switcher){
		global $con;

		if($switcher=="1"){
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
			
			returnAlert("You have added a product to the database!", $sql);
			
		}

		else if($switcher=="2"){
			$name = $_POST['cat_name'];

			$sql = "INSERT into category (cat_name) 
			VALUES('$name')";

			returnAlert("You have added a category to the database!", $sql); //vlastne tu aj posiela sqlku do databazy
		}


		else if($switcher=="3"){
			$name = $_POST['brand_name'];

			$sql = "INSERT into brands (brand_name) 
			VALUES('$name')";

			returnAlert("You have added a brand to the database!", $sql); //vlastne tu aj posiela sqlku do databazy
		}

		else if($switcher=="4"){
			$username = $_POST['reg_username'];
			$name = $_POST['reg_name'];
			$surname = $_POST['reg_surname'];
			$email = $_POST['reg_email'];
			$password = $_POST['reg_psswrd'];
			$phone = $_POST['reg_phone'];
			$city = $_POST['reg_city'];
			$country = $_POST['reg_country'];
			$street = $_POST['reg_street'];
			$housenr = $_POST['reg_housenmbr'];
			$psc = $_POST['reg_psc'];
			$timestamp = date('Y-m-d H:i:s');

			$sql = "INSERT INTO accounts (acc_role, acc_username, acc_name, acc_surname, acc_email, acc_psswrd, acc_phone, acc_city, acc_country, acc_street, acc_house_nr, acc_psc, acc_opendate) VALUES ('user','$username', '$name','$surname','$email','$password','$phone','$city','$country','$street','$housenr', '$psc','$timestamp')";
			returnAlert("You have sucessfully created an account!", $sql); //vlastne tu aj posiela sqlku do databazy
		}

		

}


function update($switcher){
	global $con;

	if($switcher=="1"){
		$pro_id = $_POST['pro_id'];
		$pro_name = $_POST['pro_name'];
		$pro_cat = $_POST['pro_cat'];
		$pro_brand = $_POST['pro_brand'];
		$pro_price = $_POST['pro_price'];
		$pro_desc = $_POST['pro_desc'];
		$pro_keywords = $_POST['pro_keywords'];
		// echo $pro_id;

		$sql = "UPDATE products SET pro_name = '$pro_name', pro_category = '$pro_cat', pro_brand='$pro_brand', pro_price='$pro_price', pro_desc='$pro_desc', pro_keywords='$pro_keywords' WHERE pro_id='$pro_id';";
		// echo $sql;

		returnAlert("You have sucessfully updated product!", $sql); //vlastne tu aj posiela sqlku do databazy
		
	}

	if($switcher=="2"){
		$cat_id = $_POST['cat_id'];
		$cat_name = $_POST['cat_name'];
		// echo $pro_id;

		$sql = "UPDATE category SET cat_name = '$cat_name' WHERE cat_id= '$cat_id' ;";
		// echo $sql;

		returnAlert("You have sucessfully updated category!", $sql); //vlastne tu aj posiela sqlku do databazy
		
	}

	if($switcher=="3"){
		$brand_id = $_POST['brand_id'];
		$brand_name = $_POST['brand_name'];
		// echo $pro_id;

		$sql = "UPDATE brands SET brand_name = '$brand_name' WHERE brand_id= '$brand_id' ;";

		returnAlert("You have sucessfully updated category!", $sql); //vlastne tu aj posiela sqlku do databazy
		
	}


}

?>