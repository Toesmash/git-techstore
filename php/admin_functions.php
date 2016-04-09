<?php 
function getStats($selector, $db){
	global $con;
	if ($selector == "SUM(order_totalprice)"){
		$sql = "SELECT $selector AS value_sum FROM $db WHERE order_status = 'disbursed'";
		$result = mysqli_query($con, $sql); 
		$row = mysqli_fetch_assoc($result); 
		$sum = $row['value_sum'];
		echo $sum;
		echo " €";
	}

	else {
		$sql = "SELECT $selector FROM $db";
		$result = mysqli_query($con, $sql); 
		$run_data = mysqli_query($con, $sql);
		$rowcount = mysqli_num_rows($run_data);
		echo $rowcount;

	}
}
?>