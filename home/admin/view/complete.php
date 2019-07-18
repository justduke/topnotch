<?php

session_start();
  require"../php/conn.php";
                                                    

 if(empty($_GET['order_id']) || empty($_GET['user_id']) )
   {
        // header("location:../index.php");
                                                
          echo "not parsed";
                                            
     }
       else {
            //  $sql="insert into closed (o_id,u_id,status) values(".$_GET['order_id'].",".$_GET['user_id'].",1)";

            //  mysqli_query($conn,$sql) or die("not connected to parse query"**);
            $accpt="UPDATE order_prog SET status = '5',date_closed=NOW() WHERE order_prog.o_id = $_GET[order_id]";
                
            $conn->query($accpt) ;  

            // echo $conn->error;
           

            if($_GET['order_id'] !=''){
              $qr="select pages from orders where o_id=$_GET[order_id]";
              $rst=$conn->query($qr);
              $row=$rst->fetch_assoc();
              $amount= $row['pages']*250;

              echo $amount;

              $sq="insert into invoice(o_id,u_id,amount) values('$_GET[order_id]','$_GET[user_id]','$amount')";
              $conn->query($sq);
              echo $conn->error;
            }
            //  elseif($amount!=''){ 
               
            //   $sq="insert into invoice(o_id,u_id,amount) values('$_GET[order_id]','$_GET[user_id]','$amount')";
            //   $conn->query($sq);
            
          
            //   }else{
            //     echo'No invoice update';
            //   }
            

            

                                            
            //  header("location:../index.php?OrderRejected");                               
             echo "<script> alert('Order #:$_GET[order_id] Sent To Closed !!');</script>";
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