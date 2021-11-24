<?php
include 'config.php';

global $conn;

if (isset($_POST['edit'])) {
    $id_ph = $_POST['id_ph'];
    $waktu_ph = $_POST['waktu_ph'];
    $ph_terakhir = $_POST['ph_terakhir'];

    $query = "UPDATE ph SET ph_terakhir = '$ph_terakhir', waktu_ph = '$waktu_ph' WHERE id_ph = '$id_ph'";
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
