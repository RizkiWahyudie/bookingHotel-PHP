<?php
include("auth.php");
if (isset($_POST['book'])) {
    $data = mysqli_query($connect, "SELECT * FROM users WHERE username='$_SESSION[username]'");
    $callback = mysqli_fetch_array($data);
    // AMBIL DATA DARI VALUE FORMULIR
    $hotel = $_POST['hotel'];
    $nama = $_POST['nama'];
    $phone = $_POST['phone'];
    $jml_malam = $_POST['jml_malam'];
    $tamu = $_POST['tamu'];
    $checkin = $_POST['arrived'];
    $checkout = $_POST['departure'];
    $id_login = $callback['id_login'];

    // MEMBUAT QUERY
    $addData = "INSERT INTO `booking` (`id`, `hotel`, `nama`, `phone`, `jml_malam`, `tamu`, `arrived`, `departure`, `id_login`) 
    VALUES (NULL, '$hotel', '$nama', '$phone', '$jml_malam', '$tamu', '$checkin', '$checkout', '$id_login');";
    $query = mysqli_query($connect, $addData);

    // CEK QUERY APAKAH BERHASIL DISIMPAN APA TIDAK
    if ($query) {
        header('Location: formBooking.php?status=sukses');
    } else {
        header('Location: formBooking.php?status=gagal');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <fieldset>
            <p>
                <label for="hotel">Hotel: </label>
                <input type="text" name="hotel" placeholder="Hotel" />
            </p>
            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="Nama"></input>
            </p>
            <p>
                <label for="phone">Phone: </label>
                <input type="text" name="phone" placeholder="Nomor Telepon"></input>
            </p>
            <p>
                <label for="jml_malam">Jumlah malam: </label>
                <input type="text" name="jml_malam" placeholder="Jumlah Malam"></input>
            </p>
            <p>
                <label for="tamu">Tamu: </label>
                <input type="text" name="tamu" placeholder="Tamu"></input>
            </p>
            <p>
                <label for="arrived">Checkin: </label>
                <input type="date" name="arrived"></input>
            </p>
            <p>
                <label for="departure">Checkout: </label>
                <input type="date" name="departure"></input>
            </p>
            <p>
                <input type="submit" value="booking" name="book" />
            </p>
        </fieldset>
    </form>
    <table class="table table-hover table-bordered" style="margin-top: 10px">
        <tr class="success">
            <th width="50px">No</th>
            <th>Hotel</th>
            <th>Nama</th>
            <th>Phone</th>
            <th>Jumlah Malam</th>
            <th>Tamu</th>
            <th>Arrived</th>
            <th>Departure</th>
            <th>ID_Login</th>
        </tr>
        <?php
        $data = mysqli_query($connect, "SELECT * FROM users, booking WHERE booking.id_login=users.id_login AND users.username='$_SESSION[username]'");
        $a = 1;
        while ($result = mysqli_fetch_array($data)) {
            echo "<tr>";
            echo "<td>" . $a . "</td>";
            echo "<td>" . $result['hotel'] . "</td>";
            echo "<td>" . $result['nama'] . "</td>";
            echo "<td>" . $result['phone'] . "</td>";
            echo "<td>" . $result['jml_malam'] . "</td>";
            echo "<td>" . $result['tamu'] . "</td>";
            echo "<td>" . $result['arrived'] . "</td>";
            echo "<td>" . $result['departure'] . "</td>";
            echo "<td>" . $result['id_login'] . "</td>";
            echo "<td><a href='formBooking_delete.php?id=" . $result['id'] . "'>Delete</a></a></a></td>";
            echo "<td><a href='formBooking_edit.php?id=" . $result['id'] . "'>Edit</a></a></a></td>";
            echo "</tr>";
            $a++;
        }
        ?>
    </table>
</body>

</html>