<?php

            $con = new mysqli("localhost", "root", "","assignment");
            session_start();
            

            if(isset($_POST['submit'])){ // check if form was submitted
                $ggh=2;
               $sql = "SELECT * from users where Email = '" . $_POST["Email"] . "' and Password ='" . $_POST["Password"] . "'";
              // echo $sql;
               $result = mysqli_query($con, $sql);
           
               if($row = mysqli_fetch_array($result)){
                   $_SESSION["ID"] = $row[0];
                   $_SESSION["TypeID"]=$row[5];
                   
           
                 // header("Location:/project/addProperty.php");
           
              
               }
               $sql2="SELECT pages.* ,links.* from pages INNER JOIN links  ON links.ID= pages.LinkID WHERE pages.TypeID='" .$_SESSION["TypeID"]. "'  ";
               $result2 = mysqli_query($con, $sql2);
               
               if($row2 = mysqli_fetch_array($result2)){
                //echo"loso,al";
          
       
                
                  
              header('Location:/assignment/'.$row2["FriendlyName"].'');
     
            }
           
            }
               ?>