<!DOCTYPE html>
<html>
  <head>
     
<link rel="stylesheet" type="text/css" href="viewtrip.css">
</head>

<?php
$con = new mysqli("localhost", "root", "","assignment");
session_start();

    $sql= "SELECT * from trip";
    $result=mysqli_query($con,$sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

     echo '<form  action="tripinfo.php" method="POST">'.
     '<div class="grid-container" >'.'<div class="grid-item">' .
     '<input  type="text"id="xx" name="fname" value='.$row["BusNumber"].'>'.'<br>'
     .  '<input  type="text"id="xx" name="lname" value='.$row["TicketPrice"].'>'.'<br>'
     .  '<input  type="text"id="xx" name="add" value='.$row["Route"].'>'.'<br>'
    . '<input hidden type="text"id="xx" name="idd" value='.$row["ID"].'>';
     
   
   echo '<input  type="submit" id="xx" name="saveedit" value="reservation">'
 
   .'</form>';
   
        }
}
?>
</html>