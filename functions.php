<?php
    $link = mysqli_connect("localhost", "root", "", "daftar-siswa");
        function query($query){
            global $link;
            $result = mysqli_query($link, $query);
            $rows = [];
                while($row = mysqli_fetch_assoc($result)){
                    $rows[] = $row;
                }
                return $rows;
        }

        function insert($data){
            global $link;
            $nis = $data["nis"];
            $nama = $data["nama"];
            $agama = $data["agama"];
            $email = $data["email"];
            $asal = $data["asal"];
            $query = "INSERT INTO siswa_terdaftar VALUE('', '$nis', '$nama', '$agama', '$email', '$asal')";
                mysqli_query($link, $query);
                    return mysqli_affected_rows($link);
        }

        function edit($data){
            global $link;
            $id = $data["id"];
            $nis = $data["nis"];
            $nama = $data["nama"];
            $email = $data["email"];
            $asal = $data["asal"];
            $agama = $data["agama"];
            $query = "UPDATE siswa_terdaftar SET
                        nis = '$nis',
                        nama = '$nama',
                        agama = '$agama',
                        email = '$email',
                        asal = '$asal'
                        WHERE id = $id
                     ";
                     mysqli_query($link, $query);
                        return mysqli_affected_rows($link);
        }

        function delete($id){
            global $link;
            mysqli_query($link,"DELETE FROM siswa_terdaftar WHERE id=$id");
                return mysqli_affected_rows($link);
        }

        function cari($keyword){
            $query = "SELECT * FROM siswa_terdaftar WHERE
                        nis LIKE '%$keyword%' OR
                        nama like '%$keyword%' OR
                        asal LIKE '%$keyword%'
                     ";
                     return query($query);
        }
?>