<?php

session_start();
  require"../php/conn.php";
               
//   if(isset($_POST['submitDraft'])){
    if( empty($_GET['o_id']) )
   {
        // header("location:../index.php");
                                                
          echo "Empty Order Identification";
                                            
     }
     if( empty($_SESSION['sess_id']) )
   {
        // header("location:../index.php");
                                                
          echo "Empty Sess id";
                                            
     }

 if(  empty($_GET['uploadDraft']) )
   {
        // header("location:../index.php");
                                                
          echo "Empty Document";
                                            
     }
       else {

    $target= "../../user-attach/".basename($_FILES['uploadDraft']['name']);
	move_uploaded_file($_FILES['uploadDraft']['tmp_name'], $target);
	$path = "../../user-attach/".$_FILES['uploadDraft']['name'];

             $sql="insert into editing (o_id,u_id,attached,status) values(".$_GET['o_id'].",$path,".$_SESSION['sess_id'].",1)";

            $res= mysqli_query($conn,$sql);
            $res or die("not connected to parse query");
                                            
            //  header("location:../index.php?success");                               
            //  echo'Order Accepted';
           
               

             echo "<script> alert('Order #:$_GET[o_id], Accepted');</script>";
										echo'<script>
											setTimeout(() => {
											window.location="../"
											}, 100);
											</script>';

                                                
            }
        // }
            
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