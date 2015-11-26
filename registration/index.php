


<!DOCTYPE html>
<html>
<head>
<title>Login-Registration</title>
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
?>



  <!--Defining Error here -->
<?php

//defining veriables and set to empty value

$emailErr = $nameErr = $passwordErr = $locationErr= $mobileErr = $dobErr = $sexErr = $educationErr =$universityErr = $error_message = "";
$email =$name = $password = $location = $mobile = $dob = $sex = $education = $specialization = $university = $skill = $p_title = $project_details = $role_description =   "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

   $valid = true;
    if(empty($_POST['email'])){
    $emailErr = "Email is required";
	$valid = false;
	}
  else{
    $email = test_input($_POST['email']);
      }
    if(empty($_POST['password'])){
    $passwordErr = "Password can not be empty";
	$valid = false;
    }
  else{
    $password = test_input($_POST['password']);
      }
    if(empty($_POST['name'])){
    $nameErr = "Name is required";
	$valid = false;
    }
 else{
    $name = test_input($_POST['name']);
     }
    if(empty($_POST['location'])){
    $locationErr = "Location is required";
	$valid = false;
	}
  else{
    $location = test_input($_POST['location']);
	}
	if(empty($_POST['mobile'])){
	$mobileErr = "Mobile number is required";
	$valid = false;
	}
  else{
    $mobile = test_input($_POST['mobile']);
      }
    if(empty($_POST['dob'])){
    $dobErr = "Please select your date of birth";
    $valid = false;
     }
  else{
    $dob = test_input($_POST['dob']);
	}

	
}


function test_input($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

//inserting form data into database
if(@$valid == true)
{
$email             = $_POST['email'];
$password          = $_POST['password'];
$name              = $_POST['name'];
$country          = $_POST['location'];
$language        = $_POST['language'];
$work_type     = $_POST['work_type'];
$mobile            = $_POST['mobile'];
$dob               = $_POST['dob'];
/*$sex               = $_POST['sex'];
$education         = $_POST['education'];
$specialization    = $_POST['specialization'];
$university        = $_POST['university'];
$course            = $_POST['course_type'];
$passing_year      = $_POST['passing_year'];
$skill             = $_POST['skill'];
$p_title           = $_POST['p_title'];
$project_details   = $_POST['project_details'];
$role_description  = $_POST['role_description'];

$email_check = "SELECT email FROM candidate_registration WHERE email = '$email'";
$result = mysqli_query($conn ,$email_check);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows > 0){
  $error_message = "sorry this email already exists in our list";
  //echo "email already exists";
}
else{

*/
$sql = "INSERT INTO candidate_registration" . "(email,password,name,country,language,work_type,phone,dob)" . "VALUES('$email','$password','$name','$country' ,'$language' ,'$work_type','$mobile','$dob')";

mysql_select_db('smallworld');

$query = mysql_query($sql);

if(!$query){
  
  die('Could not enter data:' .mysql_error());
}
echo "Entered data successfully\n";
header("location:../Mypage/index.php"); //Redirecting to other page

//}

mysql_close();

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
 
<div class="signup"> Sign up </div>
			  
			   <div class="resp-tabs-container">
				 
							
 

                                    <!--login1-->
								<div class="register">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
<br><br>
<h1>Create Login Details</h1>
<br><br>

<input type="text" name="email" id="email" value="<?php echo $email; ?>"  placeholder="Email"/>
<span class="error"><?php echo $emailErr;?></span>
<span class="error"><?php echo $error_message; ?></span>
<br><br>



<input type="password" name="password" id="password" placeholder="Password" />
<span class="error"><?php echo $passwordErr; ?></span>
<br><br>
<input type="password" name="confirm_password" id="confirm_password" placeholder="Re-Enter Password" />
<br><br>


<h1>Your Contact Information</h1>
<br><br>


<input type="text" name="name" id="name" value="<?php echo $name ;?>"  placeholder="Name"/>
 <span class="error"><?php echo $nameErr;?></span>
   <br><br>
<input type="text" name="location" id="location" value="<?php echo $location ; ?>"  placeholder="Country"/>
<span class="error"><?php echo $locationErr; ?></span>
<br><br>

<input type="text" name="language" id="language" value="<?php echo $location ; ?>"  placeholder="What language can you speak(Like : English , Japanese,Korean,Chinese)"/>
<span class="error"><?php echo $locationErr; ?></span>
<br><br>

<input type="text" name="work_type" id="work_type" value="<?php echo $location ; ?>"  placeholder="Functional Area(Like : Sales,marketing,software Development)"/>
<span class="error"><?php echo $locationErr; ?></span>
<br><br>


<input type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>" placeholder="Mobile No." />
<span class="error"><?php echo $mobileErr; ?></span>
<br><br>

<input type="text"  name="dob" id="datepicker" placeholder = "Date Of Birth" />
<span class="error"><?php echo $dobErr; ?></span>
<br><br>
<!--<label for="gender">gender:</label>

<input type="radio" name="sex" id="sex" value="male" checked="checked" />Male

<input type="radio" name="sex" id="sex" value="female" />Female
<br><br>
<h1>Education Details</h1>
<br><br>
<p><label for="education">Qaulification Level:</label></p>
<br><br>
<select name="education" id="select">
<option value="">Select Highest Qualification...</option>
<option value="elementary">10+2 OR Below</option>
<option value="high">Diploma/Vocational Course</option>
<option value="graduation">Graduation</option>
<option value="pg">PG or Equivalent</option>
<option value="phd">PhD/MPhil or Equivalent</option>
</select>
<br><br>
<p><label for="specialization">Education Specialization:</label></p>
<br><br>
<select name="specialization" id="select">
<option value="">Select specialization</option>
<option value="agriculture">Agriculture</option>
<option value="automobile">Automobile</option>
<option value="Aviation">Aviation</option>
<option value="bio">Bio-Chemistry/Bio-Technology</option>
<option value="biomedical">Biomedical</option>
<option value="civil">Civil</option>
<option value="computer" selected>Computers</option>
<option value="electrical">Electrical/Electronics/Telecommunication</option>
<option value="other">Other</option>
</select>
<br><br>
<input type="text" name="university" id="university" value="<?php echo $university ; ?>"  placeholder="University  Name" />
<br><br>
<label for="course_type">Course Type:</label> 

<input type="radio" name="course_type" value="full_time" checked />Full Time
<input type="radio" name="course_type" value="part_time" />Part Time
<input type="radio" name="course_type" value="Correspondence" />Correspondence
<br><br>
<p><label for="passing_year">Year of passing:</label></p>
<br><br>
<select name="passing_year" id="select">
<option value="<?php echo $passing_year; ?>">Select year of passing</option>
<?php
for($x=date("Y")+4; $x>1970; $x--)
{
echo '<option value = "'.$x.'">' .$x. '</option>>';
}
?>
</select>
<br><br>
<h1>Technical Skills</h1>
<br><br>
<p><label for="skill">Technical Skill</label></p>
<br><br>
<textarea rows="5" cols="30" name="skill" id="textbox" value = "<?php echo $skill; ?>" placeholder="Please write your all Technical Skill"></textarea>
<br><br>
<h1>Add Project</h1>
<br><br>

<input type="text" name="p_title" id="p_title" value="<?php echo $p_title;?>" placeholder="project Title" />
<br><br>
<p><label for="project_details">Project Details:</label></p>
<br><br>
<textarea rows="10" cols="35" name="project_details" id="textbox" placeholder="Write about your project"></textarea>
<br><br>
<p><label for="role_description">Role Description:</label></p>
<br><br>
<textarea rows="10" cols="35" name="role_description" id="textbox" placeholder="What was your role in that project"></textarea>--->
<br><br>
<div class="sign-up">
<p><input type="submit" name="submit" value="submit"/></p>
</div>
<p>Already registered..Go to <a href="login.php">Login page</a></p>

</form>

</div>
</div>
</div>
</div>
</div>


</body>

</html>
