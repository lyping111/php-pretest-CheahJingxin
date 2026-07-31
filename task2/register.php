<?php
$conn = mysqli_connect("localhost", "root", "", "parcelms");

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password)
            VALUES ('$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }}

    include "db.php";

    $message = "";

    if(isset($_POST['register'])){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(username,email,password)
            VALUES('$username','$email','$password')";

    if($conn->query($sql)){
        $message = "Registration Successful!";
    }else{
        $message = "Error: ".$conn->error;
    }
}
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Register</title>
        </head>
    <body>

        <h2>Register</h2>

        <form method="POST">

        <input type="text" name="username" placeholder="Username" required><br><br>

        <input type="email" name="email" placeholder="Email" required><br><br>

        <input type="password" name="password" placeholder="Password" required><br><br>

        <button type="submit" name="register">Register</button>

    </form>

        <p><?php echo $message; ?></p>

        <a href="login.php">Login Here</a>

    </body>
    </html>
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Register</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit" name="register">Register</button>
</form>
</body>
</html>