<?php
include('company_session.php');
?>
<html>
<b id="welcome">Welcome:<i><?php echo $login_session ; ?></i></b>
<b id="logout"><a href="company_logout.php">Log Out </a></b></br>
<br><br>
<a href="view_job.php">View all Your posted job</a>
</html>
<?php
include('../db_connect.php');
$sql = "SELECT cmp_id,email,companyname,companyprofile,address,industrytype,companyurl,contactperson,country,city,pincode,phone,fax,contact_email FROM company_registration where email = '$login_session'";

$retval = mysql_query($sql,$conn);
if(!$retval){
die('could not get data:' .mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{

$id = $row['cmp_id'];
$email = $row['email'];
$cname = $row['companyname'];
$cprofile = $row['companyprofile'];
$caddress = $row['address'];
$cindustry = $row['industrytype'];
$cperson = $row['contactperson'];
$country = $row['country'];
$city    = $row['city'];
$pincode  = $row['pincode'];
$phone    = $row['phone'];
$fax      = $row['fax'];
$cemail   = $row['contact_email'];

?>
<p> Company ID: <span><?php echo $id; ?></span></p>
<p> Company Name: <span><?php echo $cname; ?> </span></p>
<p> Company Address:<span><?php echo $caddress; ?> </span></p>
<p> Company Profile:<span><?php echo $cprofile; ?> </span></p>
<p> Company Industry Type:<span><?php echo $cindustry; ?> </span></p>
<p> Contact Person Name:<span><?php echo $cperson; ?> </span></p>
<p> Company Country:<span><?php echo $country; ?> </span></p>
<p> Company city:<span><?php echo $city; ?> </span></p>
<p> Company phone:<span><?php echo $phone; ?> </span></p>

<a href="cprofile_edit.php?id=<?php echo $id; ?>"><span class="edit" title="edit">EDIT</span></a>
<?php
}
?>