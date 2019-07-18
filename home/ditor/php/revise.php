<?php session_start();

    require'../php/conn.php';

	if(empty($_GET['order_id']) || empty($_GET['user_id']) || empty($_SESSION['sess_id']) )
	{
        // header("location:../index.php");
        
        echo "Not Initialized";
	
    }
    else {
        $accpt="UPDATE order_prog SET status = '4' WHERE order_prog.o_id = $_GET[order_id]";
                
        mysqli_query($conn,$accpt) or die("Status Not Changed");

	    echo "<script> alert('Order #:$_GET[order_id] Sent To Revision !!');</script>";
             echo'<script>
                 setTimeout(() => {
                 window.location="../"
                 }, 100);
                 </script>';
    }

	
?>