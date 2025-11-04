<?php
    // koneksi
    require "functions.php";
    
    // simpan/create data
    if(isset($_POST["simpan"])) {

        // konfirmasi
        if(tambah($_POST) > 0){
           echo "
                 <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                 <script>
                    alert('Data gagal ditambahkan');
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
    <title>Tambah Data</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <div class="body">
        <div class="form">
                <h3>Tambah Data</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="nama">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="nama lengkap">
                    </div>
                    <div class="jurusan">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" id="jurusan" name="jurusan" placeholder="jurusan">
                    </div>
                    <div class="sekolah">
                        <label for="sekolah">Sekolah</label>
                        <input type="text" id="sekolah" name="sekolah" placeholder="asal sekolah">
                    </div>
                    <div class="foto">
                        <label for="foto">Foto</label>
                        <input type="file" id="foto" name="foto" placeholder="jhon.jpg">
                    </div>
                    <button type="submit" name="simpan">Simpan Data</button>
                </form>
            </div>
    </div>
    

</body>
</html>