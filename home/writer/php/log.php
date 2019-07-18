 
<?php
require"conn.php";

function validate_input($data) 
		{
  			 $data = trim($data);
  			 $data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}

        // user login
if(isset($_POST["submit"]))
{

            $uname = validate_input($_POST["uname"]);
			$pwd = validate_input($_POST["pwd"]);
		if($uname =="" || $pwd=="")
		{
            echo "<script> alert('Please Fill The required Field!');</script>";
            echo' <script>
                 setTimeout(() => {
                    window.location="../login.php"
                 }, 100);
            </script>';

			return;
		}
		else
		{
			$sql = "SELECT * FROM users where u_name='$uname' and pass='$pwd'";
                    $result = $conn->query($sql);
                    $rows = mysqli_num_rows($result); 
                    // $rows = $result->num_rows(); 
                    // if (mysqli_num_rows($result) > 0) 
					if ($rows > 0) 
					{
   						session_start();
						$_SESSION['log_user']=$uname;
						setcookie('user_n',$uname,time() + 86400*30,'/');
						// setcookie('user_p',$pwd,time() + 86400*30,'/');
						header("location:..\writer/index.php");
					} 
					else
					{  				
						echo "<script> alert('Invalid Writer Username or Password!');</script>";
                        echo'<script>
                            setTimeout(() => {
                                window.location ="../login.php"
                            }, 100)
                        </script>';
                        return;
					}		
        }
}




?>