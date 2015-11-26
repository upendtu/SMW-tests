<?php
session_start();
if(session_destroy()) //Destroying all session
{
header("Location:company_login.php");
}
?>