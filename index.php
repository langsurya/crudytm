<?php include_once 'dbconfig.php';

if (isset($_POST['btn-save'])) {
	$no_kk = $_POST['no_kk'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$nama_panggilan = $_POST['nama_panggilan'];
	$tempat_lahir = $_POST['tmpt_lahir'];
	$tanggal_lahir = $_POST['tgl_lahir'];
	$jk = $_POST['jk'];
	$umur = $_POST['umur'];
	$status = $_POST['status'];
	$jenjang_pendidikan = $_POST['jenjang_pendidikan'];
	$kelas = $_POST['kelas'];
	$alamat_sekolah = $_POST['alamat_sekolah'];
	$nama_ayah = $_POST['nama_ayah'];
	$nama_ibu = $_POST['nama_ibu'];
	$pekerjaan_ibu = $_POST['pekerjaan_ibu'];
	$tinggal_dengan = $_POST['tinggal_dengan'];
	$alamat = $_POST['alamat'];

	// Ambil data gambar dari form
	$nama_file = $_FILES['photo']['name'];
	$ukuran_file = $_FILES['photo']['size'];
	$tipe_file = $_FILES['photo']['type'];
	$tmp_file = $_FILES['photo']['tmp_name'];

	// set path folder tempat menyimpan gambar
	$imgExt = strtolower(pathinfo($nama_file,PATHINFO_EXTENSION));
	$userpic = rand(1000,1000000).".".$imgExt;
	$path = "images/".$userpic;
	// Cek apakah tipe file yg di upload adalah JPG/JPEG/PNG
	if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
		# jika tipe file JPG/JPEG/PNG, maka lakukan:
		// Cek apakah ukuran file sama atau lebih kecil dari 1MB
		if ($ukuran_file <= 1000000) {
			# jika ukuran file kurang dari sama dengan 1MB, lakukan :
			// proses upload
			if (move_uploaded_file($tmp_file, $path)) { // cek apakah gambar berhasil di upload
				# jika gambar berhasil di upload, lakukan :
				//  proses simpan ke database
				if ($yatim->tambah($no_kk,$nama_lengkap,$nama_panggilan,$tempat_lahir,$tanggal_lahir,$jk,$umur,$status,$jenjang_pendidikan,$kelas,$alamat_sekolah,$nama_ayah,$nama_ibu,$pekerjaan_ibu,$tinggal_dengan,$alamat,$userpic)) {
					header('location:index.php?msg=success');
				}			
			}else{
				// jika gambar gagal di upload
				echo "<script> alert('Data Gagal Di Upload') </script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
			}
		}else{
			// jika ukuran lebih dari 1MB
			echo "<script> alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB') </script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
		}
	}else{
		//jika tipe file yg diupload bukan JPG/JPEG.PNG, lakukan :
		echo "<script> alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.') </script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
	}

}
?>
<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<?php 
if (isset($_GET['inserted'])) {
	?>
	<div class="container">
	 <div class="alert alert-info">
	 <strong>Data Berhasil di Tambah</strong>
	 </div>
	</div>
	<?php
}else if(isset($_GET['failure'])){
	?>
	<div class="container">
	 <div class="alert alert-warning">
	 <strong>Data gagal Di input</strong>
	 </div>
	</div>
	<?php
}
?>


<div class="container">
	<!-- <div class="row"> -->
		
			<h3><i class="glyphicon glyphicon-briefcase"></i> Data Yatim</h3>
			<button type="button" class="btn btn-info col-md-2" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i>Tambah Data</button>
			<form method="get">
				<div class="input-group col-md-5 col-md-offset-7">
					<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
					<input type="text" class="form-control" placeholder="Cari berdasarkan nama di sini .." aria-describedby="basic-addon1" name="cari">
				</div>
			</form>

			<?php 
			$query = "SELECT * FROM tbl_ytm";
			$stmt = $DB_con->prepare($query);
			$stmt->execute();
			// echo "Jumlah data : ". $stmt->rowCount();
			?><br>
			<div class="col-md-12">

				<table class="col-md-2">
					<tr>
						<td>Jumlah Records : <?php echo $stmt->rowCount(); ?></td>
					</tr>
				</table>
				<a style="margin-bottom:10px;" href="print_lap.php" target="_blank" class="btn btn-default pull-right"><span class="glyphicon glyphicon-print"></span> Cetak</a>
			</div>
			
		
		<table class="table">
    <thead>
     <tr>
     	<th class="col-md-1">no</th>
     	<th class="col-md-3">Nama</th>
     	<th class="col-md-1">Umur</th>
     	<th class="col-md-2">Nama Ayah (alm)</th>
     	<th class="col-md-2">Nama Ibu (alm)</th>
     	<th class="col-md-3">Opsi</th>
     </tr>
    </thead>
     <?php 
     $table = 'tbl_ytm';
     $query = "SELECT * FROM $table";
     $records_per_page=10;
     $newquery = $yatim->paging($query,$records_per_page);
     if (isset($_GET['cari'])) {
     	$cari = $_GET['cari'];
     	$yatim->caridata($query,$cari);
     }else{
     $yatim->view_data($newquery);
     ?>
     <tr>
			<td colspan="7" align="center">
				<div class="pagination-wrap">
					<?php $yatim->paginglink($query,$records_per_page); ?>
				</div>
			</td>
		</tr>
		<?php } ?>
  </table>

  <?php include_once 'modal.php'; ?>

	<!-- </div> -->
</div>

<?php include 'footer.php'; ?>