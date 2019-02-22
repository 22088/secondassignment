<?php
$con = new mysqli("localhost", "root", "","assignment");

if(isset($_POST['submit']))
{
    $bus=$_POST['busno'];
    $price=$_POST['ticketprice'];
    $route=$_POST['route'];
    $result=mysqli_query($con,"INSERT INTO trip(BusNumber,TicketPrice,Route)VALUES('$bus','$price','$route')");
header("Location:/assignment/admin.html");
}
?>