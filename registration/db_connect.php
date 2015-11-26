<?php
$conn = mysql_connect("localhost","root","");
if(!$conn){

die("Connection failed: " .mysql_error());
}
 //echo 'connecrted';
 
 $database = mysql_select_db('smallworld') or die(mysql_error());
?>