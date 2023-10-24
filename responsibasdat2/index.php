<?php
    require 'function.php';
?>

<?=template_header('Film')?>

<div class="background">
	<div class="w3-container" id="index.php">
        <div class="w3-content" style="max-width:1200px">
		<br><br>
          <h3 class="w3-center w3-padding-48"><span class="w3-tag" style="font-size: larger; font-family: lucida calligraphy;">Film</span></h3>
          <table border="1" cellpadding="10" cellspacing="0" align="center" style="font-size: x-large;">
				<tr style="background-color:burlywood; font-weight:bolder;" align="center">
					<td>ID Film</td>
					<td>Judul Film</td>
					<td>Sutradara</td>
					<td>Pemain Utama</td>
					<td>Genre</td>
					<td>Durasi</td>
					<td>Poster</td>
				</tr>
				<?php
					$listfilm = mysqli_query($koneksi, "select * from film");
					while($data = mysqli_fetch_array($listfilm)){
					$idfilm = $data['id_film'];
					$judulfilm = $data['judul_film'];
					$sutradara = $data['sutradara'];
					$pemainutama = $data['pemain_utama'];
					$genre = $data['genre'];
					$durasi = $data['durasi'];
					$poster = $data['poster'];                                                
				?>
					<tr align = "center">
						<td><?=$idfilm;?></td>
						<td><?=$judulfilm;?></td>
						<td><?=$sutradara;?></td>
						<td><?=$pemainutama;?></td>
						<td><?=$genre;?></td>
						<td><?=$durasi;?></td>
						<td><img src="images/<?=$poster; ?>" width="200"></td>
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