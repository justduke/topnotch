<?php
    $uname = $_REQUEST['uname'];
    $msg  = $_REQUEST['msg'];

    $conn= mysqli_connect('localhost','root','');
    mysqli_select_db($conn,'chatbox');
    
    mysqli_query("Insert into logs('username','msg') values('$uname','$msg')");

    $res= mysqli_query("select * from logs ORDER by id DESC");

    while($extract=mysqli_fetch_array($res)){
        echo $extract['username'] . ":".$extract['msg'] ."<br/>";
    }



?>