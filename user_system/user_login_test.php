
<?php

include('../db_connect.php');
// starting  sesion
session_start();

//Variable to store Error Message
if(isset($_POST['submit'])){
if(empty($_POST['email']) || empty($_POST['password'])){
$error = "Username or password is invalid";

}
// define the email and password
$email        = $_POST['email'];
$password     = $_POST['password'];
$db_select    = mysql_select_db('smallworld', $conn) ;
//SQL query to fetch information of registred users and finds user match.
$query = mysql_query("select * from candidate_registration where password = '$password' AND email = '$email'" , $conn);
$rows = mysql_num_rows($query);
if($rows ==1){
//here session is used and value of $user_email store in $_SESSION.  
$_SESSION['email'] = $email ; //Initializing Session
header("location:user_view.php"); //Redirecting to other page
}  

else{
echo $error = "Email or password is invalid";
}
mysql_close($conn); //closing connection
}

?>


<html>
<title>User Login</title>
<body>
<form action="<?php $_PHP_SELF ?>" method="post">
<p><label for="email">Email:</label></p>
<input type="email" name="email" id="email"/>
<p><label for="password">Password</label></p>
<input type="password" name="password" id="password" />
<p><input type="submit" name="submit" value="submit"/></p>
Not yet registerd   <a href = "user_registration.php">click here to register</a>

</form>
</body>
</html>
