<?php
    require 'function.php';
?>

<?=template_header('Transaksi Tiket')?>

<div class="background">
	<div class="w3-container" id="transaksi.php">
        <div class="w3-content" style="max-width:1000px">
		<br><br>
          <h3 class="w3-center w3-padding-48"><span class="w3-tag" style="font-size: larger; font-family: lucida calligraphy;">Transaksi Penjualan Tiket</span></h3>
          <table border="1" cellpadding="10" cellspacing="0" align="center" style="font-size: x-large;">
				<tr style="background-color:rosybrown; font-weight:bolder;" align="center">
					<td>ID Transaksi</td>
					<td>ID Film</td>
					<td>ID Jadwal</td>
					<td>ID Studio</td>
					<td>ID Pelanggan</td>
					<td>Jumlah Tiket</td>
					<td>Total Harga</td>
                    <td>Waktu Pembelian</td>
				</tr>
				<?php
					$listtransaksi = mysqli_query($koneksi, "select * from transaksi_pembelian_tiket");
					while($data = mysqli_fetch_array($listtransaksi)){
					$idtransaksi = $data['id_transaksi'];
					$idfilm = $data['id_film'];
					$idjadwal = $data['id_jadwal'];
					$idstudio = $data['id_studio'];
					$idpelanggan = $data['id_pelanggan'];
					$jumlahtiket = $data['jumlah_tiket'];
					$totalharga = $data['total_harga'];
                    $waktupembelian = $data['waktu_pembelian'];                                                
				?>
					<tr align = "center">
						<td><?=$idtransaksi;?></td>
						<td><?=$idfilm;?></td>
						<td><?=$idjadwal;?></td>
						<td><?=$idstudio;?></td>
						<td><?=$idpelanggan;?></td>
						<td><?=$jumlahtiket;?></td>
						<td><?=$totalharga;?></td>
                        <td><?=$waktupembelian;?></td>
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