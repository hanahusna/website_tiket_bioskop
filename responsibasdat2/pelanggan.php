<?php
    require 'function.php';
?>

<?=template_header('Pelanggan')?>

<div class="background">
	<div class="w3-container" id="pelanggan.php">
        <div class="w3-content" style="max-width:1000px">
		<br><br>
          <h3 class="w3-center w3-padding-48"><span class="w3-tag" style="font-size: larger; font-family: lucida calligraphy;">Pelanggan</span></h3>
          <table border="1" cellpadding="10" cellspacing="0" align="center" style="font-size: x-large;">
				<tr style="background-color:lightblue; font-weight:bolder;" align="center">
					<td>ID Pelanggan</td>
					<td>Nama Pelanggan</td>
					<td>Nomor Telepon</td>
					<td>Alamat Email</td>
				</tr>
				<?php
					$listpelanggan = mysqli_query($koneksi, "select * from pelanggan");
					while($data = mysqli_fetch_array($listpelanggan)){
					$idpelanggan = $data['id_pelanggan'];
					$namapelanggan = $data['nama_pelanggan'];
					$nomortelepon = $data['nomor_telepon'];
					$alamatemail = $data['alamat_email'];                                                
				?>
					<tr align = "center">
						<td><?=$idpelanggan;?></td>
						<td><?=$namapelanggan;?></td>
						<td><?=$nomortelepon;?></td>
						<td><?=$alamatemail;?></td>
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