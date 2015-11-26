
<?php
include('session.php');
?>
<html>
<b id="welcome">Welcome:<i><?php echo $id; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b></br>

</html>


<?php

include('../db_connect.php');
if (isset($_GET['cid']) AND ($_GET['jid']))
 {
 // get id value
 $cid = $_GET['cid'];
 $jid = $_GET['jid'];
 
$sql = "INSERT INTO applied_job(user_id,cmp_id,job_id)VALUES('$id','$cid','$jid')";

mysql_select_db('smallworld');

$query = mysql_query($sql);

if(!$query){
  
  die('Could not enter data:' .mysql_error());
}

echo "Entered data successfully\n";

}
echo "<br><br><br>";

?>

<?php
include('joblist.php');
 ?>