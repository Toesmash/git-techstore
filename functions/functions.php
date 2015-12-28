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
		$cat_name = $row_cat['cat_name'];
		echo '<li class="list-group-item"><a data-toggle="collapse" data-target="#collapse'.$x.'">'.$cat_name.'</a></li>';
		getSubCategory($x);
		

	}
}


// VRATI VSETKY UNIQUE ZNACKY PRE KATEGORIE
function getSubCategory($collapse_n){
	global $con;
	$sql = "SELECT * FROM category";
	$run_cat = mysqli_query($con, $sql);
	$n_unique=3;

	echo '<div id="collapse'.$collapse_n.'" class="panel-collapse collapse"><ul class="list-group">';
	for ($x=0; $x<$n_unique; $x++){
		echo '<li class="list-group-item">ITEM #'.$x.'</li>';
	}
	echo '</ul></div>';

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

		// $insert_product = "INSERT into products (pro_cat, pro_brand, pro_name, pro_price, pro_desc, pro_image, pro_keywords) VALUES('$pro_cat','$pro_brand','$pro_name','$pro_price','$pro_desc','$pro_image','$pro_keywords')";

		// $insert = mysqli_query($con, $insert_product);

		// if ($insert){
		// 	echo "<script>alert('DONE')</script>";
		// }


		$sql = "INSERT into products (pro_category, pro_brand, pro_name, pro_price, pro_desc, pro_image, pro_keywords) 
		VALUES('$pro_cat','$pro_brand','$pro_name','$pro_price','$pro_desc','$pro_image','$pro_keywords')";


		if ($con->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}

}


?>