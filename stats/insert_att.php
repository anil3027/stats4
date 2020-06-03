<?php
//insert.php;
session_start();
if(isset($_POST["class_name"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=stats", "root", "");
 $order_id = uniqid();
 for($count = 0; $count < count($_POST["class_name"]); $count++)
 {  
  $query = "INSERT INTO attendance 
  (create_id, class_id,year, term, week, date,  boys_1, girls_1, boys_2, girls_2) 
  VALUES (:order_id, :class_name,".$_SESSION['v_yer'].", ".$_SESSION['v_term'].",  ".$_SESSION['v_week'].",".$_SESSION['v_date'].", :b1, :g1, :b2, :g2)
  ";
  

  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':order_id'   => $order_id,
    ':class_name'  => $_POST["class_name"][$count], 
    
    ':b1'  => $_POST["b1"][$count],
    ':g1'  => $_POST["g1"][$count],
    ':b2'  => $_POST["b2"][$count],
    ':g2'  => $_POST["g2"][$count],
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>