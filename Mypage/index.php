<html>
<title>My Page</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<?php
include('session.php');
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
        <li><a href="../profilepage/index.php">Edit profile</a></li>
        <li><a href="#about">Bookmarks</a></li>
        <li><a href="#contact">Applied Job</a></li>
		<li><a href="#contact">Account setting</a></li>
		<li><a href="../registration/logout.php">Logout</a></li>
    </ul>
</div>

</div>

</div>  <!--- header closed -->

<div class="image-slider">
<div id="slider">

<img src="image/YMAIN_02.png">
<!---
<figure>
<a href="http://at-crafts.com/main/index.php">
<div class="box">
<div class="image">
<img src="../image/campany.png" alt="">
</div>

<div class="description">
<h2 id="title">CRAFTS INC</h2>
<p id="desc">Our gaming machines and games in the company, the movie, it is a video production using CG such as Web content (computer graphics), the app development for smartphones </p>
</div>

</div>
</a>
</figure>

<figure>
<a href="http://at-crafts.com/main/index.php">
<div class="box">
<div class="image">
<img src="../image/campany2.png" alt="">
</div>
<div class="description">
<h2 id="title"></h2></a>
<p id="desc"></p>
</div>
</div>
</a>
</figure>


<figure>
<a href="http://at-crafts.com/main/index.php">
<div class="box">
<div class="image">
<img src="../image/campany3.png" alt="">
</div>
<div class="description">
<h2 id="title"></h2></a>
<p id="desc"></p>
</div>
</div>
</a>
</figure>


<figure>
<a href="http://at-crafts.com/main/index.php">
<div class="box">
<div class="image">
<img src="../image/campany.png" alt="">
</div>
<div class="description">
<h2 id="title"></h2></a>
<p id="desc"></p>
</div>
</div>
</a>
</figure>


<figure>
<a href="http://at-crafts.com/main/index.php">
<div class="box">
<div class="image">
<img src="../image/campany2.png" alt="">
</div>
<div class="description">
<h2 id="title"></h2></a>
<p id="desc"></p>
</div>
</div>
</a>
</figure>


<figure>
<a href="http://at-crafts.com/main/index.php">
<div class="box">
<div class="image">
<img src="../image/campany3.png" alt="">
</div>
<div class="description">
<h2 id="title"></h2></a>
<p id="desc"> </p>
</div>
</div>
</a>
</figure>

<!--<figure>
<img src="../image/DSC_5953.jpg" alt="">
<figcaption>This is important</figcaption>
</figure>
<figure>
<img src="../image/DSC_6030.jpg" alt="">
<figcaption>This is important</figcaption>
</figure>
<figure>
<img src="../image/DSC_5885.jpg" alt="">
<figcaption>This is important</figcaption>
</figure>
<figure>
<img src="../image/DSC_5973.jpg" alt="">
<figcaption>This is important</figcaption>
</figure>
<figure>
<img src="../image/DSC_5774.jpg" alt="">
<figcaption>This is important</figcaption>
</figure>
<figure>
<img src="../image/DSC_5822.jpg" alt="">
<figcaption>This is important</figcaption>
</figure> -->
</div>

</div>
<!-- close Image slider ---->


<div class="main">


<div class="sidebar">
<div class="sidebar_container">       
		
        <form class="form" action="#" method="post"> 
        <!--<label for="language">Language:</label><br>-->
		
		<div class="select_join">
		<select name="language">
		<option value="0">Please Select Language</option>
        <option value=english>  english</option>
        <option value=japanese>  japanese</option>
		</select>
		</div> 
		<!--<input type="text" name="language" id="language"> -->
   
      <!--<label for="work">Work:</label><br>-->
		
		  <div class="select_join">
		<select name="work">
		<option value="0">Please Select Functional Area</option>
<option value="Accounting">Accounting</option>
<option value="Banking"> Banking</option>
<option value="Engineering & Manufacturing">Engineering & Manufacturing</option>
<option value="Health">Healthcare and Life Sciences</option>
<option value="HR">Human Resources</option>
<option value="IT">IT</option>
<option value="Legal" >Legal</option>
<option value="Marketing" >Marketing</option>
<option value="Procurement & Supply Chain" >Procurement & Supply Chain</option>
<option value="Sales" >Sales</option>
<option value="Secretarial" > Secretarial</option>
<option value="Teacher" > Teacher</option>
<option value="Graphic Design" > Graphic Design</option>
<option value="Journalism" > Journalism</option>
<option value="Jewellery">Jewellery jobs</option>
<option value="Yoga">Yoga job</option>
<option value="Architecture">Architecture job</option>
<option value="Baking">Baking jobs</option>
<option value="Astrology">Astrology Jobs</option>
<option value="Wine making">Wine making jobs</option>
<option value="film editing" >Film Editing Jobs</option>
<option value="Dance" >Dance jobs</option>
<option value="Visa Expat Management" >Visa Expat Management</option>
<option value="Vichle operating" >Vichle operating</option>
<option value="Cloth Design" >Cloth Design</option>
<option value="Education" > Education Jobs</option>
<option value="telemarketing" >Telemarketing Jobs</option>
<option value="Vendor management" >Vendor management Jobs</option>

</select>
</div> 
        <!--<input type="text" name="work" id="work">-->
   
 <!-- <label for="country">Country:</label><br>-->
		  <div class="select_join">
		<select name="country">
		<option value="0">Please Select Country</option>
<option value="japan" >Japan</option>
<option value="india" >India</option>
<option value="korea" >korea</option>
<option value="usa"   > USA</option>
<option value="australia">Australia</option>
<option value="france">France</option>
</select> 
      <!--<input type="text" name="work" id="work">-->
	  
	  
</div>
	 
	<input type="submit" name="submit" class="submit" value="search"/>
   
</form>

          	  <a href="http://at-crafts.com/main/index.php">
			  
			  <div class="ad">
			</div>
			
			</a>	
		
      </div>   <!--close sidebar_container-->
	  
	 	
</div>
<!-- close side bar -->
  
  	  
	
<div class="main-section">

<div class="result-list">
<div class="company-logo">
</div>
<div class="company-title">
<h2> CRAFTS INC </h2>
<p>Required Software Developer/Ios app Developer</p>
</div>
<div class="image-section">
<div class="company-image">
<img src="image/YMAIN_04.png">
</div>
<div class="bookmark">
<span id="posted">Posted</span>
<span id="view">View</span>
<span id="bkmark">Bookmark</span>
</div>
</div>

<div class="description">
<p>Our gaming machines and games in the company, the movie, it is a video production using CG such as Web content (computer graphics), the app development for smartphones. </p>
</div>

</div>

<!--
<div class="result-list">
<div class="company-logo">
</div>
<div class="company-details">
<h2> CRAFTS INC </h2>
<p>Our gaming machines and games in the company, the movie, it is a video production using CG such as Web content (computer graphics), the app development for smartphones. </p>
</div>
<div class="company-image">
<img src="image/6463.jpg" height="350px" width="550px;">
</div>
</div>

<div class="result-list">
<div class="company-logo">
</div>
<div class="company-details">
<h2> CRAFTS INC </h2>
<p>Our gaming machines and games in the company, the movie, it is a video production using CG such as Web content (computer graphics), the app development for smartphones. </p>
</div>
<div class="company-image">
<img src="image/6463.jpg" height="350px" width="550px;">
</div>
</div>

</div>--->

</div><!-- close Main section --->





</body>
</html>