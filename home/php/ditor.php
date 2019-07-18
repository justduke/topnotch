
<?php 
session_start();
require"conn.php";

function validate_input($data) 
		{
  			 $data = trim($data);
  			 $data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}


		
		
		
		if(empty($_POST['uname'])||empty($_POST['pwd']) )
		{
			echo "You must enter all fields";
		}

		

		
		if(isset($_POST['submit']))
		{	 
			$uname = validate_input($_POST["uname"]);
			$pwd = validate_input($_POST["pwd"]);
		
			
			$sql = "select * from editors where eu_name='$uname' and pass='$pwd'";
			
			$result = $conn->query($sql);
             $rows = mysqli_num_rows($result); 
			
			
			if(!empty($rows))
			{
				if($rows = mysqli_num_rows($result))
				{
					//login
					
					session_start();
						$user= mysqli_fetch_assoc($result);
						$_SESSION['log_user']=$user['eu_name'];
						$_SESSION['sess_id'] =$user['e_id'];
						setcookie('user_n',$uname,time() + 86400*7,'/');
						setcookie('sess_user_id',$user['e_id'],time() + 86400*1,'/');
					
					
					
					header("location:..\ditor/index.php");
				}
				else
				{
					
					echo "<script> alert('Wrong Username and Password!');</script>";
					echo' <script>
						setTimeout(() => {
							window.location="../login.2.php"
						}, 100);
					</script>';
				}
			}
			else
			{
				
				echo "<script> alert('No such User exists!');</script>";
					echo' <script>
						setTimeout(() => {
							window.location="../login.2.php"
						}, 100);
					</script>';
			}
			
        }
    ?>