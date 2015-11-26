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

   $name             = $_POST['name'];
   $resume_headline  = $_POST['resume_headline'];
   $address          = $_POST['address'];
   $language         = $_POST['language'];
   $work_type        = $_POST['work_type'];
   $country          = $_POST['country'];
   $mobile           = $_POST['mobile'];
   $gender           = $_POST['gender'];

   $updated = mysql_query("UPDATE candidate_registration SET name = '$name',resume_headline='$resume_headline',address='$address', language= '$language',work_type = '$work_type',country = '$country', phone = '$mobile',gender= '$gender' WHERE user_id = '$id'") or die();

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
$sql = "SELECT name,resume_headline,address,language,work_type,country,phone,dob,gender from candidate_registration where user_id = '$id'";
		$retval = mysql_query($sql,$conn);

if(!$retval)
{
die('could not get data:' .mysql_error());
}
while($profile = mysql_fetch_array($retval,MYSQL_ASSOC))
{

			
			$name             = $profile['name'];
			$resume_headline  = $profile['resume_headline'];
			$address          = $profile['address'];
			$language         = $profile['language'];
			$work_type        = $profile['work_type'];
			$country          = $profile['country'];
			$mobile           = $profile['phone'];
			$gender           = $profile['gender'];

	?>
	
	<div class="profile-section">
	
	<h1 id="heading-edit"> Update Your personal Details</h1>
	
<form action = "" method ="post" name="insertform">

<p><label for="name">Full Name:</label></p>
<input type="text" name="name" id="name" value = "<?php echo $name ; ?>" />
<p><label for="name">Resume Headline:</label></p>
<textarea name="resume_headline" id="resume_headline" rows="10" cols="72" value = ""><?php echo $resume_headline ; ?></textarea>
<p><label for="address">Current Full Address:</label></p>
<textarea name="address" id="address" rows="10" cols="72" value = ""> <?php echo $address ; ?> </textarea>
<p>
<label for="language">Language:</label></p>
<input type="text" name="language" id="language"  value = "<?php echo $language; ?>"/>
<p>
<p>
<label for="work">Functional Area:</label></p>
<input type="text" name="work_type" id="work_type" placeholder="Functional Area"  value = "<?php echo $work_type; ?>"/>
<p>
<p>
<label for="country">Country:</label></p>
<input type="text" name="country" id="country"  value = "<?php echo $country; ?>"/>
<p>
<label for="phone">Mobile number:</label></p>
<input type="text" name="mobile" id="mobile"  value = "<?php echo $mobile ; ?>"/>
<br><br><br>
<p><label for="gender">Gender:</label>
<input type="radio" name="gender" value="Female" checked="checked">Female
<input type="radio" name="gender" value="Male" checked="checked">Male
</p>
<p><input type = "submit" name = "update" value = "Save Update" id="updatebutton" /></p>
<input type="button" value="cancel" onClick="document.location.href='index.php';" id="cancelbutton" />
</form>

</div>

		

		<?php }}  ?>

</body>
</html>
