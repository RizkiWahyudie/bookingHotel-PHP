<?php
include("auth.php");
$data = mysqli_query($connect, "SELECT * FROM users WHERE username='$_SESSION[username]'");
$callback = mysqli_fetch_array($data);

if (isset($_POST['booking'])) {
    // AMBIL DATA DARI VALUE FORMULIR
    $hotel = $_POST['hotel'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $room_type = $_POST['room_type'];
    $guests = $_POST['guests'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $id_login = $_POST['id_login'];

    // MEMBUAT QUERY
    $addData = "INSERT INTO `form_booking` (`id`, `hotel`, `name`, `phone`, `room_type`, `guests`, `checkin`, `checkout`, `id_login`) 
    VALUE (NULL, '$hotel', $name', '$phone', '$room_type', '$guests', '$checkin', '$checkout', '$id_login')";
    $query = mysqli_query($connect, $addData);

    // CEK QUERY APAKAH BERHASIL DISIMPAN APA TIDAK
    if ($query) {
        header('Location: result_booking.php?status=sukses');
    } else {
        header('Location: result_booking.php?status=gagal');
    }
} else {
    echo "<p>Gagal ngab</p>";
}
