<?php require_once 'app/init.php'; 
if ($Ouser->is_login() != false) {
  header("location:index.php");
}
?>

<!DOCTYPE HTML>
<html lang="en-us">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/style.css" type='text/css' />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css" />
	    <title>Log in form</title>
	</head>
	<body>
	<div class="header text-center">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="logo"><img src="assets/images/Bismillah-Engeenearing-Logo (1).png" style="width: 12%;" alt="logo" />
						<h2>Inventory management system</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-3">
					<div class="bg">
						<form action="app/action/login.php" method="post">
							<div class="text text-center mt-4 mb-4">
							<h4>Please login to access</h4>
							</div>
							<?php 
								if (isset($_SESSION['login_error'])) {
									echo "<div class='alert alert-danger text-center'>".$_SESSION['login_error']."</div>";
								}
							 ?>
								<div class="form-group">	
									<input type="text" name="username" placeholder="Enter your username"class="form-control  input " required />
								</div>
								<div class="form-group">
									<input type="password" name="password" placeholder="Enter your password"class="form-control input " required />
								</div>
								<button type="submit" name="admin_login" class="btn btn-primary btn-block">login</button>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</body>
</html>			