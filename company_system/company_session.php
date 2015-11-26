<?php
include('../db_connect.php');
//starting session
session_start();
$email_check = $_SESSION['email'];
//SQL query to fetch complete information of user
$session_sql = mysql_query("select cmp_id,email from company_registration where email = '$email_check'" , $conn);
$row = mysql_fetch_assoc($session_sql);
$login_session  = $row['email'];
$cid = $row['cmp_id'];
if(!isset($login_session)){
mysql_close($conn);
header('Location: company_login.php');
}
?>