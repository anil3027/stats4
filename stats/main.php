
 <!-- This section allows to enter data to create classes amd view classes-->
 <?php
$connect = mysqli_connect("localhost", "root", "", "stats");

function fill_year_select_box1($connect)
{ 
    $output = '';  
    $sql = "SELECT DISTINCT class_year FROM classes"; 
    $result = mysqli_query($connect, $sql);  
    while($row = mysqli_fetch_array($result))  
    {  
         $output .= '<option value="'.$row["class_year"].'">'.$row["class_year"].'</option>';  
    }  
    return $output;
}

function fill_term_select_box1($connect)
{ 
    $output = '';  
    $sql = "SELECT DISTINCT class_term FROM classes"; 
    $result = mysqli_query($connect, $sql);  
    while($row = mysqli_fetch_array($result))  
    {  
         $output .= '<option value="'.$row["class_term"].'">'.$row["class_term"].'</option>';  
    }  
    return $output;
}

function fill_year_select_att($connect)
{ 
    $output = '';  
    $sql = "SELECT DISTINCT year FROM attendance"; 
    $result = mysqli_query($connect, $sql);  
    while($row = mysqli_fetch_array($result))  
    {  
         $output .= '<option value="'.$row["year"].'">'.$row["year"].'</option>';  
    }  
    return $output;
}

function fill_term_select_att($connect)
{ 
    $output = '';  
    $sql = "SELECT DISTINCT term FROM attendance"; 
    $result = mysqli_query($connect, $sql);  
    while($row = mysqli_fetch_array($result))  
    {  
         $output .= '<option value="'.$row["term"].'">'.$row["term"].'</option>';  
    }  
    return $output;
}

function filter_classWeek_select_att($connect)
{ 
    $output = '';  
    $sql = "SELECT DISTINCT week FROM attendance  "; 
    $result = mysqli_query($connect, $sql);  
    while($row = mysqli_fetch_array($result))  
    {  
         $output .= '<option value="'.$row["week"].'">'.$row["week"].'</option>';  
    }  
    return $output;
}





?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>School Stats</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
  <script src="sweetalert2.all.min.js" > </script>
 <script src="jquery-3.5.1.min.js" > </script>
 <script src="sweetalert2.min.js"></script>
 <link rel="stylesheet" href="sweetalert2.min.css">
	
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

 </head>
  

  

<style>

  
  #mydiv {
    background: #061e25; /* white background with 30% opacity */
  
}
/* this position the modal*/
.modal-content{
  
  float: left;
  margin-left: -100px;
  top:50px;
  width:750px;
  opacity:0.9;
  padding: 5px;
}


#mydiv2{
  background: #061e25;
  float: left;
  margin-left: 50px;
  top:50px;
  width:400px;
  opacity:0.9;
  padding: 3px;
  height: auto;
}
#mydiv3{
  background: #061e25;
  float: left;
  margin-left: 20px;
  top:50px;
  width:400px;
  opacity:2.0;
  padding: 3px;
  height: auto;
}

#mydiv4{
  background: #061e25;
  float: right;
 
  top:50px;
  width:900px;
  opacity:0.9;
  padding: 3px;
  height: auto;
}

#mydiv5{
  background: #061e25;
  
  width:1500px;
  top: 20px;
  bottom: 0;
  right: 400px;
  height: auto;
}
#mydiv6{
  background: #061e25;
  float: right;
  top:50px;
  width:800px;
  opacity:2.0;
  padding: 3px;
  height: auto;
}


.my-custom-scrollbar {
position: relative;
height: 450px;
overflow: auto;

}
.table-wrapper-scroll-y {
display: block;
background: transparent;
}


th {
  border-bottom: 1px solid #364043;
  color: #E2B842;
  font-size: 0.95em;
  font-weight: 1100;
  padding: 0.5em 1em;
  text-align: center;
}
td {
  color: #fff;
  font-weight: 400;
  padding: 0.65em 1em;
}
.disabled td {
  color: #4F5F64;
}
tbody tr {
  transition: background 0.25s ease;
}
tbody tr:hover {
  background: #014055;
}




/* reset button in att-form */
.warning {
  border-color: #ff9800;
  color: orange;
}

.warning:hover {
  background: #ff9800;
  color: white;
}



</style>





</head>












<body>
  
  <div id='cssmenu'>
<ul>
   <li><a href='#'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Set Up</span></a>
      <ul>
         <li class='has-sub'><a href=" button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-keyboard="false"  data-backdrop="static" data-target="#myModal1" ><span>Create Class</span></a> 
         <li class='has-sub'> <a href=" button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-keyboard="false" 
          data-backdrop="static" data-target="#myModal2" ><span>View Class</span></a>
         </li>
      </ul>
   </li>

   <li class='active has-sub'><a href='#'><span>Attendance</span></a>
      <ul>
         <li class='has-sub'><a href=" button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-keyboard="false" 
          data-backdrop="static" data-target="#attendance" ><span>Take Attendance</span></a> 
         <li class='has-sub'><a href=" button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-keyboard="false" 
          data-backdrop="static" data-target="#view_att"><span>View Attendance</span></a>
         </li>
      </ul>
   </li>

   <li class='active has-sub'><a href='#'><span>Enrollment</span></a>
      <ul>
         <li class='has-sub'><a href=" button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-keyboard="false" 
          data-backdrop="static" data-target="#attendance" ><span>Take Enrollment</span></a> 
         <li class='has-sub'><a href='#'><span>View Enrollment</span></a>
         </li>
      </ul>
   </li>


   <li class='active has-sub'><a href='#'><span>Queries</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Daily Attendance</span></a>
         <li class='has-sub'><a href='#'><span>Weekly Attendance</span></a>
         <li class='has-sub'><a href='#'><span>Monthly Attendance</span></a>
         <li class='has-sub'><a href='#'><span>Shadow Balance</span></a>
         <li class='has-sub'><a href='#'><span>Average Attendance</span></a>
            
         </li>
         <li class='has-sub'><a href='#'><span>Others</span></a>
            <ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   
</ul>
</div>

    <section>

    </section>
  
<!-- end of menu  -->






















<!------------------------------------------------------------------------------------------------------------------------------------------>
                                  <!-- this code create the classes for mymodal1 -->

<div class="container" >
  
  <!-- The Modal -->
<div class="modal fade" id="myModal1" >
<div class="modal-dialog" >
<div class="modal-content" id="mydiv">
      
        <!-- Modal Header -->
<div class="modal-header">
<h5 class="modal-title" style="color:white;" > <b>Create Classes</b></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
               
                                       <!-- Modal body of modal1, modal one create the classes -->
<div class="modal-body"> 

     <form method="post" id="insert_class">
     <div class="table-repsonsive">
         <span id="error"></span>
         <table  class="table table-bordered" id="class_table">
            <tr>
            <th>Name</th>
            <th>Year</th>
            <th>Term</th>
            <th>Level</th>
            <th>Action</th>
            </tr>
          </table>

    <div ><button type="button" name="add" class="btn btn-success btn-sm add">Add New Class</span></button></div>

    <div align="center">
    <input type="submit" name="submit" class="btn btn-info" value="Save">  
   <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
  
    
</form>
        
        
</div>
</div>
</div>   
</div>
</div>

<!-- end of create modal1 -->
<!------------------------------------------------------------------------------------------------------------------------------------->






















<!-- this code create the view classes for mymodal2 -->
<div class="container">
  <!-- The Modal -->
<div class="modal fade" id="myModal2">
<div class="modal-dialog">
<div class="modal-content" id="mydiv2">
      
        <!-- Modal Header -->
<div class="modal-header">
<h5 class="modal-title" id="ModalLabel" style="color:white;">Select Data To View Classes</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
 </div>
        
        
        <!-- Modal body -->
        
<div class="modal-body">

         <table  class="table table-bordered" >
         <form method="post" name="submit">
            <tr>
            <th>YEAR</th>
            <td><select name="year" class="form-control"  id="select_year" required="true">  
                          <option value="" >Select a year</option>  
                          <?php echo fill_year_select_box1($connect); ?>  
                 </select></td>
            </tr>
            <tr>
            <th>TERM</th>
            <td><select class="form-control" name="term" id="select_term" required="true">  
                          <option value="">Select a term</option>  
                          <?php echo fill_term_select_box1($connect); ?>  
            </select></td>
            </tr>
          </table>
       

<div class="modal-footer">
<button type="ok" name="ok" class="btn btn-success" data-toggle="modal" 
data-keyboard="false"  data-backdrop="static" data-target="#myModal3" data-dismiss="modal">OK</button>
<button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</form>

        
</div>

</div>
</div>
</div>
  




















    
<!-- end of view classes code -->
<!----------------------------------------------------------------------------------------------------------------------------------->




<!--start of modal 3 to view class -->
<div class="container" >
  
  <!-- The Modal -->
<div class="modal fade" id="myModal3" >
<div class="modal-dialog" >
<div class="modal-content" id="mydiv">
      
        <!-- Modal Header -->
<div class="modal-header">
<h5 class="modal-title" style="color:white;" > <b>Class Details</b></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
</div>
               
                                       <!-- Modal body of modal1, modal one create the classes -->
<div class="modal-body" > 
<div class="table-wrapper-scroll-y my-custom-scrollbar" >

<table  class="table table-bordered"  >
<thead>
      <tr align="center">
            <th>NAME</th>
            <th>YEAR</th>
            <th>TERM</th>
            <th>LEVEL</th>
            <th>ACTION</th>
        </tr>
</thead>
<tbody id="show_classes"></tbody>
    
</table>
   
<div ><button class="btn btn-success btn-sm add" data-toggle="modal" data-keyboard="false"  data-backdrop="static" data-target="#myModal1" 
         data-dismiss="modal">Add New Class</span></button></div>       

<div align="center">
<button type="button" class="btn btn-danger" onclick="javascript:window.location.reload()" data-dismiss="modal">Close</button>
</div>
</div>
  
         

</div>
</div>   
</div>
</div>
</div>














<!--------------------------------------------------------------------------------------------------------------------------------------->

<div class="container" >
<div class="modal fade" id="edit_class" role="dialog">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content" id="mydiv3">
		
			  <h5 class="modal-title" style="color:white;"><i class="fa fa-edit" ></i> Update Class</h5>
			 
			
			<div class="modal-body">
      
			
      <table  class="table table-bordered" >
         
            <tr>
            <th>NAME</th>
            <td><input type="text" name="name_modal" id="name_modal" class="form-control" required="true"></td>
            </tr>

            <tr>
            <th>YEAR</th>
            <td>
            <select name="year_modal" id="year_modal" class="form-control" required="true"  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor">
                                               
                                                <option value="year_modal"></option>
                                                <option value="2021" style="background-color:#ece0ec">2021</option>     
                                                <option value="2022" style="background-color:#e5d3e5">2022</option>    
                                                <option value="2023" style="background-color:#dec7de">2023</option>     
                                                <option value="2024" style="background-color:#d7bbd7">2024</option>    
                                                <option value="2025" style="background-color:#cfaecf">2025</option>    
                                                <option value="2026" style="background-color:#c8a2c8">2026</option>  
                                                <option value="2027" style="background-color:#c196c1">2027</option>  
                                                <option value="2028" style="background-color:#b989b9">2028</option>  
                                                <option value="2029" style="background-color:#b27db2">2029</option>     
                                                <option value="2030" style="background-color:#ab71ab">2030</option> 
                                               </select>
            </td>
            </tr>

            <tr>
            <th>TERM</th>
            <td>
            <select name="term_modal" id="term_modal" class="form-control" required="true"  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor">
                                               
                                                <option value="term_modal"></option>
                                                <option value="Christmas Term" style="background-color: #66ccff">Christmas Term</option>   
                                                <option value="Easter Term" style="background-color: #52c5ff">Easter Term</option>   
                                                <option value="August Term" style="background-color: #3fbfff">August Term</option>  
                                               </select>
            </td>
           
            </tr>

            <tr>
            <th>LEVEL</th>
            <td>
            <select name="level_modal" id="level_modal" class="form-control" required="true"  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor">
                                               
                                                <option value="level_modal"></option>
                                                <option value="Level 7" style="background-color: #b9bfdc">Level 7</option>  
                                                <option value="Level 8" style="background-color: #acb3d5">Level 8</option>
                                                <option value="Level 9" style="background-color: #9fa7ce">Level 9</option>
                                                <option value="Level 10" style="background-color: #929cc8">Level 10</option>
                                                <option value="Level 11" style="background-color:#8590c1">Level 11</option>
                                                <option value="Level 12" style="background-color: #7884bb">Level 12</option>  
                                               </select>
             </td>
            </tr>
            <input type="hidden" name="class_id_modal" id="class_id_modal" class="form-control-sm">
          </table>
						
			
				
			
			<div class="modal-footer" >
      <button type="submit" id="update_data" class="btn btn-success btn" data-dismiss="modal"  >Save</button>
			<buttontype="button" class="btn btn-danger" onclick="javascript:window.location.reload()" data-dismiss="modal" >Close</button> </div>
      

		  </div>
		</div>
	</div>
	</div>
<!-- Modal End-->

















<!-- Modal att-->
<div class="container">
  <!-- The Modal -->
<div class="modal fade" id="attendance">
<div class="modal-dialog modal-lg ">
<div class="modal-content" id="mydiv4">
      
        <!-- Modal Header -->
<div class="modal-header">
<h5 class="modal-title" id="ModalLabel" style="color:white;">Attendance Form</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
 </div>

        <!-- Modal body -->
        
<div class="modal-body">

<form method="post" id="take_att">
     <div class="table-repsonsive">
     <span id="error"></span>
         <table  class="table table-bordered">
            <tr >
            <th>YEAR</th>
            <td ><select name="year"   class="form-control"  id="att_year" required="true" style="background-color: #9E9DB4" onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor">  
                              <option value="" >Select year</option>  
                              <option value="2021" style="background-color:#ece0ec">2021</option>     
                              <option value="2022" style="background-color:#e5d3e5">2022</option>    
                              <option value="2023" style="background-color:#dec7de">2023</option>     
                              <option value="2024" style="background-color:#d7bbd7">2024</option>    
                              <option value="2025" style="background-color:#cfaecf">2025</option>    
                              <option value="2026" style="background-color:#c8a2c8">2026</option>  
                              <option value="2027" style="background-color:#c196c1">2027</option>  
                              <option value="2028" style="background-color:#b989b9">2028</option>  
                              <option value="2029" style="background-color:#b27db2">2029</option>     
                              <option value="2030" style="background-color:#ab71ab">2030</option> 
                </select></td> 

            <th>TERM</th>
            <td ><select name="term" class="form-control"  id="att_term" required="true" style="background-color: #9E9DB4" onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" >  
                           <option value="" >Select term</option> 
                           <option value="Christmas Term" style="background-color: #66ccff">Christmas Term</option>   
                           <option value="Easter Term " style="background-color: #52c5ff">Easter Term</option>   
                           <option value="August Term"  style="background-color: #3fbfff">August Term</option>  
                     
                </select></td>

            <th >WEEK</th>
            <td ><select name="week" class="form-control"  id="att_week" required="true" style="background-color: #9E9DB4" onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor">  
                          <option value="" >Select week</option>  
                          <option value="Week 1"  style="background-color: #AE5099 " >Week 1</option>  
                          <option value="Week 2"  style="background-color: #C259AA">Week 2</option>  
                          <option value="Week 3"  style="background-color: #C869B2">Week 3</option>  
                          <option value="Week 4"  style="background-color: #CE7ABB">Week 4</option>  
                          <option value="Week 5"  style="background-color: #D48AC3">Week 5</option>  
                          <option value="Week 6"  style="background-color: #5751E8">Week 6</option>  
                          <option value="Week 7"  style="background-color: #6C67EB">Week 7</option>  
                          <option value="Week 8"  style="background-color: #817CEE">Week 8</option>  
                          <option value="Week 9"  style="background-color: #9692F1">Week 9</option>  
                          <option value="Week 10" style="background-color: #ABA8F3">Week 10</option>  
                          <option value="Week 11" style="background-color: #26E34C">Week 11</option>  
                          <option value="Week 12" style="background-color: #3BE55D">Week 12</option>  
                          <option value="Week 13" style="background-color: #51E86F">Week 13</option>  
                          <option value="Week 14" style="background-color: #67EB81">Week 14</option>  
                          <option value="Week 15" style="background-color: #7CEE93">Week 15</option>  
                          <option value="Week 16" style="background-color: #51E8E8">Week 16</option>  
                          <option value="Week 17" style="background-color: #67EBEB">Week 17</option>  
                          <option value="Week 18" style="background-color: #7CEEEE">Week 18</option>  
                          <option value="Week 19" style="background-color: #92F1F1">Week 19</option>  
                          <option value="Week 20" style="background-color: #A8F3F3">Week 20</option>  
                </select></td>
            <th>DATE</th>
                 <td ><input name="date" style="background-color: #9E9DB4" type="date" class="form-control" id="att_date" required="true"></td>

            </tr>
            
           <tbody id="class_name"><tbody>
                  

                  
          </table>
          <div align="right">
          <input type="reset" value="Reset Data" class="btn warning">
          </div>
      </div>

    <div align="center">
    <input type="submit" name="submit" class="btn btn-success" value="Save"  >
    <button id="btnPrint" type="button" class="btn btn-primary">Print</button>
    <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
    
    
</form>

        
</div>

</div>
</div>
</div>












<!---------------------------------------SELECT DATA TO VIEW ATTENDANCE----------------------------------->
<!-- this code create the view classes for mymodal2 -->
<div class="container">
  <!-- The Modal -->
<div class="modal fade" id="view_att">
<div class="modal-dialog">
<div class="modal-content" id="mydiv2">
      
        <!-- Modal Header -->
<div class="modal-header">
<h5 class="modal-title" id="ModalLabel" style="color:white;">Select Data To View Attendance</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
 </div>
        
        
        <!-- Modal body -->
        
<div class="modal-body">

         <table  class="table table-bordered" >
         <form method="post" name="submit">
            <tr>
            <th>YEAR</th>
            <td><select name="year" class="form-control"  id="select_att_year" required="true">  
                          <option value="" >Select a year</option>  
                          <?php echo fill_year_select_att($connect); ?>  
                 </select></td>
            </tr>
            <tr>
            <th>TERM</th>
            <td><select class="form-control" name="term" id="select_att_term" required="true">  
                          <option value="">Select a term</option>  
                          <?php echo fill_term_select_att($connect); ?>  
            </select></td>
            </tr>
          </table>
       

<div class="modal-footer">
<button type="ok" name="ok" class="btn btn-success" data-toggle="modal" 
data-keyboard="false"  data-backdrop="static" data-target="#view_attendance" data-dismiss="modal">OK</button>
<button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>


        
</div>

</div>
</div>
</div>

<!----------------------------------THIS SHOW THE ATTENDANCE AFTER THE ABOVE MODAL MAKE THE SELECTION----------->

<!-- Modal att-->
<div class="container">
  <!-- The Modal -->
<div class="modal fade" id="view_attendance">
<div class="modal-dialog  ">
<div class="modal-content" id="mydiv5">
      
        <!-- Modal Header -->
<div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel" style="color:white;">Attendance Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
</div>

        <!-- Modal body -->
        
<div class="modal-body">
<div class="table-wrapper-scroll-y my-custom-scrollbar" >
         <table  class="table table-bordered" >


         <tr >
            

            <th colspan="2">SEARCH</th>
            <td><input  style="background-color: #9E9DB4" id="myInput" onkeyup="myFunction()" class="form-control" ></td>
            

            <th>WEEK</th>
            <td><select class="form-control" id="mylist" onchange="myFunction1()">  
                          <option value="">Filter Week</option>  
                          <?php echo filter_classWeek_select_att($connect); ?>  
            </select></td>
            </tr>
           </table>




     <table  class="table table-bordered" id="class_att">
          
           
                      
      </table>
      <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("class_att");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function myFunction1() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("mylist");
  filter = input.value.toUpperCase();
  table = document.getElementById("class_att");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


          
</div>
     

    <div align="center">
    <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
    
    


        
</div>

</div>
</div>
</div>
<!-- THIS PART WILL DIPLAY THE ATTENDANCE  DATA THAT HAS TO BE UPDATED -->

<div class="container" >
<div class="modal fade" id="edit_att" role="dialog">
		<div class="modal-dialog modal-lg">
		  <div class="modal-content" id="mydiv6">
		
			  <h5 class="modal-title" style="color:white;"><i class="fa fa-edit" ></i> Update Attendance</h5>
			 
			
			<div class="modal-body">
      
			
      <table  class="table table-bordered" >
         
            <tr>
            <th >NAME</th>
            <td><input type="text" name="name_modal" id="name_modal" class="form-control" readonly></td>
            
            <th>WEEK</th>
            <td >
            <input type="text" name="week_modal" id="week_modal" class="form-control" readonly  ></td>
            
            <th colspan="2" width="20%" >DATE</th>
            <td > <input type="date" name="date_modal" id="date_modal" class="form-control" readonly  ></td>

            <tr>
            <th colspan="4">AM</th>
            <th colspan="3">PM</th>
            </tr>
           
            </tr>

            <tr>
            <th colspan="2">BOYS</th>
            <th colspan="2">GIRLS</th>
            <th colspan="2">BOYS</th>
            <th colspan="1">GIRLS</th>
            </tr>
            <tr>
            <td colspan="2"><input type="text" name="b1_modal" id="b1_modal" class="form-control" required="true"  ></td>
            
            
            
            <td colspan="2"><input type="text" name="g1_modal" id="g1_modal" class="form-control" required="true"  ></td>
            

           
            <td colspan="2"><input type="text" name="b2_modal" id="b2_modal" class="form-control" required="true" ></td>
            
            
            <td><input type="text" name="g2_modal" id="g2_modal" class="form-control" required="true"  ></td>
            </tr>

            <input type="hidden" name="att_id_modal" id="att_id_modal" class="form-control-sm">
          </table>
						
			
				
			
			<div class="modal-footer" >
      <button type="submit" id="update_data" class="btn btn-success btn" data-dismiss="modal"  >Update</button>
			<button type="button" class="btn btn-danger"  data-dismiss="modal" >Close</button> </div>
      

		  </div>
		</div>
	</div>
	</div>
<!-- Modal End-->


</body>








<!----------------------------------------THHIS SCRIPT DISPLAY THE ATTENDANCE IN THE VIEW ATTENDANCE TABLE--->
<script>  
 $(document).ready(function(){  
      $('#select_att_year,#select_att_term').change(function(){  
           var att_view_year = $(select_att_year).val();  
           var att_view_term = $(select_att_term).val();  
           
           $.ajax({  
                url:"view_att.php",  
                method:"POST",  
                data:{"att_year":att_view_year, "att_term":att_view_term},  
                success:function(data){  
                     $('#class_att').html(data);  
                }  
           });  
      });


 $(function () {
		$('#edit_att').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); /*Button that triggered the modal*/
     
			var id    = button.data('attendance_id');
			var name  = button.data('att_class_name');
			var week  = button.data('att_week');
			var date  = button.data('att_date');
			var b_1    = button.data('att_boys_1');
			var g_1    = button.data('att_girls_1');
			var b_2    = button.data('att_boys_2');
			var g_2    = button.data('att_girls_2');
			var modal = $(this);
			modal.find('#name_modal').val(name);
			modal.find('#week_modal').val(week);
			modal.find('#date_modal').val(date);
			modal.find('#b1_modal').val(b_1);
			modal.find('#g1_modal').val(g_1);
			modal.find('#b2_modal').val(b_2);
			modal.find('#g2_modal').val(g_2);
      modal.find('#att_id_modal').val(id);
      
      
		                                                    });
    });


    $(document).on("click", "#update_data", function(){
    
		$.ajax({
			url: "update_att.php",
			method: "POST",
		  error: function() {
        Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
              },
			data:{
				att_id: $('#att_id_modal').val(),
				b1: $('#b1_modal').val(),
				g1: $('#g1_modal').val(),
				b2: $('#b2_modal').val(),
				g2: $('#g2_modal').val(),
			},
     
			success: function(data){
      
					$('#edit_att').modal().hide();
          Swal.fire(
                    'Success!',
                    'Attendance has been updated!',
                    'success'
                  );
									location.reload();	
                  
			}
     
		  });
	  });     
     
});  

</script>










<!----------------------------------------this script print the att_form---------------------------------->
<script>
document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("attendance"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
</script>


</html>













<!----------------------------------------------------INSERT ATTENDANCE----------------------------------------->
<script>
$(document).ready(function() {

  $('#take_att').on('submit', function(event){

  event.preventDefault();
  var error = '';
  
  $('.class_name', '.term','.week','.date','.year','.b1','.g1','.b2','.g2'  ).each(function(){});
  
  var form_data = $(this).serialize();

  if(error == '')
  
   $.ajax({
    url:"insert_att.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     
      Swal.fire(
                    'Success!',
                    'Attendance Taken Successfully!',
                    
                  );
									location.reload();
              
     
    }
   });
  
  
 });

 

});
</script>











<!----------------------------this script get the name from the class to inpUt into the attendance form------->
<script>  
 $(document).ready(function(){  
      $('#att_year,#att_term, #att_week, #att_date').change(function(){  
        
           var year_att = $(att_year).val();  
           var term_att = $(att_term).val(); 
           var week_att = $(att_week).val(); 
           var date_att = $(att_date).val(); 
          
           
           
           $.ajax({  
                url:"att_form.php",  
                method:"POST",
                  
                data:{year_att:year_att, term_att:term_att, week_att:week_att, date_att:date_att}, 
                
                success:function(data){  
                  
                     $('#class_name').html(data);  
                }  
           });  
           
      });
    });
</script>













<!----------------------------------------------this section is for the edit class------------------------------------------->

<script>  
 $(document).ready(function(){  
      $('#select_year,#select_term').change(function(){  
           var class_year = $(select_year).val();  
           var class_term = $(select_term).val();  
           $.ajax({  
                url:"view_class.php",  
                method:"POST",  
                data:{"class_year":class_year, "class_term":class_term},  
                success:function(data){  
                     $('#show_classes').html(data);  
                }  
           });  
      });


 $(function () {
		$('#edit_class').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); /*Button that triggered the modal*/
     
			var id    = button.data('class_id');
			var name  = button.data('class_name');
			var year  = button.data('year');
			var term  = button.data('term_name');
			var level = button.data('level');
			var modal = $(this);
			modal.find('#name_modal').val(name);
			modal.find('#year_modal').val(year);
			modal.find('#term_modal').val(term);
			modal.find('#level_modal').val(level);
      modal.find('#class_id_modal').val(id);
      
		                                                    });
    });


    $(document).on("click", "#update_data", function(){
    
		$.ajax({
			url: "update_class.php",
			method: "POST",
		  error: function() {
        Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
              },
			data:{
				class_id: $('#class_id_modal').val(),
				class_name: $('#name_modal').val(),
				year: $('#year_modal').val(),
				term_name: $('#term_modal').val(),
				level: $('#level_modal').val(),
			},
			success: function(data){
      
					$('#edit_class').modal().hide();
          Swal.fire(
                    'Success!',
                    'Class has been updated!',
                    'success'
                  );
									location.reload();	
                  
			}
     
		  });
	  });     
     
});  

</script>












<!------------------------------------------CREAT CLASSES FOR SCHOOL YEAR------------------------------->

<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="class_name[]" class="form-control class_name" placeholder="Enter Class Name" required="true" /></td>';
  html += '<td><select onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" name="class_year[]" class="form-control class_year" required="true">  <option value="">Select Year</option>    <option value="2021" style="background-color:#ece0ec">2021</option>      <option value="2022" style="background-color:#e5d3e5">2022</option>     <option value="2023" style="background-color:#dec7de">2023</option>     <option value="2024" style="background-color:#d7bbd7">2024</option>     <option value="2025" style="background-color:#cfaecf">2025</option>    <option value="2026" style="background-color:#c8a2c8">2026</option>   <option value="2027" style="background-color:#c196c1">2027</option>  <option value="2028" style="background-color:#b989b9">2028</option>  <option value="2029" style="background-color:#b27db2">2029</option>     <option value="2030" style="background-color:#ab71ab">2030</option>    </select></td>';
  html += '<td><select  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" name="class_term[]" class="form-control class_term" required="true"><option value="">Select Term</option>     <option value="Christmas Term" style="background-color: #66ccff">Christmas Term</option>    <option value="Easter Term" style="background-color: #52c5ff">Easter Term</option>   <option value="August Term" style="background-color: #3fbfff">August Term</option>  </select></td>';
  html += '<td><select  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" name="class_level[]" class="form-control class_level" required="true"><option value="">Select Level</option>  <option value="Level 7" style="background-color: #b9bfdc">Level 7</option>  <option value="Level 8" style="background-color: #acb3d5">Level 8</option><option value="Level 9" style="background-color: #9fa7ce">Level 9</option><option value="Level 10" style="background-color: #929cc8">Level 10</option><option value="Level 11" style="background-color:#8590c1">Level 11</option><option value="Level 12" style="background-color: #7884bb">Level 12</option></select></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove" class="btn btn-danger btn-xs remove">Delete</button></td></tr>';
  $('#class_table').append(html);
 });
 
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });


 
 $('#insert_class').on('submit', function(event){
  event.preventDefault();
  var error = '';
  
  $('.class_name').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Class Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  
  $('.class_year').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Class Year at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.class_term').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Class Term at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.class_level').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Class Level at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  
  if(error == '')
  {
   $.ajax({
    url:"insert_class.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#class_table').find("tr:gt(0)").remove();
      Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Classes save successfully!',
            showConfirmButton: false,
            timer: 1500
               });
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
 
});
</script>

<!---------------------------------------end of create class section---------------------------------------------------------->





 
 






