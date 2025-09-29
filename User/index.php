<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>User Login Page</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="icon" href="../Home/Images/icon/MCS.png" type="image/x-icon">

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="Login/style.css">

</head>

<body>
	<!-- partial:index.partial.html -->
	
	<div class="box-form">
		<div class="left">
			<div class="overlay">
				<h1>Welcome Customer</h1>

				<span>
					<p>login with social media</p>
					<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
				</span>
			</div>
		</div>


		<div class="right">
			<h5>Login</h5>
			<p style ="font-weight:bold;"> Don't have an account? <a href="Login/reg.php" style="text-decoration:none; font-weight:bold; font-size:large; cursor:pointer;">Register Now! </a></p>
			<form action = "Login/Sql/userlog.php" class="form" method="post">


				<div class="inputs">
					<input type="text" name="uname" placeholder="user name" required>
					<br>
					<input type="password" name="pass" placeholder="password" required>

					<br><br>
					<div class="remember-me--forget-password">
						<!-- Angular -->
						<label>
							<input type="checkbox" name="item" checked />
							<span class="text-checkbox">Remember me</span>
						</label>
						
					</div>

					<br>
					<button type="submit" name="ulog" value= "ulog" style="cursor:pointer;">Login</button>
				</div>






			</form>

		</div>

	</div>
	
<?php
session_start();

// ✅ Show success message if login was successful and user is redirected back here for any reason
if (isset($_SESSION['login_success']) && $_SESSION['login_success'] === true) {
    echo "<script>alert('Login successful');</script>";
    unset($_SESSION['login_success']); // clear it so it doesn’t show again
}

// ✅ Show error if login failed
if (isset($_SESSION['login_error'])) {
    echo "<script>alert('" . $_SESSION['login_error'] . "');</script>";
    unset($_SESSION['login_error']);
}
?>

</body>

</html>