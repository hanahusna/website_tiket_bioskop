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
    <title>Kelola Tabel Studio</title>
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
    <h1 align="center">Kelola Tabel Studio</h1>
    <a href="kelola_pelanggan.php">
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
    <a href="kelola_transaksi.php">
        <div class="div btn btn-primary mb-2">
            Selanjutnya
        </div>
    </a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0" align="center" style="font-size: x-large; max-width:1100px;">
        <tr style="background-color:lightcoral; font-weight:bolder;" align="center">
            <td>ID Studio</td>
            <td>Nama Studio</td>
            <td>Kapasitas Studio</td>
            <td>Tipe Studio</td>
            <td style="width: 100px;">Opsi</td>
        </tr>
        <?php
        $liststudio = mysqli_query($koneksi, "select * from studio");
        while ($data = mysqli_fetch_array($liststudio)) {
            $idstudio = $data['id_studio'];
            $namastudio = $data['nama_studio'];
            $kapasitasstudio = $data['kapasitas_studio'];
            $tipestudio = $data['tipe_studio'];
        ?>
            <tr align="center">
                <td><?= $idstudio; ?></td>
                <td><?= $namastudio; ?></td>
                <td><?= $kapasitasstudio; ?></td>
                <td><?= $tipestudio; ?></td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editstudio<?= $idstudio; ?>">
                        Edit
                    </button> <br><br>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletestudio<?= $idstudio; ?>">
                        Hapus
                    </button>
                </td>
            </tr>
            <!-- Edit Modal -->
            <div class="modal fade" id="editstudio<?= $idstudio; ?>">
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
                                <input type="text" name="idstudio" value="<?= $idstudio; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="namastudio" value="<?= $namastudio; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="kapasitasstudio" value="<?= $kapasitasstudio; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="tipestudio" value="<?= $tipestudio; ?>" class="form-control" required>
                                <br>
                                <input type="hidden" name="idstudio" value="<?= $idstudio; ?>">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="updatestudio">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Delete Modal -->
            <div class="modal fade" id="deletestudio<?= $idstudio; ?>">
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
                                Apakah Anda Yakin Ingin Menghapus ID Studio <?= $idstudio ?>?
                                <br> <br>
                                <input type="hidden" name="idstudio" value="<?= $idstudio; ?>">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" name="hapusstudio">Hapus</button>
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
                    <input type="text" name="idstudio" placeholder="ID Studio" class="form-control" required>
                    <br>
                    <input type="text" name="namastudio" placeholder="Nama Studio" class="form-control" required>
                    <br>
                    <input type="text" name="kapasitasstudio" placeholder="Kapasitas Studio" class="form-control" required>
                    <br>
                    <input type="text" name="tipestudio" placeholder="Tipe Studio" class="form-control" required>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submitstudio">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br><br><br>

</html>