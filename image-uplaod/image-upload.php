

<?php
include('../registration/session.php');
?>

<?php
include('../db_connect.php');

function GetImageExtension($imagetype)
{
 if(empty($imagetype)) return false;
 
 switch($imagetype)
 {
 case 'image/bmp' : return '.bmp';
 case 'image/gif' : return '.gif';
 case 'image/jpeg': return '.jpg';
 case 'image/png' : return '.png';
 default : return false;
 }
}

if(!empty($_FILES["uploadedimage"]["name"]))
{
$file_name = $_FILES["uploadedimage"]["name"];
$temp_name = $_FILES["uploadedimage"]["tmp_name"];
$imgtype = $_FILES["uploadedimage"]["type"];
$ext = GetImageExtension($imgtype);
$imagename = date("d-m-y") . "-" .time() . $ext;
$tar_path = "image/" .$imagename;
$target_path =mysql_real_escape_string($tar_path);
if(move_uploaded_file($temp_name, $target_path))
{
ob_start();
if(isset($_GET['id']))
{

 $id = $_GET['id'];
 
  
   $updated = mysql_query("UPDATE candidate_registration SET photo = '$target_path' WHERE user_id = '$id'") or die();

   if($updated)
   {

    $msg = "Successfully Updated";
    header('Location:../profilepage/index.php');

   }

 }
}

}

?>

<?php
/*
$query_upload = "INSERT into `candidate_registration`(`photo`) VALUES ('$target_path')";

mysql_query($query_upload) or die("error in $query_upload == ---->" .mysql_error());

}

else{
exit ("Error while uploading image on the server");
}

}
*/
?>


<html>
<body>

<form action="" enctype="multipart/form-data" method="post">
<table style="border-collapse:collapse; font:12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
<tbody>
<tr>
<td>
<input name="uploadedimage" type="file">
</td>
</tr>
<tr>
<td>
<input name="Uplaod Now" type="submit" value="Upload Image">
</td>
</tr>
</tbody></table>
</form>
</html>