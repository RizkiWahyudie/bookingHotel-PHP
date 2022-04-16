<?php

require_once("config.php");
session_start();

if (isset($_POST['register'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($connect, $username);
    $name     = stripslashes($_POST['name']);
    $name     = mysqli_real_escape_string($connect, $name);
    $email    = stripslashes($_POST['email']);
    $email    = mysqli_real_escape_string($connect, $email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($connect, $password);
    $password2 = stripslashes($_POST['password2']);
    $password2 = mysqli_real_escape_string($connect, $password2);
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $checkUsername = mysqli_query($connect, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($checkUsername)) {
        echo "<sript>alert('username sudah ada')</sript>";
        return false;
    }

    //insert data ke database
    $query = "INSERT INTO users (username,name,email, password ) VALUES ('$username','$name','$email','$password')";
    $result = mysqli_query($connect, $query);
    
    // cek jika berhasil disimpan ke database maka akan dipindah halaman ke login.php
    if ($result) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        header('Location: login.php');
    } else {
        $error =  'Register User Gagal !!';
    }
    
    return mysqli_affected_rows($connect);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Pesbuk</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <p>&larr; <a href="index.php">Home</a>
                <h4>Bergabunglah bersama ribuan orang lainnya...</h4>
                <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input class="form-control" type="text" name="name" placeholder="Nama kamu" required />
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Alamat Email" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <label for="password2">Konfirmasi Password</label>
                        <input class="form-control" type="password" name="password2" placeholder="Password" required />
                    </div>
                    <input onclick="onChange()" type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />
                </form>
            </div>
            <div class="col-md-6">
                <img class="img img-responsive" src="img/connect.png" />
            </div>
        </div>
    </div>

    <script>
        function onChange() {
            const password = document.querySelector('input[name=password]');
            const confirm = document.querySelector('input[name=password2]');
            if (confirm.value === password.value) {
                confirm.setCustomValidity('');
            } else {
                confirm.setCustomValidity('Passwords do not match');
            }
        }
    </script>
</body>