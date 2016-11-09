<?php 
include_once 'dbconfig.php';

if (isset($_POST['btn-update'])) {
	$id = $_GET['edit_id'];
	$no_kk = $_POST['no_kk'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$nama_panggilan = $_POST['nama_panggilan'];
	$tmpt_lahir = $_POST['tmpt_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
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
	$ufoto = $_FILES['photo']['name'];	
	
	if (empty($_FILES['photo']['name'])) {	
		if ($yatim->update($id,$no_kk,$nama_lengkap,$nama_panggilan,$tmpt_lahir,$tgl_lahir,$jk,$umur,$status,$jenjang_pendidikan,$kelas,$alamat_sekolah,$nama_ayah,$nama_ibu,$pekerjaan_ibu,$tinggal_dengan,$alamat,$ufoto)) {
			header('location:edit.php?edit_id='.$id);
		}
	}else{
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
					if ($yatim->update($id,$no_kk,$nama_lengkap,$nama_panggilan,$tmpt_lahir,$tgl_lahir,$jk,$umur,$status,$jenjang_pendidikan,$kelas,$alamat_sekolah,$nama_ayah,$nama_ibu,$pekerjaan_ibu,$tinggal_dengan,$alamat,$userpic)) {
						header('location:edit.php?edit_id='.$id);
					}			
				}else{
					// jika gambar gagal di upload
					echo "<script> alert('Data Gagal Di Upload') </script>";
					echo "<meta http-equiv='refresh' content='0; url=edit.php?edit_id='".$id.">";
				}
			}else{
				// jika ukuran lebih dari 1MB
				echo "<script> alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB') </script>";
				echo "<meta http-equiv='refresh' content='0; url=edit.php?edit_id='".$id.">";
			}
		}else{
			//jika tipe file yg diupload bukan JPG/JPEG.PNG, lakukan :
			echo "<script> alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.') </script>";
			echo "<meta http-equiv='refresh' content='0; url=edit.php?edit_id='".$id.">";
		}

	}
}

if (isset($_GET['edit_id'])) {
	$id = $_GET['edit_id'];
	$table = 'tbl_ytm';
	extract($yatim->getID($id,$table));
}

?>

<?php include_once 'header.php'; ?>
<div class="clearfix"></div>

<div class="container">

<?php 
if (isset($msg)) {
	echo $msg;
}
?>

<div class="panel panel-primary">
<div class="panel-heading"><h4><i class="glyphicon glyphicon-edit"></i> Ubah Data Barang</h4></div>
	<div class="panel-body">


		<form class="form-horizontal" enctype="multipart/form-data" method="post">
		
		<div class="form-group">
			<label class="control-label col-sm-3">No. KK</label>
			<div class="col-sm-5">
			 <input type="text" name="no_kk" class="form-control" placeholder="No.KK .." value="<?php echo $no_kk; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3">Nama Lengkap</label>
			<div class="col-sm-5">
			<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Barang .." value="<?php print $nama_lengkap; ?>">				
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3">Nama Panggilan</label>
			<div class="col-sm-5">
			<input type="text" name="nama_panggilan" class="form-control" placeholder="Nama Panggilan .." value="<?php echo $nama_panggilan; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3">Tempat Lahir</label>
			<div class="col-sm-4">
			<input type="text" name="tmpt_lahir" class="form-control" placeholder="Tempat Lahir .." value="<?php print $tmpt_lahir; ?>">
			</div>	
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3">Tanggal Lahir</label>
			<div class="col-sm-4">
			 <input type="text" name="tgl_lahir" class="form-control" id="tgl" placeholder="Tgl Lahir .." value="<?php print $tgl_lahir; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" >Jenis Kelamin </label>
			<div class="col-sm-4">				
			 <?php if ($jk=='L'): ?>
			 <label class="radio-inline">
	      <input type="radio" name="jk" value="L" checked>Laki-laki
	     </label>
	     <label class="radio-inline">
	      <input type="radio" name="jk" value="P" >Perempuan
	     </label>			 	
	   	<?php else: ?>
	   		<label class="radio-inline">
	      <input type="radio" name="jk" value="L">Laki-laki
	     </label>
	     <label class="radio-inline">
	      <input type="radio" name="jk" value="P" checked>Perempuan
	     </label>
			 <?php endif ?>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3">Umur </label>
			<div class="col-sm-4">				
			 <select name="umur" class="form-control">
			 <?php 
			 for ($i=1; $i < 20; $i++) { 
			 	if ($i==$umur) {
			 		echo "<option value='".$i."' selected>".$i."</option>";
			 	}else{
			 	echo "<option value='".$i."'>".$i."</option>";
			 	}
			 }
			 ?>
			 </select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="jumlah">Status</label>
			<div class="col-sm-4">				
			 	<label class="radio-inline">
	      	<input type="radio" name="status" value="S" <?php if($status=='S') print 'checked';?>>Sekolah
	      </label>
	      <label class="radio-inline">
	        <input type="radio" name="status" value="T" <?php if($status=='T') print 'checked'; ?>>Tidak Sekolah
	      </label>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3">Jenjang Pendidikan</label>
			<div class="col-sm-4">				
			 <select class="form-control" name="jenjang_pendidikan">
			 	<option value="TK" <?php if ($jenjang_pendidikan=='TK') print 'selected'; ?>>TK</option>
			 	<option value="SD" <?php if ($jenjang_pendidikan=='SD') print 'selected'; ?>>SD</option>
			 	<option value="SMP" <?php if ($jenjang_pendidikan=='SMP') print 'selected'; ?>>SMP</option>
			 	<option value="SMA" <?php if ($jenjang_pendidikan=='SMA') print 'selected'; ?>>SMA</option>
			 </select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" >Kelas</label>
			<div class="col-sm-4">				
			 <select class="form-control" name="kelas">
			 <?php 
			 for ($i=1; $i < 13; $i++) { 
			 	if ($kelas==$i) 
			 		echo "<option value='".$i."' selected>".$i."</option>";
			 	else
			 		echo "<option value='".$i."'>".$i."</option>";
			 }
			 ?>
			 </select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3">Alamat Sekolah</label>
			<div class="col-sm-4">				
				<textarea class="form-control" name="alamat_sekolah"><?php print $alamat_sekolah; ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" >Nama Ayah (alm)</label>
			<div class="col-sm-4">				
			 <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah .." value="<?php echo $nama_ayah; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" >Nama Ibu (alm)</label>
			<div class="col-sm-4">				
			 <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu .." value="<?php echo $nama_ibu; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" >Pekerjaan Ibu</label>
			<div class="col-sm-4">				
			 <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan Ibu .." value="<?php echo $pekerjaan_ibu; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" >Tinggal Dengan</label>
			<div class="col-sm-4">				
			 <input type="text" name="tinggal_dengan" class="form-control" placeholder="Tinggal Dengan .." value="<?php echo $tinggal_dengan; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" >Alamat</label>
			<div class="col-sm-4">				
			 <textarea class="form-control" name="alamat"><?php print $alamat; ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="jumlah">Photo </label>
			<div class="col-sm-4">				
			<img width="200px" height="200px" src="images/<?php print $photo; ?>" class="img-rounded"><br><br>
			 <input type="file" name="photo">
			</div>
		</div>

		<div class="form-group" align="center">
			<label class="control-label col-sm-3"></label>
			<div class="col-sm-4">
				<button type="submit" name="btn-update" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Update</button>
				<a href="barang.php" class="btn btn-large btn-warning"><i class="glyphicon glyphicon-backward"></i> Cancel</a>
			</div>			
		</div>

	</form>
		
	</div>
</div>
	
</div>
<script type="text/javascript">
    $(document).ready(function(){
      $("#tgl").datepicker({dateFormat : 'yy/mm/dd'});
    });
  </script>