<?php session_start();

    require'../php/conn.php';

	if(empty($_GET['user']) )
	{
        // header("location:../index.php");
        
        echo "Not Initialized";
	
    }
    else {
        $accpt="UPDATE users SET status = '1' WHERE users.u_id = $_GET[user]";
          
            mysqli_query($conn,$accpt) or die("Status Not Changed");

        
    
	    header("location:../view/users.php");
    }

	
?>