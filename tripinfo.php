<?php
$con = new mysqli("localhost", "root", "","assignment");
if(isset($_POST['saveedit'])) {
    session_start();
    $buyer=$_SESSION["ID"];
    $price=$_POST['lname'];
    $id=$_POST['idd'];
    $quantity=1;
    $result=mysqli_query($con,"INSERT INTO reservation(BuyerID,TotalAmount)VALUES('$buyer','$price')");

    $sql2="SELECT ID from reservation WHERE BuyerID='" . $buyer . "' AND TotalAmount='" . $price . "' ";
    $result2=mysqli_query($con,$sql2);
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            $propid=$row["ID"];
            $result3=mysqli_query($con,"INSERT INTO reservationdeatils(reservationID,TripId,Quantity)VALUES('$propid','$id','$quantity')");
        }
    }


    //$result=mysqli_query($con,"INSERT INTO reservationdeatils(reservationID,TripId,Quantity)VALUES('$bus','$price','$route')");
header("Location:/assignment/buyer.html");

}

    

?>