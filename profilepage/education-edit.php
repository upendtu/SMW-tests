
<html>
<title>My Profile</title>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php
include('../registration/session.php');
?>

<body>

<div class="header">
<div class="header-bar">
<div class="logo">
<a href="../main/index.php"><img src="../image/smallworld white.png"  alt=""></a>
</div>


<div id="header-search">
<img src="../image/SEARCH.png">
</div>

<div class="dropdown">

<div class="mypage">
<?php
include('../db_connect.php');

$select_query = "select photo FROM candidate_registration WHERE user_id = '$id' ";

$sql = mysql_query($select_query) or die(mysql_error());
while($row = mysql_fetch_array($sql,MYSQL_BOTH)){


?>
<img src='<?php echo "../image-uplaod/" . $row['photo']; ?>' alt = "" />

<?php 
}
?>

</div>
<!-- dropdown menu -->
    <ul class="dropdown-menu">
        <li><a href="index.php">Welcome:<i><?php echo $name; ?></i></a></li>
        <li><a href="editprofile.php">Edit profile</a></li>
        <li><a href="#about">Bookmarks</a></li>
        <li><a href="#contact">Applied Job</a></li>
		<li><a href="#contact">Account setting</a></li>
		<li><a href="../registration/logout.php">Logout</a></li>
    </ul>
</div><!-- close dropdown -->

</div><!-- close header-bar -->

</div>  <!--- header closed -->

<div class="main">

<div class="sidebar-left">

<ul class="sidebar-menu">
<h2>My Home Page</h2>
<h3>Inbox</h3>
<li><a href="#">Recruiter Messages</a></li>
<li><a href="#">Other Message</a></li>
<h3>Profile</h3>
<li><a href="#">View Profile</a></li>
<li><a href="#"> Update Profile</a></li>
<li><a href="#">Upload Photo</a></li>
<li><a href="#">Upload Resume</a></li>
<li><a href="#">Cover Letter</a></li>
<h3>Jobs & Application</h3>
<li><a href="#">View Saved job</a></li>
<li><a href="#">View Applied Job</a></li>
</ul>
</div> <!--close sidebar-left -->


<?php

ob_start();
include('../db_connect.php');
if(isset($_GET['id']))
{

 $id = $_GET['id'];
 if(isset($_POST['update']))
 {

   $education  = $_POST['education'];
   $specialization = $_POST['specialization'];
   $university = $_POST['university'];
   $course_type   = $_POST['course_type'];
   $year_of_passing = $_POST['year_of_passing'];
  
   $updated = mysql_query("UPDATE candidate_registration SET education = '$education', specialization= '$specialization',university = '$university',course_type = '$course_type', year_of_passing = '$year_of_passing' WHERE user_id = '$id'") or die();

   if($updated)
   {

    $msg = "Successfully Updated";
    header('Location:index.php');

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
$sql = "SELECT education,course_type,specialization,university,year_of_passing from candidate_registration where user_id = '$id'";
		$retval = mysql_query($sql,$conn);

if(!$retval)
{
die('could not get data:' .mysql_error());
}
while($profile = mysql_fetch_array($retval,MYSQL_ASSOC))
{

			
			 $education       = $profile['education'];
             $specialization  = $profile['specialization'];
             $university      = $profile['university'];
             $course_type     = $profile['course_type'];
             $year_of_passing = $profile['year_of_passing'];

	?>
<div class="profile-section">
<h1 id="heading-edit"> Update Your Education</h1>
<form action = "" method ="post" name="insertform">
<p><label for="education">Qaulification Level:</label></p>
<select name="education" id="select">
<option value="">Select Highest Qualification...</option>
<option value="10+2 OR Below" <?php if($education =="10+2 OR Below") echo 'selected = "selected"'; ?> >10+2 OR Below</option>
<option value="Diploma/Vocational Course" <?php if($education =="Diploma/Vocational Course") echo 'selected = "selected"'; ?> >Diploma/Vocational Course</option>
<option value="Graduation" <?php if($education =="Graduation") echo 'selected = "selected"'; ?> >Graduation</option>
<option value="PG or Equivalent" <?php if($education =="PG or Equivalent") echo 'selected = "selected"'; ?> >PG or Equivalent</option>
<option value="PhD/MPhil or Equivalent" <?php if($education =="PhD/MPhil or Equivalent") echo 'selected = "selected"'; ?> >PhD/MPhil or Equivalent</option>
</select>

<p><label for="specialization">Education Specialization:</label></p>
<select name="specialization" id="select">
<option value="">Select specialization</option>
<option value="Agriculture" <?php if($specialization =="Agriculture") echo 'selected = "selected"'; ?> >Agriculture</option>
<option value="Automobile" <?php if($specialization =="Automobile") echo 'selected = "selected"'; ?> >Automobile</option>
<option value="Aviation" <?php if($specialization =="Aviation") echo 'selected = "selected"'; ?> >Aviation</option>
<option value="Bio-Chemistry/Bio-Technology" <?php if($specialization =="Bio-Chemistry/Bio-Technology") echo 'selected = "selected"'; ?> >Bio-Chemistry/Bio-Technology</option>
<option value="Biomedical" <?php if($specialization =="Biomedical") echo 'selected = "selected"'; ?> >Biomedical</option>
<option value="Civil" <?php if($specialization =="Civil") echo 'selected = "selected"'; ?> >Civil</option>
<option value="Computers" <?php if($specialization =="Computers") echo 'selected = "selected"'; ?> >Computers</option>
<option value="Electrical/Electronics/Telecommunication" <?php if($specialization =="Electrical/Electronics/Telecommunication") echo 'selected = "selected"'; ?> >Electrical/Electronics/Telecommunication</option>
<option value="other" <?php if($specialization =="other") echo 'selected = "selected"'; ?> >Other</option>
</select>
<p><label for="university">University Name </label></p>
<input type="text" name="university" id="university" value="<?php echo $university ; ?>"  placeholder="University  Name" />
<p><label for="year_of_passing">Year Of Passing </label></p>
<select name="year_of_passing" id="select">
<option value="<?php echo $year_of_passing; ?>">Select year of passing</option>
<?php
for($x=date("Y")+4; $x>1970; $x--)
{
echo '<option value = "'.$x.'">' .$x. '</option>>';
}
?>
</select>

<br><br>
<p><label for="course_type">Course Type:</label> 

<input type="radio" name="course_type" value="Full_Time" checked />Full Time
<input type="radio" name="course_type" value="Part_Time" />Part Time
<input type="radio" name="course_type" value="Correspondence" />Correspondence
</p>

<p><input type = "submit" name = "update" value = "Save Update" id="updatebutton" /></p>
<input type="button" value="cancel" onClick="document.location.href='index.php';" id="cancelbutton" />
</form>

		

		<?php }}  ?>

</body>
</html>
