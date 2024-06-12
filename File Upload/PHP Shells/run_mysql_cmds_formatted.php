<?php
header('Content-type: text/plain');
$sql_user=$_GET['sql_user'];	
$sql_pass=$_GET['sql_pass'];	
$sql_db=$_GET['sql_db'];
$sql_query=$_GET['query'];
$con = mysqli_connect("localhost",$sql_user,$sql_pass,$sql_db);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Perform query
if ($result = mysqli_query($con, $sql_query)) {
	echo ("Returned rows are: " . mysqli_num_rows($result)."\n\n");
	print ("\n\n");
	$sizes = array();
	$row = mysqli_fetch_assoc($result);
	foreach($row as $key=>$value){
		$sizes[$key] = strlen($key); //initialize to the size of the column name
	}
	while($row = mysqli_fetch_assoc($result)){
		foreach($row as $key=>$value){
			$length = strlen($value);
			if($length > $sizes[$key]) $sizes[$key] = $length; // get largest result size
		}
	}
	mysqli_data_seek($result, 0); //set your pointer back to the beginning.

	//top of output
	foreach($sizes as $length){
		echo "+".str_pad("",$length+2,"-");
	}
	echo "+\n";

	// column names
	$row = mysqli_fetch_assoc($result);
	foreach($row as $key=>$value){
		echo "| ";
		echo str_pad($key,$sizes[$key]+1);
	}
	echo "|\n";

	//line under column names
	foreach($sizes as $length){
		echo "+".str_pad("",$length+2,"-");
	}
	echo "+\n";

	//output data
	do {
		foreach($row as $key=>$value){
			echo "| ";
			echo str_pad($value,$sizes[$key]+1);
		}
		echo "|\n";
	} while($row = mysqli_fetch_assoc($result));

	//bottom of output
	foreach($sizes as $length){
		echo "+".str_pad("",$length+2,"-");
	}
	echo "+\n";
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?>