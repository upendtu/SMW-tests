
<?php
include('session.php');

ob_start();
include('../db_connect.php');
if(isset($_GET['id']))
{

 $id = $_GET['id'];
 if(isset($_POST['update']))
 {

   $email = $_POST['email'];
   $name  = $_POST['name'];
   $skill = $_POST['skill'];
   $mobile = $_POST['mobile'];

   $updated = mysql_query("UPDATE candidate_registration SET email= '$email',name = '$name', skill= '$skill', phone = '$mobile' WHERE user_id = '$id'") or die();

   if($updated)
   {

    $msg = "Successfully Updated";
    header('Location:user_view.php');

   }

 }


}

?>

<html>
<title>Edit the form</title>
<body>

<?php

     if(isset($_GET['id']))
     {
     	$id = $_GET['id'];
     
       // $id = '2';

		//$getselect = mysql_query("SELECT * FROM candidate_registration WHERE user_id = '2'");
$sql = "SELECT user_id,email,name,location,phone,dob,gender,education,specialization,university,course_type,year_of_passing,skill,project_title,project_details,role_description from candidate_registration where user_id = '$id'";
		$retval = mysql_query($sql,$conn);

if(!$retval)
{
die('could not get data:' .mysql_error());
}
while($profile = mysql_fetch_array($retval,MYSQL_ASSOC))
{

			$email = $profile['email'];
			$name  = $profile['name'];
			$skill  = $profile['skill'];
			$mobile = $profile['phone'];

	?>

			<form action = "" method ="post" name="insertform">

<p><label for="email">Enter your Email ID :</label></p>
<input type="email" name="email" id="email" value = "<?php echo $email ; ?>" />
<p>
<label for="name">full name:</label></p>
<input type="text" name="name" id="name" value = "<?php echo $name ; ?>" />

<p>
<label for="skill">skill:</label></p>
<input type="text" name="skill" id="skill"  value = "<?php echo $skill; ?>"/>

<p>
<label for="phone">Mobile number:</label></p>
<input type="tel" name="mobile" id="mobile"  value = "<?php echo $mobile ; ?>"/>

<p><input type = "submit" name = "update" value = "update" /></p>

</form>

		

		<?php }}  ?>

</body>
</html>













































<?php
/* // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($id ,$email,$name,$location, $phone,$dob, $gender,$education,$specialization,$university,$course_type,$year_of_passing,$skill,$project_title,$project_details,$role_description, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Record</title>
 </head>
 <body>
 
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
 
 <p><strong>ID:</strong> <?php echo $id; ?></p>
	
<html>
<title>User Registration</title>
<body>
<form action="<?php $_PHP_SELF ?>" method="post">
<fieldset>
<h1>Create Login Details</h1>
<p>
<label for="email">Enter your Email ID :</label></p>
<input type="email" name="email" id="email" />

<p>
<label for="password">Create Password :</label></p>
<input type="password" name="password" id="password" />

<p>
<label for="confirm_password">Confirm Password:</label></p>
<input type="password" name="confirm_password" id="confirm_password" />

<h1>Your Contact Information</h1>
<p>
<label for="name">full name:</label></p>
<input type="text" name="name" id="name" />

<p>
<label for="location">current location:</label></p>
<input type="text" name="location" id="location" />

<p>
<label for="phone">Mobile number:</label></p>
<input type="tel" name="mob" id="mob" />

<p>
<label for="dob">Date of birth: </label></p>
<input type="date" name="dob" id="dob" />
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
<input type="text" name="university" id="university" />
<p><label for="course_type">Course Type:</label> </p>
<input type="radio" name="course_type" value="full_time" checked />Full Time
<input type="radio" name="course_type" value="part_time" />Part Time
<input type="radio" name="course_type" value="Correspondence" />Correspondence
<p><label for="passing_year">Year of passing:</label></p>
<select name="passing_year">
<option value="">Select year of passing</option>
<?php
for($x=date("Y"); $x>1900; $x--)
{
echo '<option value = "'.$x.'">' .$x. '</option>>';
}
?>
</select>
<h1>Technical Skills</h1>
<p><label for="skill">Skill</label></p>
<textarea rows="5" cols="30" name="skill" id="skill"></textarea>
<h1>Add Project</h1>
<p><label for="project">Project Title:</label></p>
<input type="text" name="p_title" id="p_title" />
<p><label for="project_details">Project Details:</label></p>
<textarea rows="10" cols="35" name="project_details" id="project_details"></textarea>
<p><label for="role_description">Role Description:</label></p>
<textarea rows="10" cols="35" name="role_description" id="role_description"></textarea>

<p><input type="submit" name="submit" value="submit"/></p>

</fieldset>
</form>
 </body>
 </html> 
 <?php
 }



  // Connects to your Database  
    mysql_connect("localhost", "root", "") or 
    die(mysql_error()) ; 
     mysql_select_db("smallworld") or 
	 die(mysql_error()) ;  
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id']))
 {
 // get form data, making sure it is valid
 $id = $_POST['id'];
 
   
 //This gets all the other information from the form
    
$email             = $_POST['email'];
$password          = $_POST['password'];
$name              = $_POST['name'];
$location          = $_POST['location'];
$mobile            = $_POST['mob'];
$dob               = $_POST['dob'];
$sex               = $_POST['sex'];
$education         = $_POST['education'];
$specialization    = $_POST['specialization'];
$university        = $_POST['university'];
$course            = $_POST['course_type'];
$passing_year      = $_POST['passing_year'];
$p_title           = $_POST['p_title'];
$project_details   = $_POST['project_details'];
$role_description  = $_POST['role_description'];

  
  
   
   
 // check that firstname/lastname fields are both filled in
 if (  $name == '' ||   $mobile == '' ||  $dob == '' || $education == '' ||  $specialization == '' || $university == '' ||  $passing_year == ''  )
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($id ,$name, $mobile,$dob,$education ,$specialization ,$university,$passing_year, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("UPDATE candidate_registration SET name='$name' ,location = '$location' , phone='$mobile' ,dob='$dob', gender='$sex', education='$education', specialization='$specialization' , university='$university' , course_type='$course', year_of_passing='$passing_year', skill='$skill', project_title='$p_title', project_details='$project_details', role_description='$role_description' WHERE id='$id'")
 

 or die(mysql_error()); 

 
 // once saved, redirect back to the view page
 header("Location: user_view.php"); 
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['user_id']) && is_numeric($_GET['user_id']) && $_GET['user_id'] > 0)
 {
 // query db
 //$id = $_GET['id'];
 $result = mysql_query("SELECT user_id, name,location,phone,dob,gender,education,specialization,university,course_type,year_of_passing,skill,project_title,project_details,role_description FROM candidate_registration WHERE id=$_GET[id]")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
$email             = $row['email'];
$password          = $row['password'];
$name              = $row['name'];
$location          = $row['location'];
$mobile            = $row['mob'];
$dob               = $row['dob'];
$sex               = $row['sex'];
$education         = $row['education'];
$specialization    = $row['specialization'];
$university        = $row['university'];
$course            = $row['course_type'];
$passing_year      = $row['passing_year'];
$p_title           = $row['p_title'];
$project_details   = $row['project_details'];
$role_description  = $row['role_description'];


 
 // show form
 renderForm($id ,$email,$name,$location, $phone,$dob, $gender,$education,$specialization,$university,$course_type,$year_of_passing,$skill,$project_title,$project_details,$role_description,  '');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!ppppppppp';
 }
 }*/
?>