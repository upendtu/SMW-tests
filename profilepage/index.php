<html>
<title>My Profile</title>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<?php
include("session.php");
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
<!--<img src="image/men-2.png">-->

</div>
<!-- dropdown menu -->
    <ul class="dropdown-menu">
        <li><a>Welcome:<i><?php echo $name; ?></i></a></li>
        <li><a href="index.php">Edit profile</a></li>
        <li><a href="#about">Bookmarks</a></li>
        <li><a href="#contact">Applied Job</a></li>
		<li><a href="#contact">Account setting</a></li>
		<li><a href="../registration/logout.php">Logout</a></li>
    </ul>
</div>

</div>

</div>  <!--- header closed -->

<div class="main">

<div class="sidebar-left">


<!--<div class="sidebar-menu">

<ul>
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
</div>--->

<?php

include('../db_connect.php');

mysql_select_db('smallworld');

$sql = "SELECT user_id,email,name,resume_headline,address,language,work_type,country,phone,dob,gender,education,specialization,university,course_type,year_of_passing,company,designation,job_profile,duration,skill,project_title,project_details,role_description,skill_used,photo from candidate_registration where email = '$login_session'";



$retval = mysql_query($sql,$conn);

if(!$retval)
{
die('could not get data:' .mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{

$id               = $row['user_id'];
$email            = $row['email'];
$name             = $row['name'];
$resume_headline  = $row['resume_headline'];
$address          = $row['address'];
$language         = $row['language'];
$work_type        = $row['work_type'];
$country          = $row['country'];
$mobile           = $row['phone'];
$dob              = $row['dob'];
$gender           = $row['gender'];
$education        = $row['education'];
$specialization   = $row['specialization'];
$university       = $row['university'];
$course_type      = $row['course_type'];
$year_of_passing  = $row['year_of_passing'];
$company          = $row['company'];
$designation      = $row['designation'];
$job_profile      = $row['job_profile'];
$duration         = $row['duration'];
$skill            = $row['skill'];
$project_title    = $row['project_title'];
$project_details  = $row['project_details'];
$role_description = $row['role_description'];
$skill_used       = $row['skill_used'];
$image            = $row['photo'];



?>

<?php
 } 
 ?>




<!-- <div class="cv-head">
 
 <div class="cv-head-left">--->
 
 
 <div class="sidebar-image">

<div class="imageframe">


 
  
 
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


<!--<img src="image/men-2.png">-->
<div class="imageupload">

<a href="../image-uplaod/image-upload.php?id=<?php echo $id ; ?>"><img src="../Mypage/image/camera-icon.png"></a>

</div>

 </div>
 </div>
 <div class="content">
 
 <p id="name"><?php echo $name;?></p>
 <p id="email"><label>Email:</label><?php echo $email ; ?><p>
<p id="mobile"><label>Mobile:</label><?php echo $mobile ; ?></p>

</div>
</div> 

<div class="profile-section">

<div class="profile-head-top">


<h1 id="heading">Personal Details <a href="profile-edit.php?id=<?php echo $id ; ?>">Edit</a></h1>
<p><label>Resume Headline: </label></p>
<h6 class="bigtext"><?php echo $resume_headline;?></h6>
<p><label>Address:</label></p>
<h6 class="bigtext"><?php echo $address; ?></h6>
<p><label>Functional Area:</label><span class="output"><?php echo $work_type; ?></span></p>

<div class="decoration-left">
<p><label>Mobile:</label><span class="output"><?php echo $mobile ; ?></span></p>
<p><label>Date of Birth:</label><span class="output"><?php echo $dob ; ?></span></p>
<p><label>Language :</label><span class="output"><?php echo $language ; ?></span></p>
</div>

<div class="decoration-right">
<p><label>Email:</label><span class="output"><?php echo $email ; ?></span></p>
<p><label>Gender:</label><span class="output"><?php echo $gender; ?></span></p>
<p><label>Country:</label><span class="output"><?php echo $country; ?></span></p>
</div>
</div>

<div class="profile-head">

<h1 id="heading">Educational Details <a href="education-edit.php?id=<?php echo $id ; ?>" >Edit</a></h1>

<p><label>Highest Education Level:</label>
<span class="output"><?php echo $education; ?></span></p>
<p><label>University:</label><span class="output"><?php echo $university; ?></span></p>
<p><label>Specialization:</label><span class="output"><?php echo $specialization; ?></span></p>
<p><label>Course Type:</label><span class="output"><?php echo $course_type; ?></span></p>
<p><label>Passing Year:</label><span class="output"><?php echo $year_of_passing ; ?></span></p>


<h1 id="heading">Employment Details<a href="employment-edit.php?id=<?php echo $id ; ?>">Edit</a></h1>
<p><label>Current Company:</label><span class="output"><?php echo $company; ?></span></p>
<p><label>Designation:</label><span class="output"><?php echo $designation; ?></span></p>
<p><label>Job Profile:</label><span class="output"><?php echo $job_profile; ?></span></p>
<p><label>Total Exp:</label><span class="output"><?php echo $duration; ?></span></p>

<h1 id="heading">Technical Skill<a href="tech-edit.php?id=<?php echo $id ; ?>">Edit</a></h1>
<p><label>skill:</label><span class="output"><?php echo $skill; ?></span></p>


<h1 id="heading">Project<a href="project-edit.php?id=<?php echo $id ; ?>">Edit</a></h1>
<p><label>Project Title:</label><span class="output"><?php echo $project_title; ?></span></p>
<p><label>Project Description:</label></p>
<h6 class="bigtext"><?php echo $project_details; ?></h6>
<p><label>Role Description:</label></p>
<h6 class="bigtext"><?php echo $role_description; ?></h6>
<p><label>Skill Used:</label></p>
<h6 class="bigtext"><?php echo $skill_used; ?></h6>


 <!--
 <h1 id="heading">Extra Curricular activities<a href="#">Edit</a></h1>
 <ul>
 <?php echo $extra; ?>
 </ul>

-->


</div><!-- profile-head -->

</div><!-- profile-section --> 

	
</div>
<!-- main section close -->

</body>
</html>