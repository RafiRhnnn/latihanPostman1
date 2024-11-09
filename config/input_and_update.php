<?php
require_once '../koneksi/koneksi.php';

$nama_depan = $_POST['ndepan'];
$nama_belakang = $_POST['nbelakang'];
$email = $_POST['mail'];
$username = $_POST['username'];
$password = $_POST['pwd'];
$photo_name = $_FILES['photo']['name'];
$photo_tmp = $_FILES['photo']['tmp_name'];

if (!empty($_POST['id'])) {
    // Kode update
    try {
        move_uploaded_file($photo_tmp, '../photo/' . $photo_name);
        $sql = 'UPDATE `mahasiswa` SET `nama_depan`=?, `nama_belakang`=?, `email`=?, `username`=?, `password`=?, `photo`=? WHERE `id` = ?';
        $qconnect = $database_connetion->prepare($sql);
        $qconnect->execute([$nama_depan, $nama_belakang, $email, $username, sha1($password), 'photo/' . $photo_name, $_POST['id']]);

        echo "Data updated successfully!";
    } catch (PDOException $err) {
        die("Error updating data = " . $err->getMessage());
    }
} else {
    // Kode insert
    try {
        move_uploaded_file($photo_tmp, '../photo/' . $photo_name);
        $sql = 'INSERT INTO `mahasiswa` (`nama_depan`, `nama_belakang`, `email`, `username`, `password`, `photo`) VALUES(?,?,?,?,?,?)';
        $qconnect = $database_connetion->prepare($sql);
        $qconnect->execute([$nama_depan, $nama_belakang, $email, $username, sha1($password), 'photo/' . $photo_name]);

        echo "Data inserted successfully!";
    } catch (PDOException $err) {
        die("Error inserting data: " . $err->getMessage());
    }
}
?>
