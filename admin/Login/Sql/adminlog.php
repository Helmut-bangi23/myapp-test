<?php    
if (isset($_POST['alog'])) {  
    session_start();
    include('config.php');  

    $username = $_POST['uname'];  
    $password = $_POST['pass'];  
    
    // Sanitize input
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);  

    // ✅ Enforce exact (case-sensitive) match with BINARY
    $sql = "SELECT * FROM admin WHERE BINARY username = '$username' AND BINARY password = '$password'";  
    $result = mysqli_query($conn, $sql);  
    $count = mysqli_num_rows($result);  
    
    if ($count == 1) {  
        $_SESSION['login_user'] = $username;
        echo "<script>
            alert('Login successful');
            window.location = '/E-Commerce/Admin/Index/index.php';	
        </script>";
    } else {  
        echo "<script>
            alert('Login failed. Invalid username or password.');
            window.location = '/E-Commerce/Admin/index.php';
        </script>";  
    }   
}  
?>  
