<?php
session_start();
session_destroy();
setcookie("user", "", time()-3600);
echo '<script>alert("Your Have Been Logout");</script>';
echo'
    <script>
    setTimeout(()=> {
        window.location="../../login.1.php"
    },100);
    </script>

';

// echo "Your Have Been Logout <br><a href='index.php'> Click Here</a> To Exit";
?>