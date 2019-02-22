<?php 
$con = new mysqli("localhost", "root", "","assignment");



       if(isset($_POST['display'])) {
        $sql= "SELECT * from trip ";
        $result=mysqli_query($con,$sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        echo"ID"." ". $row["ID"].' '."Bus Number"." ". $row["BusNumber"].' '. "Price"." ".$row["TicketPrice"].' '."Route"." ". $row["Route"];
        echo '<br>';
       }
       
    }
}


       ?>