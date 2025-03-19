<?php
//delete.php
include("connection.php");
if(isset($_POST["s_no"]))
{
 $query = "DELETE FROM stud_mrk_entry WHERE s_no = '".$_POST["s_no"]."'";
 if(mysqli_query($connection, $query))
 {
  echo 'Data Deleted';
 }
}
?>