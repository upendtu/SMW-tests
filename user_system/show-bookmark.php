<?php
include('../db_connect.php');
//session_start();
include('session.php');
//include('joblist.php');
 

//$sql = "select newcompany.companyname,newcompany.companyaddress,newcompany.jobtitle,newcompany.country,newcompany.language,newcompany.skill, bookmark_job.cmp_id FROM newcompany , bookmark_job where newcompany.cmp_id = bookmark_job.cmp_id AND bookmark_job.user_id = '$id'";

//$sql = "SELECT company_registration.cmp_id,company_registration.companyname,company_registration.companyprofile,company_registration.industrytype,company_registration.contactperson,company_registration.companyurl,company_registration.address,company_registration.country,company_registration.city,company_registration.pincode,company_registration.phone,company_registration.fax,company_registration.contact_email,job_post.job_id,job_post.job_title,job_post.job_description,job_post.search_keywords,job_post.no_of_vacancy,job_post.work_exp,job_post.salary,job_post.salary_other,job_post.job_country,job_post.job_city,job_post.work_type,job_post.language FROM job_post,company_registration,bookmark_job WHERE   bookmark_job.user_id = '$id'" ;

$sql = "SELECT job_post.job_id ,job_post.job_title,bookmark_job.user_id ,company_registration.cmp_id,company_registration.address,company_registration.country,job_post.language,job_post.job_description FROM job_post,company_registration,bookmark_job WHERE job_post.job_id = bookmark_job.job_id AND company_registration.cmp_id = bookmark_job.cmp_id AND bookmark_job.user_id = '$id'";

$retval = mysql_query($sql,$conn);



if(!$retval)
{
die('could not get data:' .mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
echo $id;
   
 $cmp_id = $row['cmp_id'];
  $job_id = $row['job_id']; 
echo "Job-ID--" . $row['job_id'] . "<br>";
echo "Company-ID--" . $row['cmp_id'] . "<br>";
//echo "Comapny name-"  . $row['companyname'] . "<br>";
echo "company address-" . $row['address'] . "<br>";
echo "job Title- " . $row['job_title'] . "<br>";
echo "country" . $row['country'] . "<br>";
echo "Language-" .$row['language'] . "<br>";
echo "skill- " . $row['job_description'] . "<br>";
//echo "<a href = 'add-bookmark.php?cid=$cmp_id&&jid=$job_id'><img src='../image/bookmark.png' height = 30px;></a>";
//echo "<a href = 'remove-bookmark.php?jid=$job_id'><img src='../image/bookmark.png' height = 30px;></a>";
//echo "<button><a href = 'job-applied.php?cid=$cmp_id&&jid=$job_id'>Apply</a></button>";


echo "<br>";

}

?>

