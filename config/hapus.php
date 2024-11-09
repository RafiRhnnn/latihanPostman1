<?php
require_once '../koneksi/koneksi.php';
$id = $_POST['id'];

try {
    $sql = 'DELETE FROM mahasiswa WHERE id = ?';
    $qconnect = $database_connetion->prepare($sql);
    $qconnect->execute([$id]);
    echo"data berhasil di hapus";
} catch (PDOException $err) {
    die("ini error gara gara: " . $err->getMessage());
}
?>
