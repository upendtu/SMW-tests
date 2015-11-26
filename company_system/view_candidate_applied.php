<?php
include('../db_connect.php');
include('company_session.php');

echo $cid . '<br>';

$sql = "SELECT applied_job.cmp_id,applied_job.job_id,applied_job.user_id,job_post.job_title FROM applied_job,job_post WHERE  applied_job.cmp_id = '$cid' AND job_post.job_id = applied_job.job_id";


$retval = mysql_query($sql,$conn);



if(!$retval)
{
die('could not get data:' .mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{

   
 //$cmp_id = $row['cmp_id'];
  $job_id = $row['job_id']; 
echo "Job-ID--" . $row['job_id'] . "<br>";
echo "job_title--" . $row['job_title'] . "<br>";
echo "user_id--" . $row['user_id'] . "<br>";
echo "<br>";
}
?>