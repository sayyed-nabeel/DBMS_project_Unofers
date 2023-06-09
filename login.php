<?php 
session_start(); 
include "db_conn.php";
if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    if (empty($email)) {
        header("Location: index.html?error=Email is required");
        exit();
    }else if(empty($password)){
        header("Location: index.html?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $password) {
                echo "Logged in!";
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.html");
                exit();
            }else{
                header("Location: index.html?error=Incorect email or password");
                echo "Incorrect email or password!!";
                exit();
            }
        }else{
            header("Location: index.html?error=Incorect email or password");
            echo "Incorrect email or password!!";
            exit();
        }
    }
}else{
    header("Location: index.html");
    exit();
}
