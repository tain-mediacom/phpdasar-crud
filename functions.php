<?php

// connection db
$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dbrpl";
$dbtabel = "data_rpl";

$db = mysqli_connect($host, $username, $password, $dbname);

// tampilkan data
function query() {
    // connection
    global $db;
    global $dbtabel;

    $query = "SELECT * FROM $dbtabel";

    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function queryById($id) {
    // connection
    global $db;
    global $dbtabel;

    $query = "SELECT * FROM $dbtabel WHERE id=$id";

    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// tambah data
function tambah($data) {
    // connection
    global $db;
    global $dbtabel;

    // ambil datanya
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $sekolah = htmlspecialchars($data["sekolah"]);
   
    $foto = uploadFoto();
    if (!$foto) {
        echo
        "
        <script>
            alert('Upload foto dahulu !');
        </script>
        ";
        return false;
    }

    // query data
    $query = "INSERT INTO $dbtabel VALUES('', '$nama', '$jurusan', '$sekolah', '$foto')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function uploadFoto() {
    $name = $_FILES["foto"]["name"];
    $size = $_FILES["foto"]["size"];
    $error = $_FILES["foto"]["error"];
    $tmp = $_FILES["foto"]["tmp_name"];

    // cek error
    if ($error === 4) {
         echo
        "
        <script>
            alert('Upload foto dahulu !');
        </script>
        ";
        return false;
    }

    // cek exktensi
    $valid = ["jpg", "png", "webp"];
    $eksFile = explode('.', $name);
    $eksFile = strtolower(end($eksFile));

    if (!in_array($eksFile, $valid)) {
         echo
        "
        <script>
            alert('Yang kamu upload bukan foto !');
        </script>
        ";
        return false;
    }

    // cek size
    if ($size > 2000000) {
         echo
        "
        <script>
            alert('Ukuran Foto terlalu besar. Max 2MB !');
        </script>
        ";
        return false;
    }

    $newName = uniqid();
    $newName .= '.';
    $newName .= $name;

    move_uploaded_file($tmp, 'img/' . $newName);
    return $newName;
}

// edit data
function edit($data) {
    // connection
    global $db;
    global $dbtabel;

    // ambil datanya
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $sekolah = htmlspecialchars($data["sekolah"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query
    $query = "UPDATE $dbtabel SET nama='$nama', jurusan='$jurusan', sekolah='$sekolah', gambar='$gambar' WHERE id=$id";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// hapus data
function hapus($id) {
    // connection
     global $db;
     global $dbtabel;

    //  query
     $query = "DELETE FROM $dbtabel WHERE id=$id";
     mysqli_query($db, $query);

      return mysqli_affected_rows($db);
}

?>