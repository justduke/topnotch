<?php session_start();

    require'../php/conn.php';

	if(empty($_GET['o_id']) || empty($_GET['user']) )
	{
        // header("location:../index.php");
        
        echo "Not Initialized";
	
    }
    elseif(!empty($_GET['o_id']) || !empty($_GET['user']) ) {
        $accpt="UPDATE orders SET payment = '2' WHERE orders.o_id = $_GET[o_id]";
          
        mysqli_query($conn,$accpt) or die("Status Not Changed");
    
        header("location:details.php?o_id=$_GET[o_id]&& user=$_GET[user] Pay");
        
    }
    if($_GET['o_id']!=''){

        $sql="select payment from orders where o_id=$_GET[o_id]";
        $rst=$conn->query($sql);

        while($row=$rst->fetch_assoc()){
            if($row['payment'] == 2){
                $qr="UPDATE invoice SET status ='2' where invoice.o_id=$_GET[o_id]";

                header("location:details.php?o_id=$_GET[o_id]&& user=$_GET[user] Invoice");
            }
        }
    }
    else{
        echo' Not Yet Paid';
    }

    

	
?>