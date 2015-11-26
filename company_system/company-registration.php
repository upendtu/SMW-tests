<?php
include('../db_connect.php');
?>
<html>
<style>
.error{color:#FF0000;}
</style>
<!-- Defining Error Here. -->
<?php
// Defining Veriables and set to empty value

$emailError = $passwordError = $companynameError = $companyprofileError =$industrytypeError = $contactpersonError = $companyurlError = $addressError = $countryError = $cityError = $pincodeError = $phoneError = "";

$email = $password = $companyname = $companyprofile = $industrytype = $contactperson = $companyurl = $address = $country = $city = $pincode = $phone = $fax = $cemail = "" ;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
   $valid = true;
   if(empty($_POST['email'])){
   
   $emailError = "Email is required";
   $valid = false;
   }
   else{
   $email = test_input($_POST['email']);
   }
   if(empty($_POST['password'])){
   $passwordError = "Password cann't be empty";
   $valid = false;
   }
   else{
   $password = test_input($_POST['password']);
   }
   if(empty($_POST['companyname'])){
   $companynameError = "company name cann't be empty";
   $valid = false;
   }
   else{
   $companyname = test_input($_POST['companyname']);
   }
   if(empty($_POST['companyprofile'])){
   $companyprofileError = "Please fill the company profile.";
   $valid = false;
   }
   else{
   $companyprofile = test_input($_POST['companyprofile']);
   }
   if(empty($_POST['contactperson'])){
   $contactpersonError = "cantact person name cann't be empty";
   $valid = false;
   }
   else{
   $contactperson = test_input($_POST['contactperson']);
   }
   if(empty($_POST['companyurl'])){
   $companyurlError = "website URL cann't be empty";
   $valid = false;
   }
   else{
   $companyurl = test_input($_POST['companyurl']);
   }
   if(empty($_POST['address'])){
   $addressError = "Company address cann't be empty";
   $valid = false;
   }
   else{
   $address = test_input($_POST['address']);
   }
   if(empty($_POST['country'])){
   $countryError = "country cann't be empty";
   $valid = false;
   }
   else{
   $country = test_input($_POST['country']);
   }
   if(empty($_POST['city'])){
   $cityError = "city cann't be empty";
   $valid = false;
   }
   else{
   $city = test_input($_POST['city']);
   }
   if(empty($_POST['pincode'])){
   $pincodeError = "pincode cann't be empty";
   $valid = false;
   }
   else{
   $pincode = test_input($_POST['pincode']);
   }
   if(empty($_POST['phone'])){
   $phoneError = "phone cann't be empty";
   $valid = false;
   }
   else{
   $phone = test_input($_POST['phone']);
   }
   
}

function test_input($data){
 $data = trim($data);
 $data = stripcslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}

// inserting form data into database

if(@$valid == true)
{

$email = $_POST['email'];
$password = $_POST['password'];
$companyname = $_POST['companyname'];
$companyprofile = $_POST['companyprofile'];
$industrytype = $_POST['industrytype'];
$contactperson = $_POST['contactperson'];
$companyurl = $_POST['companyurl'];
$companyaddress = $_POST['address'];
$country = $_POST['country'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];
$cemail = $_POST['cemail'];

/* $email_check = "SELECT email FROM company_registration WHERE email = '$email'" ;
$result = mysqli_query($conn ,$email_check);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows>0){
$error_message = "sorry this email already exists in our list.";

}
else{
*/
  
  $sql = "INSERT INTO company_registration(email,password,companyname,companyprofile,industrytype,contactperson,companyurl,address,country,city,pincode,phone,fax,contact_email) VALUES ('$email', '$password','$companyname', '$companyprofile','$industrytype','$contactperson','$companyurl','$companyaddress','$country','$city','$pincode','$phone','$fax','$cemail')" ;
  
  $query = mysql_query($sql);
  if(!$query){
  die('could not enter data:' .mysql_error());
  }
  echo "Entered data successfully\n";
//}

mysql_close();
}

?>



<html>
<title>Company Registration</title>
<body>
<h1>Create Your Company Profile</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<fieldset>
<h3>Account Details </h3>
<p>
<label for="email">Enter your Email ID: </label></p>
<input type="email" name="email" id="email" value="<?php echo $email ; ?>"/>
<span class="error">* <?php echo $emailError;?></span>
<br><br>
<p>
<label for="password">Enter your password: </label></p>
<input type="password" name="password" id="password" value=""/>
<span class="error">* <?php echo $passwordError;?></span>
<br><br>
<p>
<label for="repassword">Re Enter your password: </label></p>
<input type="password" name="repassword" id="repassword" value=""/>
<br><br>
<h3>Company Details</h3>
<p>
<label for="companyname">Company Name: </label></p>
<input type="text" name="companyname" id="companyname" value="<?php echo $companyname ; ?>"/>
<span class="error">* <?php echo $companynameError;?></span>
<br><br>
<p>
<label for="companyprofile">Company Profile</label></p>
<textarea name="companyprofile" id="companyprofile" rows="10" cols="35"></textarea>
<span class="error">* <?php echo $companyprofileError;?></span>
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
<input type="text" name="contactperson" id="contactperson"/>
<span class="error">* <?php echo $contactpersonError;?></span>
<p>
<label for="company-url">Company URL:</label></p>
<input type="text" name="companyurl" id="companyurl"/>
<span class="error">* <?php echo $companyurlError;?></span>
<br><br>
<h2>Contact Details</h2>
<p>
<label for="address"> Company Address:</label></p>
<textarea name="address" id="address" cols="30" rows="5"></textarea>
<span class="error">* <?php echo $addressError;?></span>
<br><br>
<p>
<label for="country">Country:</label></p>
<input type="text" name="country" id="country"/>
<span class="error">* <?php echo $countryError;?></span>
<br><br>
<p>
<label for="city">City:</label></p>
<input type="text" name="city" id="city"/>
<span class="error">* <?php echo $cityError;?></span>
<br><br>
<p>
<label for="pincode">Pincode:</label></p>
<input type="text" name="pincode" id="pincode"/>
<span class="error">* <?php echo $pincodeError;?></span>
<br><br>
<p>
<label for="phone">Phone Number:</label></p>
<input type="text" name="phone" id="phone"/>
<span class="error">* <?php echo $phoneError;?></span>
<br><br>
<p><label for="fax">Fax Number:</label></p>
<input type="text" name="fax" id="fax"/>
<br><br>
<p>
<label for="contact-email">Contact Email:</label></p>
<input type="email" name="cemail" id="cemail" >

<br><br>
<input type="submit" name="submit" value="submit"/>
<input type="reset" name="reset" value="Reset">

</fieldset>
</form>


</body>
</html>