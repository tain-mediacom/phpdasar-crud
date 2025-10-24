<?php
    // koneksi
    require "functions.php";

    $id = $_GET["id"];
    $dataSiswa = query("SELECT * FROM data_rpl WHERE id=$id")[0];

    
    // edit data
    if(isset($_POST["edit"])) {

        // konfirmasi
        if(edit($_POST) > 0){
           echo "
                 <script>
                    alert('Data berhasil diubah !');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                 <script>
                    alert('Data gagal diubah !');
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
    <title>Edit Data</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <div class="body">
        <div class="form">
                <h3>Edit Data</h1>
                <form action="" method="post">

                    <input type="hidden" name="id" value="<?= $dataSiswa["id"]; ?>">
                    
                    <div class="nama">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" required value="<?= $dataSiswa["nama"]; ?>">
                    </div>
                    <div class="jurusan">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" id="jurusan" name="jurusan" required value="<?= $dataSiswa["jurusan"]; ?>">
                    </div>
                    <div class="sekolah">
                        <label for="sekolah">Sekolah</label>
                        <input type="text" id="sekolah" name="sekolah" required value="<?= $dataSiswa["sekolah"]; ?>">
                    </div>
                    <div class="foto">
                        <label for="foto">Foto</label>
                        <input type="text" id="foto" name="foto" required value="<?= $dataSiswa["gambar"]; ?>">
                    </div>
                    <button type="submit" name="edit">Edit Data</button>
                </form>
            </div>
    </div>
    

</body>
</html>