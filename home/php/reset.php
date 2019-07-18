<?php
require'conn.php';
if(isset($_POST['c-submit'])){
    $mail=$_POST['email'];
									
    $sql="select email from users";
    $rst= $conn->query($sql);
    
    while($row=$rst->fetch_assoc()){
        if($row['email'] == $mail){
            ini_set('SMTP','localhost');
            ini_set('smtp_port',25);
                $to      = $mail;
                $subject = 'Password Recovery';
                $message = '
                        <html>
                                <head>
                                <title>Password Reset</title>
                                </head>
                                <body>
                                <p>Follow the link to reset your password</p>
                                <i><a href="topnotch.org.allskatersbahati.co.ke/passreset.php">Reset Password</a></i>
                                </body>
                                </html>
                
                ';
                $headers = 'From:topnotchsupport@topnotch.org.allskaters.co.ke' . "\r\n" .
                
                mail($to, $subject, $message, $headers);

            
            
            echo'Reset Link Sent to Mail';
        }else{
            echo'User Does Not Exist';
        }
    }

}
									
									
									
?>