<!DOCTYPE html>
<html>
  <head>
     
<link rel="stylesheet" type="text/css" href="viewtrip.css">
</head>

<?php
$con = new mysqli("localhost", "root", "","assignment");
session_start();
$buyer=$_SESSION["ID"];

   /* $sql= "SELECT * from reservation WHERE BuyerId='$buyer' ";
    $result=mysqli_query($con,$sql);*/

    $sql="SELECT reservation.* ,reservationdeatils.* from reservation INNER JOIN reservationdeatils  ON reservationdeatils.reservationId= reservation.ID WHERE reservation.BuyerId='" .$buyer. "'  ";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

     echo '<form  action="mytrip.php" method="POST">'.
     '<div class="grid-container" >'.'<div class="grid-item">' .
     '<p>reservationID</p>'.
     '<input  type="text"id="xx" name="fname" value='.$row["reservationID"].'>'.'<br>'
     .'<p>tripID</p>'
     .  '<input  type="text"id="xx" name="lname" value='.$row["TripId"].'>'.'<br>'
     .  '<p>Quantity</p>'.
      '<input  type="text"id="xx" name="add" value='.$row["Quantity"].'>'.'<br>'
    . '<input hidden type="text"id="xx" name="idd" value='.$row["ID"].'>';
     
   
   echo '<input  type="submit" id="xx" name="saveedit" value="update">'
 
   .'</form>';
   echo '<input  type="submit" id="xx" name="delete" value="delete">';
        }
}
if(isset($_POST['saveedit'])) {

       
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $address=$_POST['add'];
    $sql= "UPDATE  reservationdeatils SET reservationID='$fname', TripId='$lname', Quantity='$address'" ;
    $result=mysqli_query($con,$sql);
    header("Location:/assignment/buyer.html");
}
if(isset($_POST['delete'])) {
    $id=$_POST['idd'];
    $sql2 ="DELETE from reservation WHERE BuyerId='".$buyer."' ";
    $sql3 ="DELETE from reservationdeatils WHERE ID='".$id."' ";
     $result2=mysqli_query($con,$sql2);
     $result3=mysqli_query($con,$sql3);
   
      header("Location:/assignment/buyer.html");
}
?>
</html>