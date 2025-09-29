<?php    
if (isset($_POST['ulog'])) {
    session_start();
    include('config.php');  

    $username = $_POST['uname'];  
    $password = $_POST['pass'];  
    
    // Sanitize inputs
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);  

    // ✅ Enforce exact (case-sensitive) matching with BINARY
    $sql = "SELECT * FROM user WHERE BINARY username = '$username' AND BINARY password = '$password'";  
    $result = mysqli_query($conn, $sql);  
    $count = mysqli_num_rows($result);  

    if ($count == 1) { 
        // ✅ Use a more accurate session name for users
        $_SESSION['login_user'] = $username; 
        
        echo "<script>
            alert('Login successful');
            window.location = '/E-Commerce/User/Index/index.php';
        </script>";
    } else {  
        echo "<script>
            alert('Login failed. Invalid username or password.');
            window.location = '/E-Commerce/User/index.php';
        </script>";  
    } 
}    
?>  
