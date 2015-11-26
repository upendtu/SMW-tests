<?php

//Establishing Connection with server 

include('..//db_connect.php');
$db = mysql_select_db("smallworld",$conn);

session_start(); //starting session

//storing session
$email_check = $_SESSION['email'];


//SQL query to fetch complete iformation of user

//$session_sql = mysql_query("select user_id ,email , name,location,phone,dob,gender,education,specialization,university,course_type,year_of_passing,skill,project_title,project_details,project_description from candidate_registration where email = '$email_check'", $conn);
$session_sql = mysql_query("select user_id ,email,name from candidate_registration  where email = '$email_check'", $conn);
$row = mysql_fetch_assoc($session_sql);
$login_session       = $row['email'];
//$password_session    = $row['password'];
$id                  = $row['user_id'];
$name                = $row['name'];
/*$location            = $row['location'];
$phone               = $row['phone'];
$dob                 = $row['dob'];
$gender              = $row['gender'];
$education           = $row['education'];
$specialization      = $row['specialization'];
$university          = $row['university'];
$course_type         = $row['course_type'];
$year_of_passing     = $row['year_of_passing'];
$skill               = $row['skill'];
$project_title       = $row['project_title'];
$project_details     = $row['project_details'];
$project_description = $row['project_description'];

*/
if(!isset($login_session)){
mysql_close($conn); //closing connection

header('Location:../registration/login.php');
}

?>

