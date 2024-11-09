<?php
    require_once '../koneksi/koneksi.php';
    
    try {
        $sql = 'SELECT * FROM mahasiswa';
        $qconnect = $database_connetion->prepare($sql);
        $qconnect->execute();
    
        $data = array();
        while ($row = $qconnect->fetch(PDO::FETCH_ASSOC)) {
            array_push($data, $row);
        }
    //tes
        echo json_encode($data);
    } catch (PDOException $err) {
        die("Tidak dapat memuat database $database_name: " . $err->getMessage());
    }
    
?>