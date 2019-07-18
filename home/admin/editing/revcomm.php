<?php
session_start();
require"..\php/conn.php";

if (isset($_POST['o_id'])) {

    $o_id="$_POST[o_id]";
    $u_id="$_POST[user]";
    $comm="$_POST[rev_comm]";

    $sql="insert into messages(o_id,u_id,message) values('$o_id','$u_id','$comm')";
    // echo $sql;
    $query= $conn->query($sql);
    echo $conn->error;
    // $row= $query->fetch_assoc();

    echo'<script>
                 setTimeout(() => {
                 window.location="../"
                 }, 100);
                 </script>';
   

}





?>