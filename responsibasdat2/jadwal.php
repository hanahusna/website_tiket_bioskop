<?php
    require 'function.php';
?>

<?=template_header('Jadwal Tayang')?>

<div class="background">
    <div class="w3-container" id="jadwal.php">
        <div class="w3-content" style="max-width:1500px">
        <br><br>
            <h3 class="w3-center w3-padding-48"><span class="w3-tag" style="font-size: larger; font-family: lucida calligraphy;">Jadwal Tayang</span></h3>
            <table border="1" cellpadding="10" cellspacing="0" align="center" style="font-size: x-large;">
                <tr style="background-color:plum; font-weight:bolder;" align="center">
                        <td>ID Jadwal</td>
                        <td>ID Film</td>
                        <td>ID Studio</td>
                        <td>Tanggal Tayang</td>
                        <td>Jam Tayang</td>
                        <td>Harga Tiket</td>
                        <td>Jumlah Tiket Tersedia</td>
                </tr>
                    <?php
                        $listjadwal = mysqli_query($koneksi, "select * from jadwal_tayang");
                        while($data = mysqli_fetch_array($listjadwal)){
                        $idjadwal = $data['id_jadwal'];
                        $idfilm = $data['id_film'];
                        $idstudio = $data['id_studio'];
                        $tanggaltayang = $data['tanggal_tayang'];
                        $jamtayang = $data['jam_tayang'];
                        $hargatiket = $data['harga_tiket'];
                        $jumlahtiket = $data['jumlah_tiket_tersedia'];                                                
                    ?>
                <tr align = "center">
                            <td><?=$idjadwal;?></td>
                            <td><?=$idfilm;?></td>
                            <td><?=$idstudio;?></td>
                            <td><?=$tanggaltayang;?></td>
                            <td><?=$jamtayang;?></td>
                            <td><?=$hargatiket;?></td>
                            <td><?=$jumlahtiket;?></td>
                </tr>
                <?php
                        };
                ?>
    	    </table>
        </div>
    </div>
    <br><br>
</div>

<?=template_footer()?>