<?php
require'conn.php';

if(isset($_POST["submit"]))
{
	function validate_input($data) 
		{
  			 $data = trim($data);
  			 $data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}
	$f_name =validate_input( $_POST["f_name"]);
	$l_name =validate_input( $_POST["l_name"]);
	$u_name =validate_input( $_POST["u_name"]);
	$email =validate_input( $_POST["email"]);
	$phone =validate_input( $_POST["phone"]);
	$pass =validate_input( $_POST["pass"]);
	$c_pass = validate_input( $_POST["c_pass"]);
	$pwdleng =strlen($pass);

	if(empty($f_name) || empty($l_name)|| empty($u_name) || empty($email) || empty($phone) || empty($pass) )
	{
		echo "<script> alert('All field required');</script>";
		return;
	}
	if($pass!=$c_pass)
	{
		echo "<script> alert('Password didnot Match');</script>";
		return;
	}

	if($pwdleng < 6)
	{
		echo "<script> alert('Password should be More than 6 charecter');</script>";
		return;
	}
	else
	{
		 $sql = "SELECT * FROM register where u_name='$u_name' || email='$email'";
					$result = mysqli_query($server_conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						echo "<script> alert('Username or Email Already Exsist');</script>";
			
					}	
					else	
					{						
						$sql = "INSERT INTO users (l_name,l_name,u_name,email,phone,pass,) VALUES ('$f_name','$l_name','$u_name','$email','$phone','$pass' )";
							if (mysqli_query($server_conn, $sql))
								{
									echo "<script> alert('Successful created, Goto Login From Account Menu');</script>";
								} 
							else 
								{
									//echo "<script> alert('Check if the field contain special charecter, or contact an administrator');</script>";
									echo mysqli_error($server_conn);
									return;
								}
		
					}
	}

		
}