
<?php
include('session.php');
?>
<html>
<b id="welcome">Welcome:<i><?php echo $id; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b></br>

</html>

<?php
include('../db_connect.php');

$sql = "select company_registration.companyname,job_post.job_title,applied_job.cmp_id FROM company_registration,job_post ,applied_job WHERE company_registration.cmp_id = applied_job.cmp_id AND applied_job.user_id = '$id'";
$retval = mysql_query($sql,$conn);

if(!$retval)
{
die('could not get data:' .mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
echo "company Name-" . $row['companyname'] . "<br>";
echo "Job Title-"  . $row['job_title'] . "<br>";

echo "<br>";

}

?>
