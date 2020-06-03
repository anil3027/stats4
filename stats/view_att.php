<?php  

 $connect = mysqli_connect("localhost", "root", "", "stats");  
 $output = '';  
 $sql = "SELECT attendance.attendance_id,attendance.year, attendance.term,attendance.week,attendance.date, attendance.boys_1,
         attendance.girls_1, attendance.boys_2,attendance.girls_2, classes.class_name FROM attendance 
         INNER JOIN classes ON attendance.class_id=classes.class_id
         WHERE (year = '".$_POST["att_year"]."') AND (term = '".$_POST["att_term"]."') 
          ORDER BY attendance_id,date ASC";  



 


$output .= '
     
<thead>
                <tr align="center" >
                                
                                <th rowspan="2"> CLASS NAME</th>
                                <th rowspan="2"> WEEK</th>
                                <th rowspan="2"> DATE</th>
                                <th colspan="2"> AM </th>
                                <th colspan="2"> PM</th>
                                <th width="10%" rowspan="2">ACTION</th>
                </tr>
      
                <tr align="center">
                                <th >BOYS</th>
                                <th >GIRLS</th>
                                <th >BOYS</th>
                                <th >GIRLS</th>
                
                </tr>
            </thead>
'; 
echo $output;

          $result = mysqli_query( $connect, $sql);
          if(isset($_POST["att_year"]) || isset($_POST['att_term']))   {
          while($row = $result->fetch_assoc()) {
             

      ?> 
       
        
        <tr  id="<?=$row['attendance_id'];?>" >
            
            <td  width="10%"><?=$row['class_name'];?></td>
            <td  width="8%"><?=$row['week'];?></td>
            <td  width="8%"><?=$row['date'];?></td>
            <td align="center"><?=$row['boys_1'];?></td>
            <td align="center"><?=$row['girls_1'];?></td>
            <td align="center"><?=$row['boys_2'];?></td>
            <td align="center"><?=$row['girls_2'];?></td>
            <td align="center"> 
            
            <button type="button" class="btn btn-success btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#edit_att" 
		         data-attendance_id="<?=$row['attendance_id'];?>"
             data-att_class_name="<?=$row['class_name'];?>"
             data-att_week="<?=$row['week'];?>"
             data-att_date="<?=$row['date'];?>"
             data-att_boys_1="<?=$row['boys_1'];?>"
             data-att_girls_1="<?=$row['girls_1'];?>"
             data-att_boys_2="<?=$row['boys_2'];?>"
             data-att_girls_2="<?=$row['girls_2'];?>"
             >Edit</button>
            <button class="btn btn-danger btn-sm delete" >Delete</button>
            </td>
        </tr>
    
<?php	
	}
  }

	else {
		echo "<tr >
		<td colspan='5'>No Result found !</td>
		</tr>";
	}
  mysqli_close($connect);

?>

 
 
 <script type="text/javascript">
 $(document).ready(function(){
    $(".delete").click(function(){
      
  var id = $(this).parents("tr").attr("id");

        
        
        if(confirm('Are you sure to remove  this record?'))
        { 
            $.ajax({
               url: "delete_att.php",
               type: "GET",
               data: {id: id},
             error: function() {
                 alert('Something is wrong');
              },
               success: function(data) {
                Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Deleting Attendance',
                            showConfirmButton: false,
                            timer: 1500
                               });
                    $("#"+id).remove();
 
                      
               }
            });
        }
    });

    
   

  });
</script>


