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
	
	$o_name =validate_input( $_POST["o_name"]);
	$o_title =validate_input( $_POST["o_title"]);
	$o_details =validate_input( $_POST["o_details"]);
	$level =validate_input( $_POST["level"]);
	$pages =validate_input( $_POST["pages"]);
	$format =validate_input( $_POST["format"]);
	
	$target= "../../attachments/support/".basename($_FILES['attachment']['name']);
	move_uploaded_file($_FILES['attachment']['tmp_name'], $target);
	$path = $_FILES['attachment']['name'];


	$deadline = validate_input( $_POST["deadline"]);
	$service = validate_input( $_POST["service"]);
	
	

	
	$sql = "SELECT * FROM orders where order_name='$o_name' or order_title='$o_title'";
	$res=$conn->query($sql);
	echo $conn->error;
	$row2=$res->fetch_assoc();
	//$result = mysqli_query($conn, $sql);
	$row = mysqli_num_rows($res);
		if ( $row > 0) 
			{
				$sql = "INSERT INTO orders (order_name,order_title,order_details,level,pages,format,attachment,deadline,service) VALUES ('$o_name','$o_title','$o_details','$level','$pages','$format','$path','$deadline','$service' )";
							if (mysqli_query($conn, $sql))
								{
									
									
									echo "<script> alert('Order $_POST[o_name] Successfully created');</script>";
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
									return;
								}
			
				}	
					else
					{						
						$sql = "INSERT INTO orders (order_name,order_title,order_details,level,pages,format,attachment,deadline,service) VALUES ('$o_name','$o_title','$o_details','$level','$pages','$format','$path','$deadline','$service' )";
							if (mysqli_query($conn, $sql))
								{
									
									
									echo "<script> alert('Order $_POST[o_name] Successfully created');</script>";
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
									return;
								}
		
					}
	}

		
