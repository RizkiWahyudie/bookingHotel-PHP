<?php
include("auth.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM booking WHERE id=$id";
    $query = mysqli_query($connect, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: formBooking.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}
