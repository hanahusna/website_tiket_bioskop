<?php
    require 'function.php';
?>

<?=template_header('Studio')?>

<div class="background">
	<div class="w3-container" id="studio.php">
        <div class="w3-content" style="max-width:1000px">
		<br><br>
          <h3 class="w3-center w3-padding-48"><span class="w3-tag" style="font-size: larger; font-family: lucida calligraphy;">Studio</span></h3>
          <table border="1" cellpadding="10" cellspacing="0" align="center" style="font-size: x-large;">
				<tr style="background-color:lightcoral; font-weight:bolder;" align="center">
					<td>ID Studio</td>
					<td>Nama Studio</td>
					<td>Kapasitas Studio</td>
					<td>Tipe Studio</td>
				</tr>
				<?php
					$liststudio = mysqli_query($koneksi, "select * from studio");
					while($data = mysqli_fetch_array($liststudio)){
					$idstudio = $data['id_studio'];
					$namastudio = $data['nama_studio'];
					$kapasitasstudio = $data['kapasitas_studio'];
					$tipestudio = $data['tipe_studio'];                                                
				?>
					<tr align = "center">
						<td><?=$idstudio;?></td>
						<td><?=$namastudio;?></td>
						<td><?=$kapasitasstudio;?></td>
						<td><?=$tipestudio;?></td>
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