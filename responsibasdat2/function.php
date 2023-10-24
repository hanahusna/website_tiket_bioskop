<?php
    session_start();
    //Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "tiket_bioskop"); 
    
    //input film
    if(isset($_POST['submitfilm'])){
        $idfilm = $_POST['idfilm'];
        $judulfilm = $_POST['judulfilm'];
        $sutradara = $_POST['sutradara'];
        $pemainutama = $_POST['pemainutama'];
        $genre = $_POST['genre'];
        $durasi = $_POST['durasi'];
        $poster = $_POST['poster'];

        $insertfilm = mysqli_query($koneksi, "call insert_film('$idfilm', '$judulfilm', '$sutradara', '$pemainutama', '$genre', '$durasi', '$poster')");

        if($insertfilm){
            echo"
                <script>
                    alert('Data Berhasil Ditambahkan!');    
                </script>
            ";
        }
    }
    
    //input jadwal tayang
    if(isset($_POST['submitjadwal'])){
        $idjadwal = $_POST['idjadwal'];
        $idfilm = $_POST['idfilm'];
        $idstudio = $_POST['idstudio'];
        $tanggaltayang = $_POST['tanggaltayang'];
        $jamtayang = $_POST['jamtayang'];
        $hargatiket = $_POST['hargatiket'];
        $jumlahtiket = $_POST['jumlahtiket'];

        $insertjadwal = mysqli_query($koneksi, "call insert_jadwal_tayang('$idjadwal', '$idfilm', '$idstudio', '$tanggaltayang', '$jamtayang', '$hargatiket', '$jumlahtiket')");
        
        if($insertjadwal){
            echo"
                <script>
                    alert('Data Berhasil Ditambahkan!');    
                </script>
            ";
        }
    }
    
    //input pelanggan
    if(isset($_POST['submitpelanggan'])){
        $idpelanggan = $_POST['idpelanggan'];
        $namapelanggan = $_POST['namapelanggan'];
        $nomortelepon = $_POST['nomortelepon'];
        $alamatemail = $_POST['alamatemail'];
        
        $insertpelanggan = mysqli_query($koneksi, "call insert_pelanggan('$idpelanggan', '$namapelanggan', '$nomortelepon', '$alamatemail')");

        if($insertpelanggan){
            echo"
                <script>
                    alert('Data Berhasil Ditambahkan!');    
                </script>
            ";
        }
    }

    //input studio
    if(isset($_POST['submitstudio'])){
        $idstudio = $_POST['idstudio'];
        $namastudio = $_POST['namastudio'];
        $kapasitasstudio = $_POST['kapasitasstudio'];
        $tipestudio = $_POST['tipestudio'];
        
        $insertstudio = mysqli_query($koneksi, "call insert_studio('$idstudio', '$namastudio', '$kapasitasstudio', '$tipestudio')");
    
        if($insertstudio){
            echo"
                <script>
                    alert('Data Berhasil Ditambahkan!');    
                </script>
            ";
        }
    }

    //input transaksi pembelian tiket
    if(isset($_POST['submittransaksi'])){
        $idtransaksi = $_POST['idtransaksi'];
        $idfilm = $_POST['idfilm'];
        $idjadwal = $_POST['idjadwal'];
        $idstudio = $_POST['idstudio'];
        $idpelanggan = $_POST['idpelanggan'];
        $jumlahtiket = $_POST['jumlahtiket'];
        $totalharga = $_POST['totalharga'];
        $waktupembelian = $_POST['waktupembelian'];

        $inserttransaksi = mysqli_query($koneksi, "call insert_transaksi_pembelian_tiket('$idtransaksi', '$idfilm', '$idjadwal', '$idstudio', '$idpelanggan', '$jumlahtiket', '$totalharga', '$waktupembelian')");

        if($inserttransaksi){
            echo"
                <script>
                    alert('Data Berhasil Ditambahkan!');    
                </script>
            ";
        }
    }

    //edit film
    if(isset($_POST['updatefilm'])){
        $idfilm = $_POST['idfilm'];
        $judulfilm = $_POST['judulfilm'];
        $sutradara = $_POST['sutradara'];
        $pemainutama = $_POST['pemainutama'];
        $genre = $_POST['genre'];
        $durasi = $_POST['durasi'];
        $poster = $_POST['poster'];

        $editfilm = mysqli_query($koneksi, "call update_film('$idfilm', '$judulfilm', '$sutradara', '$pemainutama', '$genre', '$durasi', '$poster')");

        if($editfilm){
            echo"
                <script>
                    alert('Data Berhasil Diubah!');    
                </script>
            ";
        }
    }

    //edit jadwal tayang
    if(isset($_POST['updatejadwal'])){
        $idjadwal = $_POST['idjadwal'];
        $idfilm = $_POST['idfilm'];
        $idstudio = $_POST['idstudio'];
        $tanggaltayang = $_POST['tanggaltayang'];
        $jamtayang = $_POST['jamtayang'];
        $hargatiket = $_POST['hargatiket'];
        $jumlahtiket = $_POST['jumlahtiket'];

        $editjadwal = mysqli_query($koneksi, "call update_jadwal_tayang('$idjadwal', '$idfilm', '$idstudio', '$tanggaltayang', '$jamtayang', '$hargatiket', '$jumlahtiket')");
        
        if($editjadwal){
            echo"
                <script>
                    alert('Data Berhasil Diubah!');    
                </script>
            ";
        }
    }

    //edit pelanggan
    if(isset($_POST['updatepelanggan'])){
        $idpelanggan = $_POST['idpelanggan'];
        $namapelanggan = $_POST['namapelanggan'];
        $nomortelepon = $_POST['nomortelepon'];
        $alamatemail = $_POST['alamatemail'];
        
        $editpelanggan = mysqli_query($koneksi, "call update_pelanggan('$idpelanggan', '$namapelanggan', '$nomortelepon', '$alamatemail')");

        if($editpelanggan){
            echo"
                <script>
                    alert('Data Berhasil Diubah!');    
                </script>
            ";
        }
    }

    //edit studio
    if(isset($_POST['updatestudio'])){
        $idstudio = $_POST['idstudio'];
        $namastudio = $_POST['namastudio'];
        $kapasitasstudio = $_POST['kapasitasstudio'];
        $tipestudio = $_POST['tipestudio'];
        
        $editstudio = mysqli_query($koneksi, "call update_studio('$idstudio', '$namastudio', '$kapasitasstudio', '$tipestudio')");
    
        if($editstudio){
            echo"
                <script>
                    alert('Data Berhasil Diubah!');    
                </script>
            ";
        }
    }

    //edit transaksi pembelian tiket
    if(isset($_POST['updatetransaksi'])){
        $idtransaksi = $_POST['idtransaksi'];
        $idfilm = $_POST['idfilm'];
        $idjadwal = $_POST['idjadwal'];
        $idstudio = $_POST['idstudio'];
        $idpelanggan = $_POST['idpelanggan'];
        $jumlahtiket = $_POST['jumlahtiket'];
        $totalharga = $_POST['totalharga'];
        $waktupembelian = $_POST['waktupembelian'];

        $edittransaksi = mysqli_query($koneksi, "call update_transaksi_pembelian_tiket('$idtransaksi', '$idfilm', '$idjadwal', '$idstudio', '$idpelanggan', '$jumlahtiket', '$totalharga', '$waktupembelian')");

        if($edittransaksi){
            echo"
                <script>
                    alert('Data Berhasil Diubah!');    
                </script>
            ";
        }
    }

    //hapus film
    if(isset($_POST['hapusfilm'])){
        $idfilm = $_POST['idfilm'];

        $deletefilm = mysqli_query($koneksi, "call delete_film('$idfilm')");

        if($deletefilm){
            echo"
                <script>
                    alert('Data Berhasil Dihapus!');    
                </script>
            ";
        }
    }

    //hapus jadwal tayang
    if(isset($_POST['hapusjadwal'])){
        $idjadwal = $_POST['idjadwal'];
    
        $deletejadwal = mysqli_query($koneksi, "call delete_jadwal_tayang('$idjadwal')");
        
        if($deletejadwal){
            echo"
                <script>
                    alert('Data Berhasil Dihapus!');    
                </script>
            ";
        }
    }

    ////hapus pelanggan
    if(isset($_POST['hapuspelanggan'])){
        $idpelanggan = $_POST['idpelanggan'];
        
        $deletepelanggan = mysqli_query($koneksi, "call delete_pelanggan('$idpelanggan')");

        if($deletepelanggan){
            echo"
                <script>
                    alert('Data Berhasil Dihapus!');    
                </script>
            ";
        }
    }

    //hapus studio
    if(isset($_POST['hapusstudio'])){
        $idstudio = $_POST['idstudio'];
        
        $deletestudio = mysqli_query($koneksi, "call delete_studio('$idstudio')");
    
        if($deletestudio){
            echo"
                <script>
                    alert('Data Berhasil Dihapus!');    
                </script>
            ";
        }
    }

    //hapus transaksi pembelian tiket
    if(isset($_POST['hapustransaksi'])){
        $idtransaksi = $_POST['idtransaksi'];

        $deletetransaksi = mysqli_query($koneksi, "call delete_transaksi_pembelian_tiket('$idtransaksi')");

        if($deletetransaksi){
            echo"
                <script>
                    alert('Data Berhasil Dihapus!');    
                </script>
            ";
        }
    }

    function template_header($title) {
        echo <<<EOT
        <!DOCTYPE html>
        <html>
            <head>
                <title>$title</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="homepage.css">
                <style>
                    .bgimg {
                        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/myke-simon-atsUqIm3wxo-unsplash.jpg');
                        min-height: 70%;
                        background-position: center;
                        background-size: cover;
                    }
                </style>
            </head>
            <body>
                <div class="w3-top w3-center">
                    <div class="w3-row w3-padding w3-blue-grey">
                        <div class="w3-col s2">
                            <a href="homepage.php" class="w3-button w3-block">Home</a>
                        </div>
                        <div class="w3-col s1">
                            <a href="index.php" class="w3-button w3-block">Film</a>
                        </div>
                        <div class="w3-col s2">
                            <a href="jadwal.php" class="w3-button w3-block">Jadwal Tayang</a>
                        </div>
                        <div class="w3-col s1">
                            <a href="pelanggan.php" class="w3-button w3-block">Pelanggan</a>
                        </div>
                        <div class="w3-col s2">
                            <a href="studio.php" class="w3-button w3-block">Studio</a>
                        </div>
                        <div class="w3-col s2">
                            <a href="transaksi.php" class="w3-button w3-block">Transaksi Penjualan Tiket</a>
                        </div>
                        <div class="w3-col s2">
                            <a href="kelola.php" class="w3-button w3-block">Kelola Tabel</a>
                        </div>
                    </div>
                </div>
        EOT;
        }

        function template_footer() {
        echo <<<EOT
                <footer class="w3-center w3-blue-grey w3-padding w3-large">
                    <p>Created by Hana Husna Safitri 213010503004</p>
                </footer>
            </body>
        </html>
        EOT;
        }
