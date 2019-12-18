<?php
    require 'functions.php';

    $id = $_GET["id"];
    $mhs = query("SELECT * FROM siswa_terdaftar WHERE id = $id")[0];

    if(isset($_POST["submit"])){
        if(edit($_POST) > 0 ){
            echo "
                    <script>
                        alert ('Data berhasil diubah');
                        document.location.href = 'index.php';
                    </script>
                ";
        }else{
            echo "
                    <script>
                        alert ('Data gagal diubah');
                        document,location.href = 'index.php';
                    </script>
                ";
        }
            
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit data mahasiswa</title>
</head>
<body>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $mhs["id"] ; ?>">
        <h1>Edit data siswa</h1>
        <label for="nis">NIS</label>
            <input type="text" name=nis id="nis" value="<?= $mhs["nis"] ; ?>"><br>
        <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="<?= $mhs["nama"] ; ?>"><br>
        <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?= $mhs["email"] ; ?>"><br>
        <label for="asal">Asal</label>
            <input type="text" name="asal" id="asal" value="<?= $mhs["asal"] ; ?>"><br>
        <label for="agama">Agama</label>
            <select name="agama">
                <option disabled selected>Pilih agama</option>
                <option>Islam</option>
                <option>Kristen</option>
                <option>Khatolik</option>
                <option>Hindu</option>
                <option>Budha</option>
            </select><br>
                <button type="submit" name="submit">Edit data</button>
    </form>
</body>
</html>