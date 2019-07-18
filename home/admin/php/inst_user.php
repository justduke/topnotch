<?php

require"conn.php";

// $conn = mysqli_connect($server,$user,$pass,$db) or die('Server Not Available' .mysqli_connect_error())";
function validate_input($data) 
		{
  			 $data = trim($data);
  			 $data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}
		
if(!$conn){
	echo"Server Connection Failed";
}

if(isset($_POST["submit"]))
{
	
	$f_name =validate_input( $_POST["f_name"]);
	$l_name =validate_input( $_POST["l_name"]);
	$u_name =validate_input( $_POST["u_name"]);
	$email =validate_input( $_POST["email"]);
	$phone =validate_input( $_POST["phone"]);
	$pass =validate_input( $_POST["pass"]);
	$cpass =validate_input( $_POST["cpass"]);
	$pwdleng =strlen($pass);

	if(empty($f_name) || empty($l_name)|| empty($u_name) || empty($email) || empty($phone) || empty($pass) )
	{
		
		
		echo "<script> alert('All field required');</script>";
		echo'<script>
   			 setTimeout(() =>{window.location="../"},100);
			</script>';
		return;
	}

	if($pass!= $cpass)
	{
		echo "<script> alert('Password did not Match');</script>";
		echo'<script>
    			setTimeout(() =>{window.location="../"},1000);
		</script>';
		return;
	}

	if($pwdleng < 6)
	{
		echo "<script> alert('Password should be More than 6 charecter');</script>";
		echo'<script>
   			 setTimeout(() =>{window.location="../"},1000);
			</script>';
		return;
	}
	else
	{
		 $sql = "SELECT * FROM users where u_name='$u_name' || email='$email'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						echo "<script> alert('Username or Email Already Exsist');</script>";
						echo'<script>
    							setTimeout(() =>{window.location="../"},1000);
								</script>';
			
					}	
					else	
					{						
						$sql = "INSERT INTO users (f_name,l_name,u_name,email,phone,pass) VALUES ('$f_name','$l_name','$u_name','$email','$phone','$pass' )";
							if (mysqli_query($conn, $sql))
								{
									echo "<script> alert('User $_POST[f_name] Successful created');</script>";
									echo'<script>
   							 			setTimeout(() =>{window.location="../"},1000);
									</script>';
									
								} 
							else 
								{
									//echo "<script> alert('Check if the field contain special charecter, or contact an administrator');</script>";
									echo mysqli_error($conn);
									echo'<script>
   										 setTimeout(() =>{window.location="../"},1000);
										</script>';
									return;
								}
		
					}
	}

		
}