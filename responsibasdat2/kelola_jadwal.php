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
    <title>Kelola Tabel Jadwal Tayang</title>
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
    <h1 align="center">Kelola Tabel Jadwal Tayang</h1>
    <a href="kelola.php">
        &ensp;
        <div class="div btn btn-primary mb-2">
            Kembali
        </div>
    </a>
    <a>
        <div class="div btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
            Tambah Data
        </div>
    </a>
    <a href="kelola_pelanggan.php">
        <div class="div btn btn-primary mb-2">
            Selanjutnya
        </div>
    </a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0" align="center" style="font-size: x-large; max-width:1100px;">
        <tr style="background-color:plum; font-weight:bolder;" align="center">
            <td>ID Jadwal</td>
            <td>ID Film</td>
            <td>ID Studio</td>
            <td>Tanggal Tayang</td>
            <td>Jam Tayang</td>
            <td>Harga Tiket</td>
            <td>Jumlah Tiket Tersedia</td>
            <td style="width: 100px;">Opsi</td>
        </tr>
        <?php
        $listjadwal = mysqli_query($koneksi, "select * from jadwal_tayang");
        while ($data = mysqli_fetch_array($listjadwal)) {
            $idjadwal = $data['id_jadwal'];
            $idfilm = $data['id_film'];
            $idstudio = $data['id_studio'];
            $tanggaltayang = $data['tanggal_tayang'];
            $jamtayang = $data['jam_tayang'];
            $hargatiket = $data['harga_tiket'];
            $jumlahtiket = $data['jumlah_tiket_tersedia'];
        ?>
            <tr align="center">
                <td><?= $idjadwal; ?></td>
                <td><?= $idfilm; ?></td>
                <td><?= $idstudio; ?></td>
                <td><?= $tanggaltayang; ?></td>
                <td><?= $jamtayang; ?></td>
                <td><?= $hargatiket; ?></td>
                <td><?= $jumlahtiket; ?></td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editjadwal<?= $idjadwal; ?>">
                        Edit
                    </button> <br><br>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletejadwal<?= $idjadwal; ?>">
                        Hapus
                    </button>
                </td>
            </tr>
            <!-- Edit Modal -->
            <div class="modal fade" id="editjadwal<?= $idjadwal; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <form method="post">
                            <div class="modal-body">
                                <input type="text" name="idjadwal" value="<?= $idjadwal; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="idfilm" value="<?= $idfilm; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="idstudio" value="<?= $idstudio; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="tanggaltayang" value="<?= $tanggaltayang; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="jamtayang" value="<?= $jamtayang; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="hargatiket" value="<?= $hargatiket; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="jumlahtiket" value="<?= $jumlahtiket; ?>" class="form-control" required>
                                <br>
                                <input type="hidden" name="idjadwal" value="<?= $idjadwal; ?>">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="updatejadwal">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Delete Modal -->
            <div class="modal fade" id="deletejadwal<?= $idjadwal; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Hapus Data</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <form method="post">
                            <div class="modal-body">
                                Apakah Anda Yakin Ingin Menghapus ID Jadwal <?= $idjadwal ?>?
                                <br> <br>
                                <input type="hidden" name="idjadwal" value="<?= $idjadwal; ?>">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" name="hapusjadwal">Hapus</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        };
        ?>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <input type="text" name="idjadwal" placeholder="ID Jadwal" class="form-control" required>
                    <br>
                    <input type="text" name="idfilm" placeholder="ID Film" class="form-control" required>
                    <br>
                    <input type="text" name="idstudio" placeholder="ID Studio" class="form-control" required>
                    <br>
                    <input type="text" name="tanggaltayang" placeholder="Tanggal Tayang" class="form-control" required>
                    <br>
                    <input type="text" name="jamtayang" placeholder="Jam Tayang" class="form-control" required>
                    <br>
                    <input type="text" name="hargatiket" placeholder="Harga Tiket" class="form-control" required>
                    <br>
                    <input type="text" name="jumlahtiket" placeholder="Jumlah Tiket Tersedia" class="form-control" required>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submitjadwal">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br><br><br>

</html>