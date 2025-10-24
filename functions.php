<?php

// koneksi db
$db = mysqli_connect("localhost", "root", "", "dbrpl");

// tampilkan data
function query($data) {
    global $db;
    $result = mysqli_query($db, $data);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// tambah data
function tambah($data) {
    global $db;

    // ambil datanya
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $sekolah = htmlspecialchars($data["sekolah"]);
    $foto = htmlspecialchars($data["foto"]);
    // query data
    $query = "INSERT INTO data_rpl VALUES('', '$nama', '$jurusan', '$sekolah', '$foto')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// edit data
function edit($data) {
    global $db;

    // ambil datanya
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $sekolah = htmlspecialchars($data["sekolah"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE data_rpl SET nama='$nama', jurusan='$jurusan', sekolah='$sekolah', gambar='$gambar' WHERE id=$id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// hapus data
function hapus($id) {
     global $db;

     $query = "DELETE FROM data_rpl WHERE id=$id";
     mysqli_query($db, $query);

      return mysqli_affected_rows($db);
}

?>