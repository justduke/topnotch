<?php 

    $to ="user@topnotch.com";
    $from="admin@topnotch.com";

    $message="Order Assignd to You";
    $headers ="From: $from\n";
    mail($to, '',$message, $headers);
 ?>