<?php
         if(isset($_POST["submit"])){
            $servername = "localhost:3306";
            $username = "duke";
            $password = "Server123";
            $dbname = "writersclub";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // var
            // $f_name="$_POST['f_name']";
            // $l_name="$_POST['l_name']";
            // $u_name="$_POST['u_name']";
            // $email="$_POST['email']";
            // $phone="$_POST['phone']";
            // $pass="$_POST['pass']";



            // Check connection
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            } 
            // $sql = "INSERT INTO tutorials_inf(name)VALUES ('".$_POST["name"]."')";

            $sql = "INSERT INTO users (f_name,l_name,u_name,email,phone,pass) VALUES ('".$_POST["f_name"]."','".$_POST["l_name"]."','".$_POST["u_name"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["pass"]."' )";

            if (mysqli_query($conn, $sql)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . mysqli_error($conn);
            }
            $conn->close();
         }
      ?>