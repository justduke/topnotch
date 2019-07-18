<?php session_start();

    require'../php/conn.php';

	if(empty($_GET['order_id']) || empty($_GET['user_id']) || empty($_SESSION['sess_id']))
	{
        // header("location:../index.php");
        
        echo "Not Initialized";
	
    }
    else {
        $sql="insert into approves (o_id,e_id,u_id) values(".$_GET['order_id'].",".$_SESSION['sess_id'].",".$_GET['user_id'].")";


        mysqli_query($conn,$sql);
        // echo $conn->error;
	    header("location:../index.php");
    }

	
?>