<?php

session_start();
  require"../php/conn.php";
               
if (isset($_POST['o_id'])) {
 
  if(empty($_FILES['udraft']) && empty($_POST['o_id']) )
  {
       // header("location:../index.php");
                                               
         echo "Empty Document";
                                           
    }
      else {

 $target= "..\..\attachments/writer/".basename($_FILES['udraft']['name']);
 move_uploaded_file($_FILES['udraft']['tmp_name'], $target);
 $path = $_FILES['udraft']['name'];

            // $sql="insert into editing (o_id,u_id,attach_rev,status) values($_POST[o_id],".$_SESSION['sess_id'].",'$path',1)";
            $sql="UPDATE order_prog SET attach_rev = '$path', rev_status = '4' WHERE order_prog.o_id =$_POST[o_id] and order_prog.u_id=".$_SESSION['sess_id']."";
            //  echo $sql;
            $res= mysqli_query($conn,$sql);
            // echo $conn->error;
           $res or die("not connected to parse query");
                                           
           //  header("location:../index.php?success");                               
           //  echo'Order Accepted';
           if($res){

            $accpt="UPDATE order_prog SET status = '3' WHERE order_prog.o_id = $_POST[o_id]";
        
            mysqli_query($conn,$accpt) or die("Status Not Changed");

            // $accpt="UPDATE current SET status = '1' WHERE current.o_id = $_GET[o_id];"
        
            // // mysqli_query($conn,$accpt) or die("Status Not Changed");
            // $query= $conn->query($accpt);


        }else{
            echo'Status Not Changed';
        }
          
              

            echo "<script> alert('Order #:$_POST[o_id], Uploaded');</script>";
                   echo'<script>
                     setTimeout(() => {
                     window.location="../"
                     }, 100);
                     </script>';

                                               
           }
  
}
 
       


                                        

                                            

                                     
    

   

  
    
	



                                    

                                   ?>