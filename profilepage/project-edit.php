
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

   $project_title  = $_POST['project_title'];
   $project_details = $_POST['project_details'];
   $role_description = $_POST['role_description'];
   $skill_used   = $_POST['skill_used'];
  
  
   $updated = mysql_query("UPDATE candidate_registration SET project_title = '$project_title', project_details= '$project_details',role_description = '$role_description',skill_used = '$skill_used' WHERE user_id = '$id'") or die();

   if($updated)
   {

    $msg = "Successfully Updated";
    header('Location:index.php');

   }

 }


}

?>


<?php

     if(isset($_GET['id']))
     {
     	$id = $_GET['id'];
     
       // $id = '2';

		//$getselect = mysql_query("SELECT * FROM candidate_registration WHERE user_id = '2'");
$sql = "SELECT project_title,project_details,role_description,skill_used from candidate_registration where user_id = '$id'";
		$retval = mysql_query($sql,$conn);

if(!$retval)
{
die('could not get data:' .mysql_error());
}
while($profile = mysql_fetch_array($retval,MYSQL_ASSOC))
{

			
			 $project_title        = $profile['project_title'];
             $project_details      = $profile['project_details'];
             $role_description     = $profile['role_description'];
             $skill_used           = $profile['skill_used'];
             
	?>
<div class="profile-section">
<h1 id="heading-edit"> Update Your project Details</h1>
<form action = "" method ="post" name="insertform">
<p><label for="project_title">project_title:</label></p>
<input type="text" name="project_title" id="project_title" value="<?php echo $project_title;?>">
<p><label for="project_description">Project Details:</label></p>
<textarea name="project_details" id="project_details" rows="10" cols="72" value=""> <?php echo $project_details;?></textarea>
<!--<input type="text" name="project_details" id="project_details" value="<?php echo $project_details; ?>">-->
<p><label for="role_description">Role Description</label></p>
<textarea name="role_description" id="role_description" rows="10" cols="72" value=""><?php echo $role_description;?></textarea>
<p><label for="skill_used">Skill used </label></p>
<textarea name="skill_used" id="skill_used" rows="10" cols="72" value=""><?php echo $skill_used;?></textarea>

<p><input type = "submit" name = "update" value = "Save Update" id="updatebutton"/></p>
<input type="button" value="cancel" onClick="document.location.href='index.php';" id="cancelbutton" />
</form>

		</div>

		<?php }}  ?>

</body>
</html>
