<?php
require"conn.php";

function validate_input($data) 
		{
  			 $data = trim($data);
  			 $data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}

if(isset($_POST["submit"]))
{
	
        $ef_name =validate_input( $_POST["ef_name"]);
        $el_name =validate_input( $_POST["el_name"]);
        $eu_name =validate_input( $_POST["eu_name"]);
        $e_email =validate_input( $_POST["e_email"]);
        $e_phone =validate_input( $_POST["e_phone"]);
        $e_pass =validate_input( $_POST["e_pass"]);
        $c_pass = validate_input( $_POST["ec_pass"]);
        $pwdleng =strlen($e_pass);
    
        if(empty($ef_name) || empty($el_name)|| empty($eu_name) || empty($e_email) || empty($e_phone) || empty($e_pass) )
        {
			echo "<script> alert('All field required');</script>";
			echo'<script>
					setTimeout(() => {
				window.location="../"
					}, 100);
			</script>';
            return;
        }
	if($e_pass!=$c_pass)
	{
		echo "<script> alert('Password did not Match');</script>";
		echo'<script>
					setTimeout(() => {
				window.location="../"
					}, 100);
			</script>';
		return;
	}

	if($pwdleng < 6)
	{
		echo "<script> alert('Password should be More than 6 charecter');</script>";
		echo'<script>
					setTimeout(() => {
				window.location="../"
					}, 100);
			</script>';
		return;
	}
	else
	{
		 $sql = "SELECT * FROM editors where eu_name='$eu_name' || email='$e_email'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						echo "<script> alert('Username or Email Already Exsist');</script>";
						echo'<script>
											setTimeout(() => {
											window.location="../"
											}, 100);
											</script>';
			
					}	
					else	
					{						
						$sql = "INSERT INTO editors (f_name,l_name,eu_name,email,phone,pass) VALUES ('$ef_name','$el_name','$eu_name','$e_email','$e_phone','$e_pass' )";
							if (mysqli_query($conn, $sql))
								{
									echo "<script> alert('Editor $_POST[ef_name] Successfully created');</script>";
										echo'<script>
											setTimeout(() => {
											window.location="../"
											}, 100);
											</script>';
												} 
							else 
								{
									//echo "<script> alert('Check if the field contain special charecter, or contact an administrator');</script>";
									echo mysqli_error($conn);
									echo'<script>
											setTimeout(() => {
											window.location="../"
											}, 100);
											</script>';
									
								}
		
					}
	}

		
}