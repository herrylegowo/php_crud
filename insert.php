<?php
    require 'functions.php';
    if(isset($_POST["submit"])){
        if(insert($_POST) > 0 ){
            echo "
                    <script>
                        alert ('Data berhasil ditabahkan');
                        document.location.href = 'index.php';
                    </script>
                ";
        }else{
            echo "
                    <script>
                        alert ('Data gagal ditambahkan');
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
    <title>Menambahkan data mahasiswa</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Masukkan data anda</h1>
        <label for="nis">NIS</label>
            <input type="text" name=nis id="nis"><br>
        <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama"><br>
        <label for="email">Email</label>
            <input type="text" name="email" id="email"><br>
        <label for="asal">Asal</label>
            <input type="text" name="asal" id="asal"><br>
        <label for="agama">Agama</label>
            <select name="agama">
                <option disabled selected>Pilih agama</option>
                <option>Islam</option>
                <option>Kristen</option>
                <option>Khatolik</option>
                <option>Hindu</option>
                <option>Budha</option>
            </select><br>
                <button type="submit" name="submit">Submit</button>
    </form>

</body>
</html>