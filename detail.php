<?php include_once'dbconfig.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$table = 'tbl_ytm';
	extract($yatim->getID($id,$table));
}
?>

<?php include_once 'header.php'; ?>

<div class="clearfic"></div>

<div class="container">
	<div class="panel-group col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading">Data Profil Yatim</div>
			<div class="panel-body">
				<table>
					<tr>
						<td>ID</td>
						<td> : <?php print $id; ?></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td> : <?php print $nama_lengkap; ?></td>
						<td>Nama Panggilan</td>
						<td> : <?php print $nama_panggilan; ?></td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td> : <?php print $tmpt_lahir; ?></td>
						<td>Tanggal Lahir</td>
						<td> : <?php print $tgl_lahir; ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td> : <?php print $jk = ($jk=='L') ? 'Laki-laki' : 'Perempuan' ; ?></td>
						<td>Umur</td>
						<td> : <?php print $umur; ?></td>
					</tr>
					<tr>
						<td>Sekolah</td>
						<td> : <?php  print $status = ($status == 'S') ? 'Sekolah' : 'Tidak' ; ?></td>
						<td>Jenjang Pendidikan</td>
						<td> : <?php print $jenjang_pendidikan; ?></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td> : <?php print $kelas; ?></td>
						<td>Alamat</td>
						<td> : <?php print $alamat_sekolah; ?></td>
					</tr>
					<tr>
						<td>Nama Ayah</td>
						<td> : <?php print $nama_ayah; ?></td>
						<td>Nama Ibu</td>
						<td> : <?php print $nama_ibu; ?></td>
					</tr>
					<tr>
						<td>Tinggal Dengan</td>
						<td> : <?php print $tinggal_dengan; ?></td>
						<td>Alamat</td>
						<td> : <?php print $alamat; ?></td>
					</tr>
					<tr>
						<td>Photo</td>
						<td> : <img width="200px" height="200px" src="images/<?php print $photo; ?>" class="img-rounded"></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include_once 'footer.php'; ?>