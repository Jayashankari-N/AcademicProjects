<?php
//fetch_single.php
include("connection.php");
if(isset($_POST["s_no"]))
{
 //$output = array();
 $query = "SELECT * FROM stud_mrk_entry WHERE s_no = '".$_POST["s_no"]."'";
 $result = mysqli_query($connection, $query);
 while($row = mysqli_fetch_array($result))
 {
  $output["s_no"] = $row["s_no"];
  $output["sem"] = $row["sem"];
  $output["subj_code"] = $row["subj_code"];
  $output["subj_name"] = $row["subj_name"];
  $output["credit"] = $row["credit"];
  $output["intrn_mrk"] = $row["intrn_mrk"];
  $output["extrn_mrk"] = $row["extrn_mrk"];
  $output["tot_mrk"] = $row["tot_mrk"];
  $output["grade_pts"] = $row["grade_pts"];
  $output["grade"] = $row["grade"];
 }
 echo json_encode($output);
}

?>