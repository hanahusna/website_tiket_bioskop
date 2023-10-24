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
    <title>Kelola Tabel Film</title>
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
    <h1 align="center">Kelola Tabel Film</h1>
    <a href="index.php">
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
    <a href="kelola_jadwal.php">
        <div class="div btn btn-primary mb-2">
            Selanjutnya
        </div>
    </a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0" align="center" style="font-size: x-large; max-width:1100px;">
        <tr style="background-color:burlywood; font-weight:bolder;" align="center">
            <td>ID Film</td>
            <td>Judul Film</td>
            <td>Sutradara</td>
            <td>Pemain Utama</td>
            <td>Genre</td>
            <td>Durasi</td>
            <td>Poster</td>
            <td style="width: 100px;">Opsi</td>
        </tr>
        <?php
        $listfilm = mysqli_query($koneksi, "select * from film");
        while ($data = mysqli_fetch_array($listfilm)) {
            $idfilm = $data['id_film'];
            $judulfilm = $data['judul_film'];
            $sutradara = $data['sutradara'];
            $pemainutama = $data['pemain_utama'];
            $genre = $data['genre'];
            $durasi = $data['durasi'];
            $poster = $data['poster'];
        ?>
            <tr align="center">
                <td><?= $idfilm; ?></td>
                <td><?= $judulfilm; ?></td>
                <td><?= $sutradara; ?></td>
                <td><?= $pemainutama; ?></td>
                <td><?= $genre; ?></td>
                <td><?= $durasi; ?></td>
                <td><img src="images/<?= $poster; ?>" width="200"></td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editfilm<?= $idfilm; ?>">
                        Edit
                    </button> <br><br>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletefilm<?= $idfilm; ?>">
                        Hapus
                    </button>
                </td>
            </tr>
            <!-- Edit Modal -->
            <div class="modal fade" id="editfilm<?= $idfilm; ?>">
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
                                <input type="text" name="idfilm" value="<?= $idfilm; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="judulfilm" value="<?= $judulfilm; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="sutradara" value="<?= $sutradara; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="pemainutama" value="<?= $pemainutama; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="genre" value="<?= $genre; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="durasi" value="<?= $durasi; ?>" class="form-control" required>
                                <br>
                                <input type="text" name="poster" value="<?= $poster; ?>" class="form-control" required>
                                <br>
                                <input type="hidden" name="idfilm" value="<?= $idfilm; ?>">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="updatefilm">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Delete Modal -->
            <div class="modal fade" id="deletefilm<?= $idfilm; ?>">
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
                                Apakah Anda Yakin Ingin Menghapus ID Film <?= $idfilm ?>?
                                <br> <br>
                                <input type="hidden" name="idfilm" value="<?= $idfilm; ?>">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" name="hapusfilm">Hapus</button>
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
                    <input type="text" name="idfilm" placeholder="ID Film" class="form-control" required>
                    <br>
                    <input type="text" name="judulfilm" placeholder="Judul Film" class="form-control" required>
                    <br>
                    <input type="text" name="sutradara" placeholder="Sutradara" class="form-control" required>
                    <br>
                    <input type="text" name="pemainutama" placeholder="Pemain Utama" class="form-control" required>
                    <br>
                    <input type="text" name="genre" placeholder="Genre" class="form-control" required>
                    <br>
                    <input type="text" name="durasi" placeholder="Durasi" class="form-control" required>
                    <br>
                    <input type="text" name="poster" placeholder="Poster" class="form-control" required>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submitfilm">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br><br><br>

</html>