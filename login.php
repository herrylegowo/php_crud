<?php
    session_start();
    require 'functions.php';
        if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
            $id = $_COOKIE['id'];
            $key = $_COOKIE['key'];
            $result = mysqli_query($link, "SELECT username FROM user WHERE id = $id");
            $row = mysqli_fetch_assoc($result);
                if($key === hash('sha256', $row['username'])){
                    $_SESSION["login"] = true;
                }
        }
        if(isset($_SESSION["login"])){
            header("location: index.php");
            exit;
        }

        if(isset($_POST["login"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $result = mysqli_query($link, "SELECT * FROM user WHERE username = '$username'");
                if(mysqli_num_rows($result) === 1 ){
                    $row = mysqli_fetch_assoc($result);
                    if(password_verify($password, $row["password"])){
                        $_SESSION["login"] = true;
                        if(isset($_POST["remember"])){
                            setcookie('id', $row['id'], time()+120);
                            setcookie('key', hash('sha256', $row['username']), time()+120);
                        }
                        header("location: index.php");
                        exit;
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
    <title>Halaman login</title>
</head>
<body>
    <h1>Halaman login</h1>
    <?php if(isset($error)) : ?>
    <p>Username dan password salah</p>
    <?php endif; ?>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username...">
            </li>
        </ul>
        <ul>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password...">
            </li>
        </ul>
        <ul>
            <li>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
            </li>
        </ul>
        <ul>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>