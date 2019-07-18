<?php

session_start();
  require"../php/conn.php";
               
if (isset($_POST['o_id'])) {
  // echo 'data <i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i>'  ;
  if(empty($_FILES['udraft']) )
  {
       // header("location:../index.php");
                                               
         echo "Empty Document";
                                           
    }
      else {

 $target= "..\..\attachments/support/".basename($_FILES['udraft']['name']);
 move_uploaded_file($_FILES['udraft']['tmp_name'], $target);
 $path = $_FILES['udraft']['name'];

            // $sql="insert into order_prog (attached, status) values('$path',3)";
            $sql="UPDATE order_prog SET attached_ed = '$path', status = '3' WHERE order_prog.o_id = $_POST[o_id] and order_prog.e_id=$_SESSION[sess_id]";
            // echo $sql;
            $res= mysqli_query($conn,$sql);
            // echo $conn->error;
           $res or die("not uploaded");
                                           
           //  header("location:../index.php?success");                               
           //  echo'Order Accepted';
        //    if($res){

        //     $accpt="UPDATE current SET status = '0' WHERE current.o_id = $_POST[o_id]";
        
        //     mysqli_query($conn,$accpt) or die("Status Not Changed");

        //     // $accpt="UPDATE current SET status = '1' WHERE current.o_id = $_GET[o_id];"
        
        //     // // mysqli_query($conn,$accpt) or die("Status Not Changed");
        //     // $query= $conn->query($accpt);


        // }else{
        //     echo'Status Not Changed';
        // }
          
              

            echo "<script> alert('Order #:$_POST[o_id], Uploaded');</script>";
                   echo'<script>
                     setTimeout(() => {
                     window.location="../"
                     }, 100);
                     </script>';

                                               
           }
  
}
 
       

                                        

                                            

                                     
    

   

  
    
	



                                    

                                   ?>