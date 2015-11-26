<?php
include('../db_connect.php');
//start session()
session_start();

//Variable to store Error Message
if(isset($_POST['submit'])){
if(empty($_POST['email'])|| empty($_POST['password'])){
$error = "Email or password is invalid";
}

//Define the email and password
$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
//SQL query to fetch information of registered users and finds user match.

$query = mysql_query("select * from company_registration where password = '$password' AND email = '$email'" , $conn);
$rows = mysql_num_rows($query);
if($rows == 1){
//here session is used and value of $email store in $_SESSION
$_SESSION['email']  = $email; //Initializing session
header("location:company_view.php");
}
else{
echo $error = "Email or Password is invalid";
}
mysql_close($conn); 
}
?>

<html>
<title>Company Login</title>
<body>
<form action="<?php $_PHP_SELF ?>" method="post">
<p><label for="email">Email:</label></p>
<input type="email" name="email" id="email"/>
<p><label for="password">Password:</label></p>
<input type="password" name="password" id="password">
<p><input type="submit" name="submit" value="submit"/>
&nbsp;&nbsp;<input type="reset" name="reset" id="reset"></p>
Not yet Registered <a href="company-registration.php">Click here to register</a>
</form>
</body>
</html>