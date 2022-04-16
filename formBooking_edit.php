<?php
include("auth.php");

if (!isset($_GET['id'])) {
    header('location: formBooking.php');
}

// ambil id dari query string
$id = $_GET['id'];

// buat query hapus
$sql = "SELECT * FROM booking WHERE id=$id";
$query = mysqli_query($connect, $sql);
$book = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

if (isset($_POST['book'])) {
    // AMBIL DATA DARI VALUE FORMULIR
    $hotel = $_POST['hotel'];
    $nama = $_POST['nama'];
    $phone = $_POST['phone'];
    $jml_malam = $_POST['jml_malam'];
    $tamu = $_POST['tamu'];
    $checkin = $_POST['arrived'];
    $checkout = $_POST['departure'];

    // MEMBUAT QUERY
    $addData = "UPDATE booking SET hotel='$hotel', nama='$nama', phone='$phone', jml_malam='$jml_malam', tamu='$tamu', arrived='$checkin' , departure='$checkout' WHERE id=$id";
    $query = mysqli_query($connect, $addData);

    // CEK QUERY APAKAH BERHASIL DISIMPAN APA TIDAK
    if ($query) {
        header('Location: formBooking.php?status=sukses');
    } else {
        die('Gagal disimpan');
    }
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
                <input type="text" name="hotel" placeholder="Hotel" value="<?php echo $book['hotel'] ?>" />
            </p>
            <p>
                <label for="name">Nama: </label>
                <input type="text" name="nama" placeholder="Nama" value="<?php echo $book['nama'] ?>"></input>
            </p>
            <p>
                <label for="phone">Phone: </label>
                <input type="text" name="phone" placeholder="Nomor Telepon" value="<?php echo $book['phone'] ?>"></input>
            </p>
            <p>
                <label for="jml_malam">Jumlah malam: </label>
                <input type="text" name="jml_malam" placeholder="Jumlah Malam" value="<?php echo $book['jml_malam'] ?>"></input>
            </p>
            <p>
                <label for="tamu">Tamu: </label>
                <input type="text" name="tamu" placeholder="Tamu" value="<?php echo $book['tamu'] ?>"></input>
            </p>
            <p>
                <label for="arrived">Checkin: </label>
                <input type="date" name="arrived" value="<?php echo $book['arrived'] ?>"></input>
            </p>
            <p>
                <label for="departure">Checkout: </label>
                <input type="date" name="departure" value="<?php echo $book['departure'] ?>"></input>
            </p>
            <p>
                <input type="submit" value="booking" name="book" />
            </p>
        </fieldset>
    </form>
</body>

</html>