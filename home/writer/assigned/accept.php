<?php

session_start();
  require"../php/conn.php";
                                                    

 if(empty($_GET['o_id']) || empty($_SESSION['sess_id']) )
   {
        // header("location:../index.php");
                                                
          echo "not parsed";
                                            
     }
       else {
            //  $sql="insert into current (o_id,u_id,status) values(".$_GET['o_id'].",".$_SESSION['sess_id'].",1)";

            // $res= mysqli_query($conn,$sql);
            // $res or die("not connected to parse query");

            $accpt="UPDATE order_prog SET status = '2' WHERE order_prog.o_id = $_GET[o_id]";
          
            mysqli_query($conn,$accpt) or die("Status Not Changed");
                                            
            //  header("location:../index.php?success");                               
            //  echo'Order Accepted';

          //   if($res){

          //     $accpt="UPDATE assigned SET status = '1' WHERE assigned.o_id = $_GET[o_id]";
          
          //     mysqli_query($conn,$accpt) or die("Status Not Changed");

          //     // $accpt="UPDATE current SET status = '1' WHERE current.o_id = $_GET[o_id];"
          
          //     // // mysqli_query($conn,$accpt) or die("Status Not Changed");
          //     // $query= $conn->query($accpt);
  

          // }else{
          //     echo'Status Not Changed';
          // }

           
                
             echo "<script> alert('Order #:$_GET[o_id], Accepted');</script>";
										echo'<script>
											setTimeout(() => {
											window.location="../"
											}, 100);
											</script>';

                                                
            }
            
            // if(mysqli_query($conn,$sql)){

            //     $accpt="UPDATE `current` SET `status` = '1' WHERE `current`.`id` = 0;"
            //     mysqli_query($conn,$accpt);

            //     echo'Not Status changed';
            // }
    
                                            // $sql="insert into current (o_id,u_id) values(".$_GET['o_id'].",".$_SESSION['sess_id'].")";

                                            // mysqli_query($conn,$sql) or die("not connected to parse query");
                                            
                                            //  header("location:../index.php?OrderAccepted");
                                            //  echo'Order Accepted';


                                        

                                            

                                     
    

   

  
    
	



                                    

                                   ?>