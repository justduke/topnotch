<?php

session_start();
  require"../php/conn.php";
                                                    

 if(empty($_GET['order_id']) || empty($_GET['user_id']) )
   {
        // header("location:../index.php");
                                                
          echo "not parsed";
                                            
     }
       else {
            //  $sql="insert into editing (o_id,u_id,status) values(".$_GET['order_id'].",".$_GET['user_id'].",1)**";
            //  $sql="UPDATE editing SET status = '1' WHERE editing.o_id =".$_GET['order_id']." and editing.u_id=".$_GET['user_id']."";

            //  mysqli_query($conn,$sql) or die("not connected to parse query"**);

            
            $accpt="UPDATE order_prog SET status = '3' WHERE order_prog.o_id = $_GET[order_id]";
                
            mysqli_query($conn,$accpt) or die("Status Not Changed");

            //  $res= mysqli_query($conn,$sql);
            // $res or die("not connected to parse query");
                                            
            //  header("location:../index.php?success"**);                               
            //  echo'Order Accepted';
           
                // while($res){

                //     $accpt="UPDATE revision SET status = '0' WHERE revision.o_id = $_GET[order_id]";
                
                //     mysqli_query($conn,$accpt) or die("Status Not Changed");

                // //     // $accpt="UPDATE current SET status = '1' WHERE current.o_id = $_GET[o_id];"
                
                // //     // // mysqli_query($conn,$accpt) or die("Status Not Changed");
                // //     // $query= $conn->query($accpt);
        

                // }
                // else{
                //     echo'Status Not Changed';
                // }

                                            
            //  header("location:../index.php?OrderRejected");                               
             echo "<script> alert('Order #:$_GET[order_id] Sent To Editing !!');</script>";
             echo'<script>
                 setTimeout(() => {
                 window.location="../"
                 }, 100);
                 </script>';

                                                
            }
    
                                            // $sql="insert into current (o_id,u_id) values(".$_GET['o_id'].",".$_SESSION['sess_id'].")";

                                            // mysqli_query($conn,$sql) or die("not connected to parse query");
                                            
                                            //  header("location:../index.php?success");
                                            //  echo'Order Accepted';


                                        

                                            

                                     
    

   

  
    
	



                                    

                                   ?>