<?php
require 'function.php';
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

<head>
    <title>View Daftar Jadwal Tayang</title>
    <style>
        body,
        html {
            background-color: lightgray;
            font-family: "Inconsolata", sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
<br>
    <h1 align="center">View Daftar Jadwal Tayang</h1>
    <a href="homepage.php">
        &ensp;
        <div class="div btn btn-primary mb-2">
            Kembali
        </div>
    </a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0" align="center" style="font-size: x-large; max-width:1100px;">
        <tr style="background-color:burlywood; font-weight:bolder;" align="center">
            <td>ID Jadwal</td>
            <td>Judul Film</td>
            <td>Tanggal Tayang</td>
            <td>Jam Tayang</td>
            <td>Nama Studio</td>
            <td>Tipe Studio</td>
            <td>Harga Tiket</td>
        </tr>
        <?php
        $listviewdaftar = mysqli_query($koneksi, "select * from daftar_jadwal_tayang");
        while ($data = mysqli_fetch_array($listviewdaftar)) {
            $idjadwal = $data['id_jadwal'];
            $judulfilm = $data['judul_film'];
            $tanggaltayang = $data['tanggal_tayang'];
            $jamtayang = $data['jam_tayang'];
            $namastudio = $data['nama_studio'];
            $tipestudio = $data['tipe_studio'];
            $hargatiket = $data['harga_tiket'];
        ?>
            <tr align="center">
                <td><?= $idjadwal; ?></td>
                <td><?= $judulfilm; ?></td>
                <td><?= $tanggaltayang; ?></td>
                <td><?= $jamtayang; ?></td>
                <td><?= $namastudio; ?></td>
                <td><?= $tipestudio; ?></td>
                <td><?= $hargatiket; ?></td>
            </tr>
        <?php
        };
        ?>
    </table>
</body>
<br><br><br>

</html>