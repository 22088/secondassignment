<?php
$con = new mysqli("localhost", "root", "","assignment");
session_start();
if(isset($_POST['update'])) {
    $sql= "SELECT * from trip";
    $result=mysqli_query($con,$sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

     echo '<form  action="tripupdate.php" method="POST">'.
     '<input  type="text"id="xx" name="fname" value='.$row["BusNumber"].'>'.'<br>'
     .  '<input  type="text"id="xx" name="lname" value='.$row["TicketPrice"].'>'.'<br>'
     .  '<input  type="text"id="xx" name="add" value='.$row["Route"].'>'.'<br>'
     . '<input hidden type="text"id="xx" name="idd" value='.$row["ID"].'>';
     
   
   echo '<input  type="submit" id="xx" name="saveedit" >'
 
   .'</form>';
        }
}
}
if(isset($_POST['saveedit']))
{
   
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $address=$_POST['add'];
    $id=$_POST['idd'];


    $sql= "UPDATE  trip SET BusNumber='$fname', TicketPrice='$lname', Route='$address' WHERE ID='".$id."'" ;
$result=mysqli_query($con,$sql);
header("Location:/assignment/admin.html");
}
?>