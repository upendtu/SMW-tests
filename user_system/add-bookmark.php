<?php
include('../db_connect.php');
//session_start();
include('session.php');
include('joblist.php');
 
// echo $id ;

if (isset($_GET['cid']) AND ($_GET['jid']))
 {
 // get id value
 $cid = $_GET['cid'];
 $jid = $_GET['jid'];
 
$sql = "INSERT INTO bookmark_job(user_id,cmp_id,job_id)VALUES('$id','$cid','$jid')";

mysql_select_db('smallworld');

$query = mysql_query($sql);

if(!$query){
  
  die('Could not enter data:' .mysql_error());
}

echo "Entered data successfully\n";

}

?>