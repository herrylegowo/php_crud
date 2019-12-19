<?php
    require 'functions.php';
        if(isset($_POST["regist"])){
            if(regist($_POST) > 0){
                echo "
                        <script>
                            alert ('User baru berhasil ditambahkan');
                        </script>
                     ";
            }else{
                echo mysqli_error($link);
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman registrasi</title>
</head>
<body>
<h1>Halaman registrasi</h1>
<form action="" method="POST">
    <ul>
        <li>
            <label for="username">Username</label><br>
            <input type="text" name="username" id="username" placeholder="Masukan nama...">
        </li>
    </ul>
    <ul>
        <li>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" placeholder="Masukan password...">
        </li>
    </ul>
    <ul>
        <li>
            <label for="password2">Konfirmasi password</label><br>
            <input type="password" name="password2" id="password2" placeholder="Konfirmasi password...">
        </li>
    </ul>
    <ul>
        <li>
            <button type="submit" name="regist">Regist</button>
        </li>
    </ul>
</form>
</body>
</html>