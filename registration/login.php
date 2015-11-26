
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tab Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>

<!--  Data of birth picker --->	  
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css">-->
 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  <!--   End of Dare picker --->
  
  
  
  <!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
<!--//webfonts-->

<style>
.error{
color: #FF00FF;
font-family: Bell MT;}

</style>

</head>
<?php
include('db_connect.php');
// starting  sesion
session_start();

//Variable to store Error Message
if(isset($_POST['submit'])){
if(empty($_POST['email']) || empty($_POST['password'])){
$error = "Username or password is invalid";

}
// define the email and password
$email        = mysql_real_escape_string($_POST['email']);
$password     = mysql_real_escape_string($_POST['password']);
$db_select    = mysql_select_db('smallworld', $conn) ;
//SQL query to fetch information of registred users and finds user match.
$query = mysql_query("select * from candidate_registration where password = '$password' AND email = '$email'" , $conn);
$rows = mysql_num_rows($query);
if($rows ==1){

           
            unset($row['password']); 
//here session is used and value of $user_email store in $_SESSION.  
$_SESSION['email'] = $email ; //Initializing Session
$_SESSION['password'] = $password;
header("location:../Mypage/index.php"); //Redirecting to other page
}  

else{
echo $error = "Email or password is invalid";
}
mysql_close($conn); //closing connection
}

?>





<body>
<div class="header">
<div class="logo">
<a href="../main/index.php"><img src="../image/smallworld white.png"  alt=""></a>
</div>
</div>
<div class="main">
		
		<h2>Welcome To Small World</h2>

<div class="sap_tabs">	

 <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
 
<div class="signup"> Sign In </div>
			  
			   <div class="resp-tabs-container">
				 
							
 

                                    <!--login1-->
								<div class="register">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
<br><br>
<h1>Insert Login Details</h1>
<br><br>

<input type="text" name="email" id="email"   placeholder="Email" required = ""/><br>

<br><br>



<input type="password" name="password" id="password" placeholder="Password"  required = ""/>

<br><br>
<div class="sign-up">
<p><input type="submit" name="submit" value="submit"/></p>
</div>
<p>Not yet registered..Go to <a href="index.php">Registration Page</a></p>

</form>

</div>
</div>
</div>
</div>
</div>

</body>
</html>
