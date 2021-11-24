<?php
include 'config.php';

global $conn;

if (isset($_POST['edit'])) {
    $id_suhu = $_POST['id_suhu'];
    $waktu_suhu = $_POST['waktu_suhu'];
    $suhu_terakhir = $_POST['suhu_terakhir'];

    $query = "UPDATE suhu SET suhu_terakhir = '$suhu_terakhir', waktu_suhu = '$waktu_suhu' WHERE id_suhu = '$id_suhu'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query gagal dijalankan." . mysqli_errno($conn) . " - " . mysqli_error($conn));
    } else {
        echo "<script>
            alert('Data Berhasil Ditambah !');
            window.location.href='index.php';
        </script>";
    }
}
