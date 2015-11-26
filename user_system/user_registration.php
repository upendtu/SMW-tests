

<?php 
include('../db_connect.php');
?>


<html>
<title>User Registration</title>

<style>
.error{color: #FF0000;}
</style>
<body>

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
	if(empty($_POST['university'])){
	 $universityErr = "Please fill your university name";
	 $valid = false;
	}
 else{
     $university = test_input($_POST['university']);
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
$location          = $_POST['location'];
$mobile            = $_POST['mobile'];
$dob               = $_POST['dob'];
$sex               = $_POST['sex'];
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


$sql = "INSERT INTO candidate_registration" . "(email,password,name,location,phone,dob,gender,education,specialization,university,course_type,year_of_passing,skill,project_title,project_details,role_description)" . "VALUES('$email','$password','$name','$location','$mobile','$dob','$sex','$education','$specialization','$university','$course','$passing_year','$skill','$p_title','$project_details','$role_description')";

mysql_select_db('smallworld');

$query = mysql_query($sql);

if(!$query){
  
  die('Could not enter data:' .mysql_error());
}
echo "Entered data successfully\n";
}

mysql_close();

}




?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
<fieldset>
<h1>Create Login Details</h1>
<p>
<label for="email">Enter your Email ID :</label></p>
<input type="email" name="email" id="email" value="<?php echo $email; ?>" />
<span class="error">* <?php echo $emailErr;?></span>
<span class="error"><?php echo $error_message; ?></span>
   <br><br>

<p>
<label for="password">Create Password :</label></p>
<input type="password" name="password" id="password" />
<span class="error">* <?php echo $passwordErr; ?></span>

<p>
<label for="confirm_password">Confirm Password:</label></p>
<input type="password" name="confirm_password" id="confirm_password" />

<h1>Your Contact Information</h1>
<p>
<label for="name">full name:</label></p>
<input type="text" name="name" id="name" value="<?php echo $name ;?>" />
 <span class="error">* <?php echo $nameErr;?></span>
   <br><br>

<p>
<label for="location">current location:</label></p>
<input type="text" name="location" id="location" value="<?php echo $location ; ?>" />
<span class="error">*<?php echo $locationErr; ?></span>
<br><br>

<p>
<label for="phone">Mobile number:</label></p>
<input type="tel" name="mobile" id="mobile" value="<?php echo $mobile; ?>" />
<span class="error">*<?php echo $mobileErr; ?></span>
<p>
<label for="dob">Date of birth: </label></p>
<input type="date" name="dob" id="dob" value="<?php echo $dob; ?>"/>
<span class="error">*<?php echo $dobErr; ?></span>
<br><br>
<P><label for="gender">Gender:</label></P>
<input type="radio" name="sex" id="sex" value="male" checked="checked" />Male

<input type="radio" name="sex" id="sex" value="female" />Female

<h1>Education Details</h1>
<p><label for="education">Qaulification Level:</label></p>
<select name="education">
<option value="">Select Highest Qualification...</option>
<option value="elementary">10+2 OR Below</option>
<option value="high">Diploma/Vocational Course</option>
<option value="graduation">Graduation</option>
<option value="pg">PG or Equivalent</option>
<option value="phd">PhD/MPhil or Equivalent</option>
</select>
<p><label for="specialization">Education Specialization:</label></p>
<select name="specialization">
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
<p><label for="university">University Name:</label></p>
<input type="text" name="university" id="university" value="<?php echo $university ; ?>"  />
<p><label for="course_type">Course Type:</label> </p>
<input type="radio" name="course_type" value="full_time" checked />Full Time
<input type="radio" name="course_type" value="part_time" />Part Time
<input type="radio" name="course_type" value="Correspondence" />Correspondence
<p><label for="passing_year">Year of passing:</label></p>
<select name="passing_year">
<option value="<?php echo $passing_year; ?>">Select year of passing</option>
<?php
for($x=date("Y"); $x>1900; $x--)
{
echo '<option value = "'.$x.'">' .$x. '</option>>';
}
?>
</select>
<h1>Technical Skills</h1>
<p><label for="skill">Skill</label></p>
<textarea rows="5" cols="30" name="skill" id="skill" value = "<?php echo $skill; ?>"></textarea>
<h1>Add Project</h1>
<p><label for="project">Project Title:</label></p>
<input type="text" name="p_title" id="p_title" value="<?php echo $p_title;?>" />
<p><label for="project_details">Project Details:</label></p>
<textarea rows="10" cols="35" name="project_details" id="project_details"></textarea>
<p><label for="role_description">Role Description:</label></p>
<textarea rows="10" cols="35" name="role_description" id="role_description"></textarea>

<p><input type="submit" name="submit" value="submit"/></p>

</fieldset>
</form>


</body>
</html>
