<?php
include("connection.php");
/*$query = "SELECT * FROM stud_mrk_app";
$result = mysqli_query($connection, $query);
$output = '';
while($row = mysqli_fetch_array($result))
{
 $output .= '<option value="'.$row["app_no"].'">'.$row["name"].'</option>';
}*/
$output = '';
?>
<html>
 <head>
  <title>Unom CS Semester Mark Entry</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>  
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
  </style>
 </head>
 <body>
  <div class="container box">
   <h1 align="center">Department of Computer Science</h1>
   <h1 align="center">Semester Mark Entry</h1>
   <br />
   <div align="right">
    <button type="button" id="add_button" data-toggle="modal" data-target="#studModal" class="btn btn-info btn-lg">Add</button>
   </div>
  
	          <div class="#">
                <label for="app_no">Application No:</label>
                <input type="text" class="form-control" name="app_no" placeholder="Application Number" required>
              </div>
			  <br/>
    <div class="table-responsive">
    <table id="stud_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th data-column-id="s_no" data-type="numeric">S.No.</th>
       <th data-column-id="sem">Semester</th>
       <th data-column-id="subj_code">Subj Code</th>
       <th data-column-id="subj_name">Paper Name</th>
	   <th data-column-id="credit">Credits</th>
	   <th data-column-id="intrn_mrk">Internal Mark(IA)</th>
	   <th data-column-id="extrn_mrk">External Mark(UE)</th>
	   <th data-column-id="tot_mrk">Total</th>
	   <th data-column-id="grade_pts">Grade Points</th>
	   <th data-column-id="grade">Grade</th>
       <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
      </tr>
     </thead>
    </table>
   </div>
 </body>
</html>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#stud_form')[0].reset();
  $('.modal-title').text("Add Mark Details");
  $('#action').val("Add");
  $('#operation').val("Add");
 });
 
 var studTable = $('#stud_data').bootgrid({
  ajax: true,
  rowSelect: true,
  requestHandler: function(request)
  {
	  request.id = "b0df282a-0d67-40e5-8558-c9e93b7befed";
	  return request;
  },
  url: "fetch.php",
  formatters: {
   "commands": function(column, row)
   {
    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.s_no+"'>Edit</button>" + 
    "&nbsp; <button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.s_no+"'>Delete</button>";
   }
  }
 });
 
 $(document).on('submit1', '#stud_form', function(event){
  event.preventDefault();
  var s_no = $('#s_no').val();
  var sem = $('#sem').val();
  var subj_code = $('#subj_code').val();
  var subj_name= $('#subj_name').val();
  var credit = $('#credit').val();
  var intrn_mrk= $('#intrn_mrk').val();
  var extrn_mrk = $('#extrn_mrk').val();
  var tot_mrk= $('#tot_mrk').val();
  var grade_pts= $('#grade_pts').val();
  var grade = $('#grade').val();
  var form_data = $(this).serialize();
  if(s_no != '' &&  sem!='' && subj_code!= '' &&  subj_name!= '' && credit != '' && intrn_mrk != '' && extrn_mrk != '' && 
     tot_mrk != '' && grade_pts != '' && grade != '' )
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     alert(data);
     $('#stud_form')[0].reset();
     $('#studModal').modal('hide');
     $('#stud_data').bootgrid('reload');
    }
   });
  }
  else
  {
   alert("All Fields are Required");
  }
 });
 
 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  studTable.find(".update").on("click", function(event)
  {
   var product_id = $(this).data("row-id");
    $.ajax({
    url:"fetch_single.php",
    method:"POST",
    data:{s_no:s_no},
    dataType:"json",
    success:function(data)
    {
     $('#studModal').modal('show');
     $('#s_no').val(data.s_no);
     $('#sem').val(data.sem);
     $('#subj_code').val(data.subj_code);
	 $('#subj_name').val(data.subj_name);
     $('#credit').val(data.credit);
	 $('#intrn_mrk').val(data.intrn_mrk);
     $('#extrn_mrk').val(data.extrn_mrk);
	 $('#tot_mrk').val(data.tot_mrk);
     $('#grade_pts').val(data.grade_pts);
	 $('#grade').val(data.grade);
     $('.modal-title').text("Edit Product");
     $('#s_no').val(s_no);
     $('#action').val("Edit");
     $('#operation').val("Edit");
    }
   });
  });
 });
 
 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  studTable.find(".delete").on("click", function(event)
  {
   if(confirm("Are you sure you want to delete this?"))
   {
    var product_id = $(this).data("row-id");
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{s_no:s_no},
     success:function(data)
     {
      alert(data);
      $('#stud_data').bootgrid('reload');
     }
    })
   }
   else{
    return false;
   }
  });
 }); 
});

</script>
<div id="studModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="stud_form" action="insert.php">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add Mark Details</h4>
    </div>
    <div class="modal-body">
     <!--<label>Application No</label>
     <select name="app_no" id="app_no" class="form-control">
      <option value="">Select Application No</option>
    
     </select>
     <br />
	 <label>Applicant Name</label>
     <select name="name" id="name" class="form-control">
      <option value=""></option>
     </select>-->
     <br />
	 <label>S.no.</label>
     <input type="text" name="s_no" id="s_no" class="form-control" />
     <br />
	 <label>Semester</label>
     <select name="sem" id="sem" class="form-control">
      <option value="">Select Semester</option>
	  <option value="">I Semester</option>
	  <option value="">II Semester</option>
	  <option value="">III Semester</option>
	  <option value="">IV Semester</option>
	  <option value="">V Semester</option>
	  <option value="">VI Semester</option>
	  <option value="">VII Semester</option>
	  <option value="">VIII Semester</option>
	  <option value="">IX Semester</option>
	  <option value="">X Semester</option>
     </select>
     <br />
     <label>Enter Subject Code</label>
     <input type="text" name="subj_code" id="subj_code" class="form-control" />
     <br />
	 <label>Enter Subject(Paper) Name</label>
     <input type="text" name="subj_name" id="subj_name" class="form-control" />
     <br />
	 <label>Enter Credit</label>
     <input type="text" name="credit" id="credit" class="form-control" />
     <br />
     <label>Enter Internal Mark(IA)</label>
     <input type="text" name="intrn_mrk" id="intrn_mrk" class="form-control" />
	 <br />
	 <label>Enter External Mark(UE)</label>
     <input type="text" name="extrn_mrk" id="extrn_mrk" class="form-control" />
     <br />
	 <label>Enter Total Mark</label>
     <input type="text" name="tot_mrk" id="tot_mrk" class="form-control" />
     <br />
	 <label>Enter Grade Points</label>
     <input type="text" name="grade_pts" id="grade_pts" class="form-control" />
     <br />
	 <label>Enter Grade</label>
     <input type="text" name="grade" id="grade" class="form-control" />
     <br />
    </div>
    <div class="modal-footer">
     <input type="submit" name="s_no" id="s_no" />
     <input type="submit" name="operation" id="operation" />
     <input type="submit" name="action1" id="action1"  class="btn btn-success" value="Add" />
   <input type="submit" value="Add" />
    </div>
   </div>
  </form>
 </div>
</div>
