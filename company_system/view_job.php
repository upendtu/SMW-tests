<?php
include('company_session.php');
include('../db_connect.php');
?>
<html>
<b id="welcome">Welcome:<i><?php echo $login_session ; ?></i></b>
<b id="logout"><a href="company_logout.php">Log Out </a></b></br>
<br><br>
<a href="company_view.php">View your company profile</a>
</html>
<br><br>
<a href="jobpost.php">POST ANOTHER JOB </a>
<br><br>
<?php
$sql = "SELECT cmp_id,job_id,job_title,job_description,search_keywords,no_of_vacancy,work_exp,salary,salary_other,job_country,job_city,work_type,language FROM job_post WHERE cmp_id = '$cid'";

$retval = mysql_query($sql,$conn);
if(!$retval)
{
die('could not get data:' .mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
$cmp_id          = $row['cmp_id'];
$job_id          = $row['job_id'];
$job_title       = $row['job_title'];
$job_description = $row['job_description'];
$search_keywords = $row['search_keywords'];
$no_of_vacancy   = $row['no_of_vacancy'];
$work_exp        = $row['work_exp'];
$salary          = $row['salary'];
$salary_other    = $row['salary_other'];
$job_country     = $row['job_country'];
$job_city        = $row['job_city'];
$work_type       = $row['work_type'];
$language        = $row['language'];

?>

<p> Company ID : <span><?php echo $cmp_id ; ?></span></p>
<p> Job ID : <span><?php echo $job_id ; ?></span></p>
<p>Job Title : <span> <?php echo $job_title ; ?> </span> </p>
<p>Job Description: <span><?php echo $job_description ; ?> </span> </p>
<a href = "update_job.php?id=<?php echo $job_id ; ?>"><span class = "edit" title = "edit">EDIT</span></a>

<?php } ?>
