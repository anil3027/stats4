<?php  
 //fetch.php 
 
	 $connect = mysqli_connect("localhost", "root", "", "stats"); 
	 
    $id=$_POST['att_id'];
	
	$b1=$_POST['b1'];
	$g1=$_POST['g1'];
	$b2=$_POST['b2'];
	$g2=$_POST['g2'];
    
    
    
	$sql = "UPDATE `attendance` 
	SET
		`boys_1`='{$b1}',
		`girls_1`='{$g1}',
		`boys_2`='{$b2}',
		`girls_2`='{$g2}' WHERE attendance_id=$id";
	
	
	$result = mysqli_query($connect,$sql) or die;

        if($result>0)
               echo "<p class='checkExistance'>Data Exists</p>";
            else
               echo "<p class='checkExistance'>Data doesnt Exist</p>";
 ?>