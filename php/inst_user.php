<?php
require'conn.php';

if(isset($_POST["submit"])){

    

    $f_name =  mysqli_real_escape_string($server_conn,$_POST['f_name']);
    $l_name = mysqli_real_escape_string($server_conn,$_POST['l_name']);
    $u_name =  mysqli_real_escape_string($server_conn,$_POST['u_name']);
    $email =   mysqli_real_escape_string($server_conn,$_POST['email']);
    $phone =  mysqli_real_escape_string($server_conn,$_POST['email']);
    $pass =   mysqli_real_escape_string($server_conn,$_POST['pass']);
    $c_pass =  mysqli_real_escape_string($server_conn,$_POST['c_pass']);

    if(empty($f_name)|| empty($l_name)|| empty($email) || empty($phone) || empty($pass) || empty($c_pass)){
        echo"<script> alert('All fields Required');</script>";
        return;
    }

    if(!$pass= $c_pass){
        echo"<script> alert('Passwords Do not match'); </script>";
        return;
    }



    else{
        $query = " SELECT * From users where u_name='$u_name' || email='$email' ";
        $rst = mysqli_query($server_conn,$query);

        if(mysqli_num_rows($rst) > 0){
            echo "<script> alert('Username or Email Already Exsist');</script>";
        }

        else{
            $sql = "INSERT INTO users (f_name, l_name, u_name, email, phone,pass ) VALUES('$f_name','$l_name','$u_name','$email','$phone','$pass')";
            if(mysqli_query($server_conn,$sql)){
                echo"<script> alert('User Created Successfully'); </script>";
            }else{
                echo mysqli_error($server_conn);
                return;
            }
        }
        
    }
}
else{
    echo"<script> alert('Not Active');</script>";
}
   

    
?>