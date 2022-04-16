<?php

require_once("config.php");
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $checkLogin = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($checkLogin) === 1) {
        $row = mysqli_fetch_assoc($checkLogin);
        if (password_verify($password, $row["password"])) {
            $qry = mysqli_fetch_array($checkLogin);
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            header("location:home.php");
        }
    }
    $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Pesbuk</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <p>&larr; <a href="main.php">Home</a>
                <h4>Masuk ke Pesbuk</h4>
                <p>Belum punya akun? <a href="signup.php">Daftar di sini</a></p>

                <?php if (isset($error)) :
                    echo "<p>Username / Password anda salah</p>";
                endif;
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username atau email" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" />
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" />
                </form>
            </div>
            <div class="col-md-6">
                <!-- isi dengan sesuatu di sini -->
            </div>
        </div>
    </div>

</body>

</html>