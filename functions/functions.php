<?php 

// CONNECTION NA LOCALHOST DATABAZU
$con = mysqli_connect("localhost","root","","techstore");


// //Categories
// function getCategory(){
// 	global $con;
// 	$sql = "select * from category";
// 	$run_cat = mysqli_query($con, $sql);

// 	while ($row_cat=mysqli_fetch_array($run_cat)){


// 	}

// }


// SPOCITA KOLKO JE RIADKOV V KATEGORIACH
function getCategoryRows(){

	global $con;
	$sql = "SELECT * FROM category";
	$result=mysqli_query($con,$sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;

}


// VRATI VSETKY KATEGORIE PRE DB
function getCategory($n_rows){
	global $con;
	$sql = "SELECT * FROM category";
	$run_cat = mysqli_query($con, $sql);

	for ($x=0 ; $x<$n_rows; $x++){

		$row_cat = mysqli_fetch_array($run_cat);
		$cat_name = $row_cat['cat_name'];
		print ' <li class="list-group-item"><a data-toggle="collapse" data-target="#collapse'.$x.'">'.$cat_name.'</a></li>';
		// echo '<li class="list-group-item"><a data-toggle="collapse" data-target="#collapse$x">$cat_name</a></li>';

	}





}




?>