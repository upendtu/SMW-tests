<?php
include('company_session.php');
include('../db_connect.php');
ob_start();
if(isset($_GET['id']))
{
$id = $_GET['id'];
if(isset($_POST['update']))
{
//$cmpid    = $_POST['cmp_id'];
$email     = $_POST['email'];
$cname     = $_POST['companyname'];
$cprofile  = $_POST['companyprofile'];
$curl      = $_POST['companyurl'];
$caddress  = $_POST['address'];
$cindustry = $_POST['industrytype'];
$cperson   = $_POST['contactperson'];
$country   = $_POST['country'];
$city      = $_POST['city'];
$pincode   = $_POST['pincode'];
$phone     = $_POST['phone'];
$fax       = $_POST['fax'];
$cemail    = $_POST['cemail'];

$updated = mysql_query("UPDATE company_registration SET companyname = '$cname',companyprofile = '$cprofile',companyurl = '$curl',address='$caddress',industrytype='$cindustry',contactperson='$cperson',country = '$country',city ='$city',pincode='$pincode',phone = '$phone',fax = '$fax',contact_email = '$cemail' WHERE cmp_id = '$id'") or die();

if($updated){
$msg = 'Successfully Updated';
header('Location:company_view.php');
}

}

}
?>

<html>
<title>Update the company Profile</title>
<body>
<?php
if(isset($_GET['id']))
{
$id = $_GET['id'];
$sql = "SELECT cmp_id,email,companyname,companyurl,companyprofile,address,industrytype,contactperson,phone,country,city,fax,pincode,contact_email FROM company_registration WHERE cmp_id = '$id'";

$retval = mysql_query($sql, $conn);

if(!$retval)
{
die('could not get data:' .mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
$id         = $row['cmp_id'];
$email      = $row['email'];
$cname      = $row['companyname'];
$cprofile   = $row['companyprofile'];
$curl       = $row['companyurl'];
$caddress   = $row['address'];
$cindustry  = $row['industrytype'];
$cperson    = $row['contactperson'];
$country    = $row['country'];
$city       = $row['city'];
$pincode    = $row['pincode'];
$phone      = $row['phone'];
$fax        = $row['fax'];
$cemail     = $row['contact_email'];

?>

<form action=" " method="post">
<fieldset>
<h3>Account Details </h3>
<p>
<label for="email">Enter your Email ID: </label></p>
<input type="email" name="email" id="email" value="<?php echo $email ; ?>" />
<br><br>
<h3>Company Details</h3>
<p>
<label for="companyname">Company Name: </label></p>
<input type="text" name="companyname" id="companyname" value="<?php echo $cname ; ?>"/>

<br><br>
<p>
<label for="companyprofile">Company Profile</label></p>
<textarea name="companyprofile" id="companyprofile" value="<?php echo $cprofile ;?>" rows="10" cols="35"></textarea>

<br><br>
<p>
<label for="industrytype">Industry Type</label></p>
<select name="industrytype" id="industrytype">
<option value="2">Accessories/Apparel/Fashion Design</option>
<option value="3">Accounting/Consulting/Taxation</option>
<option value="4">Airlines/Hotel/Hospitality/Travel/Tourism/Restaurants</option>
<option value="5">Banking/Financial services/stockbroking</option>
<option value="6">BioTechnology/Pharmaceutical/clinical Research</option>
<option value="7">chemical/petro chemicals/plastics</option>
<option value="8">CRM/IT Enabled Services/BPO</option>
<option value="9">Education/Training/Teaching</option>
<option value="11">Retailing</option>
<option value="12">Real Estate</option>
<option value="13">Entertainment/Media/Publishing/Dotcom</option>
<option value="14">Employment Firms/Recruitment Services Firms</option>
<option value="15">Petroleum/Oil and Gas/Projects/Infrastructure/Power/Non-conventional Energy</option>
<option value="16" selected="selected">Software Services</option>
<option value="17">Others/Engg. Services/Service Providers</option>
</select>
<br><br>

<p>
<label for="contact-person"> Contact Person</label></p>
<input type="text" name="contactperson" id="contactperson" value="<?php echo $cperson ;?>"/>

<p>
<label for="company-url">Company URL:</label></p>
<input type="text" name="companyurl" id="companyurl" value="<?php echo $curl; ?>"/>

<br><br>
<h2>Contact Details</h2>
<p>
<label for="address"> Company Address:</label></p>
<textarea name="address" id="address" value="<?php echo $caddress; ?>" cols="30" rows="5"></textarea>

<br><br>
<p>
<label for="country">Country:</label></p>
<input type="text" name="country" id="country" value="<?php  echo $country;?>"/>

<br><br>
<p>
<label for="city">City:</label></p>
<input type="text" name="city" id="city" value="<?php echo $city ;?>"/>

<br><br>
<p>
<label for="pincode">Pincode:</label></p>
<input type="text" name="pincode" id="pincode" value="<?php echo $pincode ?>"/>

<br><br>
<p>
<label for="phone">Phone Number:</label></p>
<input type="text" name="phone" id="phone" value="<?php  echo $phone;?>"/>

<br><br>
<p><label for="fax">Fax Number:</label></p>
<input type="text" name="fax" id="fax" value="<?php echo $fax; ?>"/>
<br><br>
<p>
<label for="contact-email">Contact Email:</label></p>
<input type="email" name="cemail" id="cemail" value="<?php echo $cemail ;?>" />
<br><br>
<input type="submit" name="update" value="update"/>

</fieldset>
</form>

<?php }}
?>
</body>
</html>