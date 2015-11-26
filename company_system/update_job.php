<?php
include('../db_connect.php');
include('company_session.php');
?>

<html>
<style>
.error{color:#FF0000;}
</style>
</html>
<?php
//Defining veriables and set to empty value
$titleErr = $vacancyErr = $job_descriptionErr = $salaryErr = $job_countryErr = $cityErr = $work_typeErr = $languageErr = "";
$job_title = $job_description = $search_keywords = $no_of_vacany = $experience = $salary = $other_salary = $job_location = $city = $work_type = $language = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$valid = true;
if(empty($_POST['job_title'])){
$titleErr = "Job title is important";
$valid = false;
}
else{
 $job_title = test_input($_POST['job_title']);
}
if(empty($_POST['job_description'])){
 $job_descriptionErr = "Please fill the job description";
 $valid = false;
}
else{
$job_description = test_input($_POST['job_description']);
}
if(empty($_POST['job_country'])){
$job_countryErr = "please fill the job country location";
$valid = false;
}
else{

$job_country = test_input($_POST['job_country']);
 }
 if(empty($_POST['job_city'])){
 $cityErr = "Please fill the city name ";
 $valid = false;
 }
 else{
  $city = test_input($_POST['job_city']);
 }
 if(empty($_POST['work_type'])){
 $work_typeErr = "Please fill the functional area/work_type";
 $valid = false;
 }
 else{
  $work_type = test_input($_POST['work_type']);
 }
 if(empty($_POST['language'])){
 
  $languageErr = "Please fill the language required for the job";
  $valid = false;
 }
 else{
  $language = test_input($_POST['language']);
 }
 }
 function test_input($data){
 $data = trim($data);
 $data = stripcslashes($data);
 $data = htmlspecialchars($data);
 return $data ;
 }
 

 
 ob_start();
if(isset($_GET['id']))
{
$id = $_GET['id'];
//if(isset($_POST['update'])){
if(@$valid == true){

//$cmpid    = $_POST['cmp_id'];

$job_title         = $_POST['job_title'];
$job_description   = $_POST['job_description'];
$search_keywords   = $_POST['search_keywords'];
$no_of_vacancy     = $_POST['no_of_vacancy'];
$work_exp          = $_POST['work_exp'];
$salary            = $_POST['salary'];
$salary_other      = $_POST['salary_other'];
$job_country       = $_POST['job_country'];
$job_city          = $_POST['job_city'];
$work_type         = $_POST['work_type'];
$language          = $_POST['language'];


$updated = mysql_query("UPDATE job_post SET job_title = '$job_title',job_description = '$job_description',search_keywords ='$search_keywords',no_of_vacancy='$no_of_vacancy',work_exp='$work_exp',salary='$salary',salary_other = '$salary_other',job_country ='$job_country',job_city='$job_city',work_type = '$work_type',language = '$language' WHERE job_id = '$id'") or die();

if($updated){
$msg = 'Successfully Updated';
header('Location:view_job.php');
}
}
}

//}
?>
 
<html>
<head>
<title>Update your Job</title>
</head>
<body>
<?php
if(isset($_GET['id']))
{
$id = $_GET['id'];
$sql = "SELECT cmp_id,job_id,job_title,job_description,search_keywords,no_of_vacancy,work_exp,salary,salary_other,job_country,job_city,work_type,language FROM job_post WHERE job_id = '$id'";

$retval = mysql_query($sql, $conn);

if(!$retval)
{
die('could not get data:' .mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
$cmp_id            = $row['cmp_id'];
$job_id            = $row['job_id'];
$job_title         = $row['job_title'];
$job_description   = $row['job_description'];
$search_keywords   = $row['search_keywords'];
$no_of_vacancy     = $row['no_of_vacancy'];
$work_exp          = $row['work_exp'];
$salary            = $row['salary'];
$salary_other      = $row['salary_other'];
$job_country       = $row['job_country'];
$job_city          = $row['job_city'];
$work_type         = $row['work_type'];
$language          = $row['language'];

?>

<h1>Job Posting Form</h1>
<form action=" " method="post">
<fieldset>
<h3>Job Details-specify the details of the vaccancy you are going to post</h3>
<p>
<label for="job_title">Job Title/Designation:</label></p>
<input type="text" name="job_title" id="job_title" value="<?php echo $job_title ; ?>" placeholder = "Software Developer/Senior Manager"/>
<span class="error">* <?php echo $titleErr;?></span>
<br><br>
<p>
<label for="job_description">Job Description: </label></p>
<textarea name="job_description" id="job_description" value="<?php echo $job_description ; ?>" rows="5" cols="30"></textarea>
<span class="error">* <?php echo $job_descriptionErr;?></span>
<br><br>
<p><label for="search_keywords">Search Keywords:</label></p>
<input type="text" name="search_keywords" id="search_keywords" value="<?php echo $search_keywords ; ?>" placeholder = "Like: Customer Executive ,Sales,Programmer"/>
<p>
<label for="no_of_vacancy">Number of Vacancies:</label></p>
<input type="text" name="no_of_vacancy" value="<?php echo $no_of_vacancy ; ?>" id="no_of_vacancy"/>

<p>
<label for="work_exp">Work Experience:</label></p>
<select name="work_exp" value="<?php echo $work_exp ; ?>">
<?php
for($i = 0; $i<50; $i++)
{
echo "<option value = ".$i.">" .$i. "</option>";
}
?>
<option name = "work_exp"> </option>
</select>
<p><label for="salary">Salary:</label></p>
<input type="text" name="salary" id="salary" value="<?php echo $salary ; ?>"/>
<p><label for="salary_other">Other Salary Details:</label></p>
<textarea name="salary_other" id="salary_other" value="<?php echo $salary_other ; ?>" rows="5" cols="30"> </textarea>
<p><label for="job_country">Job Location(Country):</label></p>
<input type="text" name="job_country" id="job_country" value="<?php echo $job_country ; ?>" placeholder= "Country: JAPAN, KOREA"/>
<span class="error">* <?php echo $job_countryErr;?></span>
<br><br>
<p><label for="job_city">Job city:</label></p>
<input type="text" name="job_city" id="job_city" value="<?php echo $job_city ; ?>"/>
<span class="error">* <?php echo $cityErr;?></span>
<br><br>
<p><label for="work_type">Functional Area:</label></p>
<input type="text" name="work_type" id="work_type" value="<?php echo $work_type ; ?>" placeholder= "SOftware Developer/CGI programer"/>
<span class="error">* <?php echo $work_typeErr;?></span>
<br><br>
<p><label for="language">Language Required:</label></p>
<input type="text" name="language" id="language" value="<?php echo $language ; ?>"/>
<span class="error">* <?php echo $languageErr;?></span>
<br><br>
<p><input type="submit" name="update" value="update"></p>


</fieldset>
</form>
<?php }}
?>
</body>
</html>