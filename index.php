<?php
    require 'functions.php';
    $mahasiswa = query("SELECT * FROM siswa_terdaftar");
        if(isset($_POST["cari"])){
            $mahasiswa = cari($_POST["keyword"]);
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar siswa</title>
</head>
<body>
    <h1>Data siswa yang telah terdaftar</h1>
    <form action="" method="POST">
    <table border = 1>
        <tr>
            <th><a href="insert.php">Insert</a></th>
        </tr>
    </table><br>
    <table border = 1>
    <form action="" method="POST">
    <table border = 1>
        <tr>
            <th>
                <input type="text" name="keyword" autofocus placeholder="cari nama...">
                <button type="submit" name="cari">Cari</button>
            </th>
        </tr>
    </table><br>
    <table border = 1>
        <thead>
            <tr>
                <th>ID</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Agama</th>
                <th>Email</th>
                <th>TTL</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1 ; ?>
        <?php foreach ($mahasiswa as $mhs) :?>
            <tr>
                <td><?= $i ;?></td>
                <td><?= $mhs ["nis"];?></td>
                <td><?= $mhs ["nama"];?></td>
                <td><?= $mhs ["agama"];?></td>
                <td><?= $mhs ["email"];?></td>
                <td><?= $mhs ["asal"];?></td>
                <td>
                <a href="edit.php?id=<?= $mhs ["id"] ; ?>">[Edit]</a>
                <a href="delete.php?id=<?= $mhs ["id"] ; ?>">[Delete]</a>
                </td>
            </tr>
            <?php $i++ ; ?>
        <?php endforeach ; ?>
        </tbody>
    </table>
    </form>
</body>
</html>