<?php include("/var/www/html/c/c_db_access.php");

$output="# Generated by Aquarium\n";
$query = "select nameserver_ip from nameserver";
$result=mysql_query($query, $db);
if(mysql_num_rows($result) > 0)
{
	while($row = mysql_fetch_array($result))
 {
	  $nameserver_ip = $row['nameserver_ip'];
	      
	  $output.="nameserver $nameserver_ip\n";
 }
}
print "Saving file: /etc/resolv.conf\n$output\n";
file_put_contents("/etc/resolv.conf", $output);

?>
