<?php

session_start();
  require"../php/conn.php";
                                                    

 if(empty($_GET['o_id']) || empty($_GET['editor']) )
   {
        // header("location:../index.php");
                                                
          echo "not parsed";
                                            
     }
       else {
            $query="select o_id from order_prog where o_id=$_GET[o_id]";
            $ress= $conn->query($query);

            while($row = mysqli_fetch_assoc($ress)){

                $sql="UPDATE order_prog SET e_id = $_GET[editor] WHERE order_prog.o_id = $_GET[o_id]";

            


             $res= mysqli_query($conn,$sql);
             echo $res;
            $res or die("not connected to parse query");
                                            
            //  header("location:../index.php?success");                               
            //  echo'Order Accepted';
           
               

                                            
            //  header("location:../index.php?OrderRejected");                               
             echo "<script> alert('Order #:$_GET[o_id] Assigned to Editor #:$_GET[editor] !!');</script>";
             echo'<script>
                 setTimeout(() => {
                 window.location="../"
                 }, 100);
                 </script>';

                                                
            }
            }
                                    

                                   ?>