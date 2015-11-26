
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

   $skill  = $_POST['skill'];
  
  
  
   $updated = mysql_query("UPDATE candidate_registration SET skill = '$skill' WHERE user_id = '$id'") or die();

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
$sql = "SELECT skill from candidate_registration where user_id = '$id'";
		$retval = mysql_query($sql,$conn);

if(!$retval)
{
die('could not get data:' .mysql_error());
}
while($profile = mysql_fetch_array($retval,MYSQL_ASSOC))
{

			
			 $skill      = $profile['skill'];
             
             
	?>
	
	
	
<div class="profile-section">
	
	<h1 id="heading-edit"> Update Your Technical Skills</h1>
<form action = "" method ="post" name="insertform">


<br><br>
<p><label for="skill">Tech Skill:</label></p>
<input type="text" name="skill" id="skill" value="<?php echo $skill;?>">

<p><input type = "submit" name = "update" value = "Save Update"  id="updatebutton"/></p>
<input type="button" value="cancel" onClick="document.location.href='index.php';" id="cancelbutton" />
</form>

		

		<?php }}  ?>

</body>
</html>
