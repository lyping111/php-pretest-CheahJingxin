<?php
        session_start();
        include "db.php";

        $message = "";

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

    if(password_verify($password,$row['password'])){

        $_SESSION['username'] = $row['username'];
        header("Location: dashboard.php");

    }else{
        $message = "Wrong Password!";
    }

    }else{
        $message = "User Not Found!";
    }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>

        <h2>Login</h2>

    <form method="POST">

        <input type="text" name="username" placeholder="Username" required><br><br>

        <input type="password" name="password" placeholder="Password" required><br><br>

        <button type="submit" name="login">Login</button>

    </form>

        <p><?php echo $message; ?></p>

        <a href="register.php">Create Account</a>

    </body>
</html>