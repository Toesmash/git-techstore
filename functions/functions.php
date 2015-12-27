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


//VYPISE IBA NAZVY KATEGORII
function listCategory(){
	global $con;
	$sql = "SELECT * FROM category";
	$run_cat = mysqli_query($con, $sql);

	while ($row_cat = mysqli_fetch_array($run_cat)){
		$cat_name = $row_cat['cat_name'];
		echo '<option>'.$cat_name.'</option>';
	} 

}



// VRATI VSETKY KATEGORIE PRE DB
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




?>