<?php 
include("auth.php");
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Tutorial Membuat CRUD Native PHP dengan PDO MySQL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br />
                <a href="form_booking.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
                <table class="table table-hover table-bordered" style="margin-top: 10px">
                    <tr class="success">
                        <th width="50px">No</th>
                        <th>id</th>
                        <th>Username</th>
                        <th>Hotel</th>
                        <th>Nama</th>
                        <th>No. HP</th>
                        <th>Tipe Kamar</th>
                        <th>Tamu</th>
                        <th>Checkin</th>
                        <th>Checkout</th>
                        <th>Email</th>
                    </tr>
                    <?php
                    $data = mysqli_query($connect, "SELECT * FROM users, form_booking WHERE form_booking.id_login=users.id_login AND users.username='$_SESSION[username]'");
                    $a = 1;
                    while ($callback = mysqli_fetch_array($data)) {
                        echo "<tr>";
                        echo "<td>" . $a . "</td>";
                        echo "<td>" . $callback['id_login'] . "</td>";
                        echo "<td>" . $callback['username'] . "</td>";
                        echo "<td>" . $callback['hotel'] . "</td>";
                        echo "<td>" . $callback['name'] . "</td>";
                        echo "<td>" . $callback['phone'] . "</td>";
                        echo "<td>" . $callback['room_type'] . "</td>";
                        echo "<td>" . $callback['guests'] . "</td>";
                        echo "<td>" . $callback['checkin'] . "</td>";
                        echo "<td>" . $callback['checkout'] . "</td>";
                        echo "<td>" . $callback['email'] . "</td>";
                        echo "</tr>";
                    }
                    $a++;
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>