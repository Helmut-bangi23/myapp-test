<?php    
if (isset($_POST['ulog'])) {
    session_start();
    include('config.php');  

    $username = mysqli_real_escape_string($conn, $_POST['uname']);  
    $password = mysqli_real_escape_string($conn, $_POST['pass']);  

    $sql = "SELECT * FROM user WHERE BINARY username = '$username' AND BINARY password = '$password'";  
    $result = mysqli_query($conn, $sql);  

    if (mysqli_num_rows($result) == 1) { 
        $_SESSION['login_user'] = $username; 
        $_SESSION['login_success'] = true;  // ✅ Set success flag
        header("Location: /E-Commerce/User/Index/index.php");
        exit();
    } else {  
        $_SESSION['login_error'] = "Login failed. Invalid username or password.";
        header("Location: /E-Commerce/User/index.php");
        exit();
    } 
}    
?>
