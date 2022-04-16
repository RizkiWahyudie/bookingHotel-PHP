<?php
include("auth.php");

$data = mysqli_query($connect, "SELECT * FROM users WHERE username='$_SESSION[username]'");
$callback = mysqli_fetch_array($data);

if (isset($_POST['booking'])) {
    // AMBIL DATA DARI VALUE FORMULIR
    $hotel = $_POST['hotel'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $malam = $_POST['malam'];
    $guests = $_POST['guests'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $id_login = $callback['id_login'];

    // MEMBUAT QUERY
    $addData = "INSERT INTO `form_booking` (`hotel`, `name`, `phone`, `malam`, `guests`, `checkin`, `checkout`, `id_login`) 
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
?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
    <header>
        <h3>Formulir Pendaftaran Siswa Baru</h3>
    </header>

    <form action="" method="POST">
        <fieldset>
            <p>
                <label for="hotel">Hotel: </label>
                <input type="text" name="hotel" placeholder="Hotel" />
            </p>
            <p>
                <label for="name">Name: </label>
                <input type="text" name="name" placeholder="Nama"></input>
            </p>
            <p>
                <label for="phone">No Whatsapp: </label>
                <input type="text" name="phone" placeholder="Nomor Telepon"></input>
            </p>
            <p>
                <label for="malam">room type: </label>
                <select name="malam">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </p>
            <p>
                <label for="guests">Guests: </label>
                <select name="guests">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </p>
            <p>
                <label for="checkin">Checkin: </label>
                <input type="date" name="checkin"></input>
            </p>
            <p>
                <label for="checkout">Checkout: </label>
                <input type="date" name="checkout" placeholder="Nomor Telepon"></input>
            </p>
            <p>
                <input type="submit" value="booking" name="booking" />
            </p>
        </fieldset>
    </form>
</body>

</html>