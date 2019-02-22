<?php

$con = new mysqli("localhost", "root", "","assignment");
session_start();

    $sql= "SELECT * from trip";
    $result=mysqli_query($con,$sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

     echo '<form  action="deletetrip.php" method="POST">'.
     '<div class="grid-container" >'.'<div class="grid-item">' .
     '<input  type="text"id="xx" name="fname" value='.$row["BusNumber"].'>'.'<br>'
     .  '<input  type="text"id="xx" name="lname" value='.$row["TicketPrice"].'>'.'<br>'
     .  '<input  type="text"id="xx" name="add" value='.$row["Route"].'>'.'<br>'
    . '<input hidden type="text"id="xx" name="idd" value='.$row["ID"].'>';
     
   
   echo '<input  type="submit" id="xx" name="delete" value="delete">'
 
   .'</form>';
   
        }
}
if(isset($_POST['delete'])) {
   $id=$_POST['idd'];


   $sql4 ="DELETE from trip WHERE ID='".$id."' ";


 
   
    $result4=mysqli_query($con,$sql4);
  
     header("Location:/assignment/admin.html");
}
?>