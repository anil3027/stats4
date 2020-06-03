

<?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "stats");  
 $output = '';  
 session_start();
 

 if(isset($_POST["year_att"]) || isset($_POST["term_att"]) )  
 {
     


      $_SESSION['v_yer']=$_POST["year_att"];
      $_SESSION['v_term']=json_encode($_POST["term_att"]);
      $_SESSION['v_week']=json_encode($_POST["week_att"]);
      $_SESSION['v_date']=json_encode($_POST["date_att"]);
    
      {  
        $sql = "SELECT classes.class_id,classes.class_name FROM classes 
         WHERE (class_year = '".$_POST["year_att"]."') 
         AND   (class_term = '".$_POST["term_att"]."') ORDER BY class_name,class_level ASC"; 
      }  

      $output .= '
     
      <tr align="center">
       <th rowspan="2">CLASS NAME</th>
       
       <th colspan="4">  <input type="checkbox" id="am" onclick="Enabled_am(this)"/> AM </th>
       <th colspan="3"> <input type="checkbox" id= "pm" onclick="Enabled_pm(this)"/> PM</th>
       
      
       <tr align="center">
       
       <th colspan="2">BOYS</th>
       <th colspan="2">GIRLS</th>
       <th colspan="2">BOYS</th>
       <th colspan="2">GIRLS</th>
      
     </tr>
    '; 

      $result = mysqli_query( $connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  

        $output .= '
        
        <tr >
        <td><input name="class_name[]" type="hidden" " form-control" value="'.$row["class_id"].'" >'.$row["class_name"].'  </input></td>
        <td colspan="2" ><select name="b1[]" class="AM 1-50 form-control" disabled="disabled"   required="true" >  <option   value="" >0</option></select>  </td>
        <td colspan="2"><select name="g1[]" class= "AM 1-50 form-control" disabled="disabled" required="true" >  <option value=""  >0</option></select>  </td>
        <td colspan="2"><select name="b2[]" class= "PM 1-50 form-control" disabled="disabled" required="true" >  <option value="" >0</option></select>  </td>
        <td colspan="2"><select name="g2[]" class= "PM 1-50 form-control" disabled="disabled" required="true" >  <option value="" >0</option></select>  </td>
        
        
       
        </tr>'; 

    
   
}




echo $output;
            }
             else
            {
            echo 'Data Not Found';
             }

 ?>  





<!-----------------this get the number in the select ---------------------------->
<script>
$(function(){
    var $select = $(".1-50");
    
    for (i=1;i<=50;i++){
        $select.append($('<option></option>').val(i).html(i))
    }
});
</script>






<!-------------------------this script disable enable the coloumn--------------------->
<script>
function Enabled_am(am) {
    var morning = $('#am').closest('body').find('select.AM');
    

    morning_disabled = am.checked ? false : true;
    


    if(!morning_disabled){
        //Basically is like for loop to loop thru all the select

        //If it's check then will remove disabled
        morning.each(function (i ,opt) {
            if (opt.getAttribute('disabled')){
                opt.removeAttribute('disabled')
            }
        });
    }


    //If it's uncheck then will remove disabled

    if(morning_disabled) {
        morning.each(function (i, opt) {
            if (!opt.getAttribute('disabled')) {
                opt.setAttribute('disabled', true);
            }
        });
    }


}


function Enabled_pm(pm) {
    var afternoon = $('#pm').closest('body').find('select.PM');
    

    afternoon_disabled = pm.checked ? false : true;
    


    if(!afternoon_disabled){
        //Basically is like for loop to loop thru all the select

        //If it's check then will remove disabled
        afternoon.each(function (i ,opt) {
            if (opt.getAttribute('disabled')){
                opt.removeAttribute('disabled')
            }
        });
    }


    //If it's uncheck then will remove disabled

    if(afternoon_disabled) {
        afternoon.each(function (i, opt) {
            if (!opt.getAttribute('disabled')) {
                opt.setAttribute('disabled', true);
            }
        });
    }


}


</script>







