<?php session_start();

    require'../php/conn.php';

	if(empty($_GET['o_id']) || empty($_GET['user']) )
	{
        // header("location:../index.php");
        
        echo "Not Initialized";
	
    }
    else {
        $sql="insert into order_prog (o_id,u_id,status) values(".$_GET['o_id'].",".$_GET['user'].",1)";

        mysqli_query($conn,$sql) or die("wrong query");
    
	    header("location:../index.php");
    }

	
?>