<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
					
					
						<div class="row">
							<div class="col-6">
								<div style="background:white;"class="cta-content d-flex align-items-center justify-content-between flex-wrap">
									
									<a href="../index.php" class="btn academy-btn">Back To Home</a>
								</div>
							</div>
						</div>
					
    
    <!-- ##### CTA Area End ##### -->
					<h4 style="color:beige;" class="text-align-center text-center">Make Your Order:</h4>
						<form>
							<div class="form-group">
								<div class="form-checkbox">
									<h4 style="color:beige;">Academic Level</h4>
									<label class="radio-inline">
										<input type="radio"  name="academic-level">
										<span></span>Highschool
									</label>
									<label class="radio-inline">
										<input type="radio"  name="academic-level">
										<span></span>Undergraduate
									</label>
									<label class="radio-inline">
										<input type="radio"  name="academic-level">
										<span></span>Masters
									</label>
									<label class="radio-inline">
										<input type="radio" name="academic-level">
										<span></span>PHD
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="form-checkbox">
									<h4 style="color:beige;">Paper Format</h4>
									<label class="radio-inline">
										<input type="radio" class="roundtrip"  name="paper-format">
										<span></span>APA
									</label>
									<label class="radio-inline">
										<input type="radio"  name="paper-format">
										<span></span>MLA
									</label>
									<label class="radio-inline">
										<input type="radio"  name="paper-format">
										<span></span>Harvard
									</label>
									<label class="radio-inline">
										<input type="radio"  name="paper-format">
										<span></span>Chicago
									</label>
									<label class="radio-inline">
										<input type="radio" id="multi-city" name="paper-format">
										<span></span>Other
									</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Paper Type</span>
										
										<select class="form-control" type="text" placeholder="Type" required >
											<option value="">Essay</option>
											<option value="">Research Paper</option>
											<option value="">Proposal</option>
											<option value="">Course Work</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Subject Area</span>
										<input class="form-control" type="text" placeholder="Subject" required> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Title</span>
										<input class="form-control" type="text" placeholder="Title" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Instructions</span>
										
										<textarea class="form-control" type="text" rows="10" cols="30" name="" placeholder="Instructions"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Deadline</span>
										<input class="form-control" type="datetime-local" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Preffered Writer ID</span>
										<input class="form-control" type="text" placeholder="Preffered Writer">
										<span class="select-arrow"></span>
									</div>
								</div>

								<div class="col-md-2">
									<div class="form-group">
										<span class="form-label">Sources</span>
										<input class="form-control" type="text" placeholder="Sources"> 
											
										

										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<span class="form-label">Zipped Attachments</span>
										<input class="form-control" type="file" placeholder="Attachments"> 
											
										

										<span class="select-arrow"></span>
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Writing Category</span>
										<select class="form-control" required>
											<option>Standard</option>
											<option>Premium</option>
											<option>Platinum</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-btn">
										<button class="submit-btn">Show Invoice</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>