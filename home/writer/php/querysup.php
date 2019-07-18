<?php
session_start();
require"conn.php";

if (isset($_POST['o_id'])) {

    $o_id="$_POST[o_id]";
    $u_id="$_POST[u_id]";
    $o_mess="$_POST[o_mess]";

    $sql="insert into messages(o_id,u_id,u_message) values('$o_id','$u_id','$o_mess')";
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