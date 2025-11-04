<?php

require "functions.php";

$dataSiswa = query();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
   <link rel="stylesheet" href="crud.css">
</head>
<body>
    <h1>Data Siswa</h1>

    <a href="tambah.php">Tambah Data</a>

    <table border="1" cellpadding="12" cellspacing="0">
        <tr class="bgth">
            <th>No</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Sekolah</th>
            <th>Foto</th>
            <th>Action</th>
        </tr>
        <?php $x=1; ?>
        <?php foreach($dataSiswa as $data) : ?>
        <tr>
            <td><?= $x++; ?>.</td>
            <td><?= $data["nama"]; ?></td>
            <td><?= $data["jurusan"]; ?></td>
            <td><?= $data["sekolah"]; ?></th>
            <td><?= $data["gambar"]; ?></th>
            <td><a href="edit.php?id=<?= $data["id"]; ?>">Edit</a> | <a onclick="return confirm('Yakin Hapus Data !')" href="hapus.php?id=<?= $data["id"]; ?>" style="background-color: red;">Hapus</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>