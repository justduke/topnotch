 

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


		
		if(empty($_POST))
		{
			exit;
		}
		
		if(empty($_POST['uname'])||empty($_POST['pwd'])||empty($_POST['cat']))
		{
			echo "You must enter all fields";
		}

		

		
		if($_POST['cat']=='Editor')
		{	 
			$uname = validate_input($_POST["uname"]);
			$pwd = validate_input($_POST["pwd"]);
		
			
			$sql = "select * from editors where u_name='$uname' and pass='$pwd'";
			
			$result = $conn->query($sql);
             $rows = mysqli_num_rows($result); 
			
			
			if(!empty($rows))
			{
				if($rows == 1)
				{
					//login
					
					session_start();
						$user= mysqli_fetch_assoc($result);
						$_SESSION['log_user']=$user['u_name'];
						$_SESSION['sess_id'] =$user['e_id'];
						setcookie('user_n',$uname,time() + 86400*7,'/');
						setcookie('sess_user_id',$user['e_id'],time() + 86400*1,'/');
					
					// $_SESSION['unm']=$row['ee_fnm'];
					// $_SESSION['eeid']=$row['ee_id'];
					// $_SESSION['cat']='employee';
					// $_SESSION['status']=1;
					// $_SESSION['employee']=1;
					
					header("location:..\ditor/index.php");
				}
				else
				{
					
					echo "<script> alert('Wrong Username and Password!');</script>";
					echo' <script>
						setTimeout(() => {
							window.location="../login.1.php"
						}, 100);
					</script>';
				}
			}
			else
			{
				
				echo "<script> alert('No such User exists!');</script>";
					echo' <script>
						setTimeout(() => {
							window.location="../login.php"
						}, 100);
					</script>';
			}
			
		}	

		if($_POST['cat']=='Admin')
		{	 
			$uname = validate_input($_POST["uname"]);
			$pwd = validate_input($_POST["pwd"]);
		
			
			$sql = "select * from admin where u_name='$uname' and pass='$pwd'";
			
			$result = $conn->query($sql);
             $rows = mysqli_num_rows($result); 
			
			
			if(!empty($rows))
			{
				if($rows == 1)
				{
					//login
					
					session_start();

						$user= mysqli_fetch_assoc($result);
						$_SESSION['log_user']=$user['u_name'];
						$_SESSION['sess_id'] =$user['a_id'];
						setcookie('user_n',$uname,time() + 86400*30,'/');
					
					// $_SESSION['unm']=$row['ee_fnm'];
					// $_SESSION['eeid']=$row['ee_id'];
					// $_SESSION['cat']='employee';
					// $_SESSION['status']=1;
					// $_SESSION['employee']=1;
					
					header("location:..\admin/index.php");
				}
				else
				{
					
					echo "<script> alert('Wrong Username and Password!');</script>";
					echo' <script>
						setTimeout(() => {
							window.location="../login.1.php"
						}, 100);
					</script>';
				}
			}
			else
			{
				
				echo "<script> alert('No such User exists!');</script>";
					echo' <script>
						setTimeout(() => {
							window.location="../login.1.php"
						}, 100);
					</script>';
			}
			
		}	







        // user login
// if(isset($_POST["submit"]))
// {

//             $uname = validate_input($_POST["uname"]);
// 			$pwd = validate_input($_POST["pwd"]);
// 		if($uname =="" || $pwd=="")
// 		{
//             echo "<script> alert('Please Fill The required Field!');</script>";
//             echo' <script>
//                  setTimeout(() => {
//                     window.location="../login.php"
//                  }, 100);
//             </script>';

// 			return;
// 		}
// 		else
// 		{
// 			$sql = "SELECT * FROM users where u_name='$uname' and pass='$pwd'";
//                     $result = $conn->query($sql);
//                     $rows = mysqli_num_rows($result); 
//                     // $rows = $result->num_rows(); 
//                     // if (mysqli_num_rows($result) > 0) 
// 					if ($rows == 1) 
// 					{
// 						session_start();

// 						$user= mysqli_fetch_assoc($result);
// 						$_SESSION['log_user']=$user['u_name'];
// 						$_SESSION['sess_id'] =$user['u_id'];
// 						setcookie('user_n',$uname,time() + 86400*30,'/');
						


					
// 						header("location:..\writer/index.php");
// 					} 
// 					else
// 					{  				
// 						echo "<script> alert('Invalid Writer Username or Password!');</script>";
//                         echo'<script>
//                             setTimeout(() => {
//                                 window.location ="../login.php"
//                             }, 100)
//                         </script>';
//                         return;
// 					}		
//         }
// }




?>