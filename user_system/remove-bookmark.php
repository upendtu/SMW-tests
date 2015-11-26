<?php
include('../db_connect.php');
//session_start();
include('session.php');
include('joblist.php');
 
// echo $id ;

if (isset($_GET['jid']))
 {
 // get id value
// $cid = $_GET['cid'];
 $j_id = $_GET['jid'];
 
//$sql = "INSERT INTO bookmark_job(user_id,cmp_id)VALUES('$id','$cid')";
$sql = mysql_query("DELETE FROM bookmark_job WHERE job_id = '$j_id' AND user_id = '$id' ");

//mysql_select_db('smallworld');

$query = mysql_query($sql);

//if(!$query){
  
  //die('Could not delete data:' .mysql_error());
//}
//else{

echo "Bookmark removed successfully\n";
//}
}

?>