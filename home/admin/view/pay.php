<?php
if(!empty($_GET['order_id'])){
              $qr="select pages from orders where o_id=$_GET[order_id]";
              $rst=$conn->query($qr);
              $amount= $row['pages']*250;

              if($amount!=''){ 
              $sq="insert into invoice(o_id,u_id,amount) values('$_GET[order_id]','$_GET[user_id]','$amount');"
              
            
              
              }
            }

              ?>