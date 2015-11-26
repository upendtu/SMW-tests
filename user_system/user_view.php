
<?php
include('session.php');
?>
<html>
<b id="welcome">Welcome:<i><?php echo $id; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b></br>

</html>


<?php

include('../db_connect.php');

mysql_select_db('smallworld');

$sql = "SELECT user_id,email,name,language,work_type,country,phone,dob from candidate_registration where email = '$login_session'";



$retval = mysql_query($sql,$conn);

if(!$retval)
{
die('could not get data:' .mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{

$id         = $row['user_id'];
$email      = $row['email'];
$name       = $row['name'];
$mobile     = $row['phone'];



?>
<p> Mail : <span><?php echo $email ; ?></span></p>
<p>Name : <span> <?php echo $name ; ?> </span> </p>
<p>Mobile: <span><?php echo $mobile ; ?> </span> </p>
<a href = "user_edit.php?id=<?php echo $id ; ?>"><span class = "edit" title = "edit">EDIT</span></a>

<?php } ?>

<?php
include('joblist.php');
 ?>