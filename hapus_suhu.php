<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET id dari URL
if (isset($_GET['id_suhu'])) {
    //membuat variabel $id yang menyimpan nilai dari $_GET['id']
    $id_suhu = $_GET['id_suhu'];

    //melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
    $cek = mysqli_query($conn, "SELECT * FROM suhu WHERE id_suhu='$id_suhu'") or die(mysqli_error($conn));

    //jika query menghasilkan nilai > 0 maka eksekusi script di bawah
    if (mysqli_num_rows($cek) > 0) {
        //query ke database DELETE untuk menghapus data dengan kondisi id=$id
        $del = mysqli_query($conn, "DELETE FROM suhu WHERE id_suhu='$id_suhu'") or die(mysqli_error($conn));
        if ($del) {
            echo '<script>alert("Berhasil menghapus data."); document.location="suhu.php";</script>';
        } else {
            echo '<script>alert("Gagal menghapus data."); document.location="suhu.php";</script>';
        }
    } else {
        echo '<script>alert("ID tidak ditemukan di database."); document.location="suhu.php";</script>';
    }
} else {
    echo '<script>alert("ID tidak ditemukan di database."); document.location="suhu.php";</script>';
}
