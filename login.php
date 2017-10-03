<?php
    session_start();
    include './shared/db_connect.php';
    $email = $_POST['email'];
    $user_query = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if(mysqli_num_rows($user_query) > 0){
        $user = $user_query->fetch_assoc();
        if($user['password'] != $_POST['password']){
            $_SESSION['errors'] = "Invalid credentials.";
            header("Location:index.php");
            exit;
        }

        $_SESSION['auth_user'] = $user;
        if($user['role'] == 'admin'){
            header("Location:/admin/home.php");
        }
        else{
            header("Location:/admin/orders/index.php");
        }
    }
    else{
        $_SESSION['errors'] = "No user was found.";
        header("Location:index.php");
    }

?>