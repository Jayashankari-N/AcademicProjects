<?php

include("connection.php");
  $s_no = mysqli_real_escape_string($connection, $_POST["s_no"]);
  $sem = mysqli_real_escape_string($connection, $_POST["sem"]);
  $subj_code = mysqli_real_escape_string($connection, $_POST["subj_code"]);
  $subj_name = mysqli_real_escape_string($connection, $_POST["subj_name"]);
  $credit = mysqli_real_escape_string($connection, $_POST["credit"]);
  $intrn_mrk = mysqli_real_escape_string($connection, $_POST["intrn_mrk"]);
  $extrn_mrk = mysqli_real_escape_string($connection, $_POST["extrn_mrk"]);
  $tot_mrk = mysqli_real_escape_string($connection, $_POST["tot_mrk"]);
  $grade_pts = mysqli_real_escape_string($connection, $_POST["grade_pts"]);
  $grade = mysqli_real_escape_string($connection, $_POST["grade"]);
$query = "
   INSERT INTO stud_mrk_entry(s_no, sem, subj_code, subj_name, credit, intrn_mrk, extrn_mrk, tot_mrk, grade_pts, grade) 
   VALUES ('".$s_no."', '".$sem."', '".$subj_code."', '".$subj_name."', '".$credit."', '".$intrn_mrk."', '".$extrn_mrk."',
   '".$tot_mrk."', '".$grade_pts."', '".$grade."')
  ";
  /*$query = "
   INSERT INTO stud_mrk_entry(s_no, sem) 
   VALUES ('4', 'kjghj')
  ";*/
  if(mysqli_query($connection, $query))
  {
   echo 'Student Data Inserted';
  }
//insert.php
/*include("connection.php");
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {
  $s_no = mysqli_real_escape_string($connection, $_POST["s_no"]);
  $sem = mysqli_real_escape_string($connection, $_POST["sem"]);
  $subj_code = mysqli_real_escape_string($connection, $_POST["subj_code"]);
  $subj_name = mysqli_real_escape_string($connection, $_POST["subj_name"]);
  $credit = mysqli_real_escape_string($connection, $_POST["credit"]);
  $intrn_mrk = mysqli_real_escape_string($connection, $_POST["intrn_mrk"]);
  $extrn_mrk = mysqli_real_escape_string($connection, $_POST["extrn_mrk"]);
  $tot_mrk = mysqli_real_escape_string($connection, $_POST["tot_mrk"]);
  $grade_pts = mysqli_real_escape_string($connection, $_POST["grade_pts"]);
  $grade = mysqli_real_escape_string($connection, $_POST["grade"]);
  $query = "
   INSERT INTO stud_mrk_entry(s_no, sem, subj_code, subj_name, credit, intrn_mrk, extrn_mrk, tot_mrk, grade_pts, grade) 
   VALUES ('".$s_no."', '".$sem."', '".$subj_code."', '".$subj_name."', '".$credit."', '".$intrn_mrk."', '".$extrn_mrk."',
   '".$tot_mrk."', '".$grade_pts."', '".$grade."')
  ";
  if(mysqli_query($connection, $query))
  {
   echo 'Student Data Inserted';
  }
 }
 if($_POST["operation"] == "Edit")
 {
  $s_no= mysqli_real_escape_string($connection, $_POST["s_no"]);
  $sem = mysqli_real_escape_string($connection, $_POST["sem"]);
  $subj_code = mysqli_real_escape_string($connection, $_POST["subj_code"]);
  $subj_name = mysqli_real_escape_string($connection, $_POST["subj_name"]);
  $credit= mysqli_real_escape_string($connection, $_POST["credit"]);
  $intrn_mrk = mysqli_real_escape_string($connection, $_POST["intrn_mrk"]);
  $extrn_mrk = mysqli_real_escape_string($connection, $_POST["extrn_mrk"]);
  $tot_mrk= mysqli_real_escape_string($connection, $_POST["tot_mrk"]);
  $grade_pts = mysqli_real_escape_string($connection, $_POST["grade_pts"]);
  $grade= mysqli_real_escape_string($connection, $_POST["grade"]);
  $query = "
   UPDATE stud_mrk_entry 
   SET s_no = '".$s_no."', 
   sem = '".$sem."', 
   subj_code = '".$subj_code."'
   subj_name = '".$subj_name."'
   credit = '".$credit."'
   intrn_mrk = '".$intrn_mrk."'
   extrn_mrk = '".$extrn_mrk."'
   tot_mrk = '".$tot_mrk."'
   grade_pts = '".$grade_pts."'
   grade = '".$grade."'
   WHERE s_no = '".$_POST["s_no"]."'
  ";
  if(mysqli_query($connection, $query))
  {
   echo 'Student Data Updated';
  }
 }
}*/
?>