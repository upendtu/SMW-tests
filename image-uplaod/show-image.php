<?php
include('../db_connect.php');

$select_query = "select photo FROM candidate_registration WHERE user_id = '47'";

$sql = mysql_query($select_query) or die(mysql_error());
while($row = mysql_fetch_array($sql,MYSQL_BOTH)){

?>

<table style="border-collapse:collapse; font:12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
<tbody><tr><td>
<img src="<?php echo $row['photo']; ?>" alt = ""/>
</td>
</tr>
<tbody>
</table>

<?php
}
?>