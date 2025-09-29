<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Admin Login Page</title>
  <link rel="icon" href="../Home/Images/icon/MCS.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="Login/style.css">
</head>

<body>
  <div class="box-form">
    <div class="left">
      <div class="overlay">
        <h1>Welcome Admin</h1>
        <span>
          <p>login with social media</p>
          <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Login with Twitter</a>
        </span>
      </div>
    </div>

    <div class="right">
      <h5>Login</h5>
      <form action="Login/Sql/adminlog.php" class="form" method="post">
        <p style="font-weight:bold;">Unauthorized User is prohibited! <a href="#" style="text-decoration:none; font-weight:bold; font-size:large; cursor:pointer;">Admin Only!</a></p>
        <div class="inputs">
          <input type="text" id="username" name="uname" placeholder="user name" required>
          <br>
          <input type="password" id="password" name="pass" placeholder="password" required>
          <br><br>

          <div class="remember-me--forget-password">
            <label>
              <input type="checkbox" name="item" checked />
              <span class="text-checkbox">Remember me</span>
            </label>
          </div>

          <br>
          <button type="submit" name="alog" value="alog" style="cursor:pointer;">Login</button>
        </div>
      </form>
    </div>
  </div>

  <!-- ✅ Add this script -->
  <script>
    // When username input is clicked, auto-fill password
    document.getElementById('username').addEventListener('click', function () {
      // You can change the default password here
      document.getElementById('password').value = 'admin123';
    });
  </script>

</body>
</html>
