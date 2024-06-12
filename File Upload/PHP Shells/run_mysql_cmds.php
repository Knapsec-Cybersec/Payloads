<?php
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
if ($result = mysqli_query($con, $_GET['sql_cmd'])) {
  echo ("Returned rows are: " . mysqli_num_rows($result)."\n\n");
  while($row = mysqli_fetch_array($result))
     {
        printf ("| %s | %s | %s |", $row[0], $row[1], $row[2]);
		echo ("\n");
     } 
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?>