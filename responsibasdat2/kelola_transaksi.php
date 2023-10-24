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
    <title>Kelola Tabel Transaksi</title>
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
    <h1 align="center">Kelola Tabel Transaksi</h1>
    <a href="kelola_studio.php">
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
    <a href="homepage.php">
        <div class="div btn btn-primary mb-2">
            Home
        </div>
    </a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0" align="center" style="font-size: x-large; max-width:1100px;">
        <tr style="background-color:rosybrown; font-weight:bolder;" align="center">
            <td>ID Transaksi</td>
            <td>ID Film</td>
            <td>ID Jadwal</td>
            <td>ID Studio</td>
            <td>ID Pelanggan</td>
            <td>Jumlah Tiket</td>
            <td>Total Harga</td>
            <td>Waktu Pembelian</td>
            <td style="width: 100px;">Opsi</td>
        </tr>
        <?php
        $listtransaksi = mysqli_query($koneksi, "select * from transaksi_pembelian_tiket");
        while ($data = mysqli_fetch_array($listtransaksi)) {
            $idtransaksi = $data['id_transaksi'];
            $idfilm = $data['id_film'];
            $idjadwal = $data['id_jadwal'];
            $idstudio = $data['id_studio'];
            $idpelanggan = $data['id_pelanggan'];
            $jumlahtiket = $data['jumlah_tiket'];
            $totalharga = $data['total_harga'];
            $waktupembelian = $data['waktu_pembelian'];
        ?>
            <tr align="center">
                <td><?= $idtransaksi; ?></td>
                <td><?= $idfilm; ?></td>
                <td><?= $idjadwal; ?></td>
                <td><?= $idstudio; ?></td>
                <td><?= $idpelanggan; ?></td>
                <td><?= $jumlahtiket; ?></td>
                <td><?= $totalharga; ?></td>
                <td><?= $waktupembelian; ?></td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edittransaksi<?= $idtransaksi; ?>">
                        Edit
                    </button> <br><br>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletetransaksi<?= $idtransaksi; ?>">
                        Hapus
                    </button>
                </td>
            </tr>
            <!-- Edit Modal -->
            <div class="modal fade" id="edittransaksi<?= $idtransaksi; ?>">
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
                                <input type="text" name="idtransaksi" value="<?= $idtransaksi; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="idfilm" value="<?= $idfilm; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="idjadwal" value="<?= $idjadwal; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="idstudio" value="<?= $idstudio; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="idpelanggan" value="<?= $idpelanggan; ?>" class="form-control" required>
                                <br>
                                <input type="number" name="jumlahtiket" value="<?= $jumlahtiket; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="totalharga" value="<?= $totalharga; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="waktupembelian" value="<?= $waktupembelian; ?>" class="form-control" required>
                                <br>
                                <input type="hidden" name="idtransaksi" value="<?= $idtransaksi; ?>">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="updatetransaksi">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Delete Modal -->
            <div class="modal fade" id="deletetransaksi<?= $idtransaksi; ?>">
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
                                Apakah Anda Yakin Ingin Menghapus ID Transaksi <?= $idtransaksi ?>?
                                <br> <br>
                                <input type="hidden" name="idtransaksi" value="<?= $idtransaksi; ?>">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" name="hapustransaksi">Hapus</button>
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
                    <input type="text" name="idtransaksi" placeholder="ID Transaksi" class="form-control" required>
                    <br>
                    <input type="text" name="idfilm" placeholder="ID Film" class="form-control" required>
                    <br>
                    <input type="text" name="idjadwal" placeholder="ID Jadwal" class="form-control" required>
                    <br>
                    <input type="text" name="idstudio" placeholder="ID Studio" class="form-control" required>
                    <br>
                    <input type="text" name="idpelanggan" placeholder="ID Pelanggan" class="form-control" required>
                    <br>
                    <input type="number" name="jumlahtiket" placeholder="Jumlah Tiket Yang Dibeli" class="form-control" required>
                    <br>
                    <input type="text" name="totalharga" placeholder="Total Harga" class="form-control" required>
                    <br>
                    <input type="text" name="waktupembelian" placeholder="Waktu Pembelian" class="form-control" required>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submittransaksi">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br><br><br>

</html>