<?php 

class yatim{

	private $db;

	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}

	public function tambah($no_kk,$nama_lengkap,$nama_panggilan,$tempat_lahir,$tanggal_lahir,$jk,$umur,$status,$jenjang_pendidikan,$kelas,$alamat_sekolah,$nama_ayah,$nama_ibu,$pekerjaan_ibu,$tinggal_dengan,$alamat,$userpic)
	{
		try {
			$stmt = $this->db->prepare("INSERT INTO tbl_ytm(no_kk,nama_lengkap,nama_panggilan,tmpt_lahir,tgl_lahir,jk,umur,status,jenjang_pendidikan,kelas,alamat_sekolah,nama_ayah,nama_ibu,pekerjaan_ibu,tinggal_dengan,alamat,photo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bindparam(1,$no_kk);
			$stmt->bindparam(2,$nama_lengkap);
			$stmt->bindparam(3,$nama_panggilan);
			$stmt->bindparam(4,$tempat_lahir);
			$stmt->bindparam(5,$tanggal_lahir);
			$stmt->bindparam(6,$jk);
			$stmt->bindparam(7,$umur);
			$stmt->bindparam(8,$status);
			$stmt->bindparam(9,$jenjang_pendidikan);
			$stmt->bindparam(10,$kelas);
			$stmt->bindparam(11,$alamat_sekolah);
			$stmt->bindparam(12,$nama_ayah);
			$stmt->bindparam(13,$nama_ibu);
			$stmt->bindparam(14,$pekerjaan_ibu);
			$stmt->bindparam(15,$tinggal_dengan);
			$stmt->bindparam(16,$alamat);
			$stmt->bindparam(17,$userpic);
			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	

	public function update($id,$no_kk,$nama_lengkap,$nama_panggilan,$tmpt_lahir,$tgl_lahir,$jk,$umur,$status,$jenjang_pendidikan,$kelas,$alamat_sekolah,$nama_ayah,$nama_ibu,$pekerjaan_ibu,$tinggal_dengan,$alamat,$photo)
	{
		try {
			if (empty($photo)) {
				$stmt = $this->db->prepare("UPDATE tbl_ytm SET no_kk=:no_kk, nama_lengkap=:nama_lengkap, nama_panggilan=:nama_panggilan, tmpt_lahir=:tmpt_lahir, tgl_lahir=:tgl_lahir , jk=:jk, umur=:umur, status=:status , jenjang_pendidikan=:jenjang_pendidikan, kelas=:kelas, alamat_sekolah=:alamat_sekolah, nama_ayah=:nama_ayah, nama_ibu=:nama_ibu, pekerjaan_ibu=:pekerjaan_ibu, tinggal_dengan=:tinggal_dengan, alamat=:alamat WHERE id=:id");
			}else{				
			$stmt = $this->db->prepare("UPDATE tbl_ytm SET no_kk=:no_kk, nama_lengkap=:nama_lengkap, nama_panggilan=:nama_panggilan, tmpt_lahir=:tmpt_lahir, tgl_lahir=:tgl_lahir , jk=:jk, umur=:umur, status=:status , jenjang_pendidikan=:jenjang_pendidikan, kelas=:kelas, alamat_sekolah=:alamat_sekolah, nama_ayah=:nama_ayah, nama_ibu=:nama_ibu, pekerjaan_ibu=:pekerjaan_ibu, tinggal_dengan=:tinggal_dengan, alamat=:alamat, photo=:photo WHERE id=:id");
			$stmt->bindparam(":photo",$photo);
			}

			$stmt->bindparam(":no_kk",$no_kk);
			$stmt->bindparam(":nama_lengkap",$nama_lengkap);
			$stmt->bindparam(":nama_panggilan",$nama_panggilan);
			$stmt->bindparam(":tmpt_lahir",$tmpt_lahir);
			$stmt->bindparam(":tgl_lahir",$tgl_lahir);
			$stmt->bindparam(":jk",$jk);
			$stmt->bindparam(":umur",$umur);
			$stmt->bindparam(":status",$status);
			$stmt->bindparam(":jenjang_pendidikan",$jenjang_pendidikan);
			$stmt->bindparam(":kelas",$kelas);
			$stmt->bindparam(":alamat_sekolah",$alamat_sekolah);
			$stmt->bindparam(":nama_ayah",$nama_ayah);
			$stmt->bindparam(":nama_ibu",$nama_ibu);
			$stmt->bindparam(":pekerjaan_ibu",$pekerjaan_ibu);
			$stmt->bindparam(":tinggal_dengan",$tinggal_dengan);
			$stmt->bindparam(":alamat",$alamat);			
			$stmt->bindparam(":id",$id);

			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}					
	}

	public function getID($id,$table)
	{		
		$stmt = $this->db->prepare("SELECT * FROM $table WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function getName($nama_brg,$table)
	{
		if ($table=='tb_barang') {
		$stmt = $this->db->prepare("SELECT * FROM $table WHERE nama_brg=:nama_brg");
		$stmt->execute(array(":nama_brg"=>$nama_brg));
		$editRow= $stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
		}elseif($table=='barang_terjual'){
			$stmt = $this->db->prepare("SELECT * FROM $table WHERE nama=:nama_brg");
		$stmt->execute(array(":nama_brg"=>$nama_brg));
		$editRow= $stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
		}
	}	

	public function view_data($query)
	{
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$no = 1;
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
			?>
			<tr>
			<td><?php print($no++); ?></td>
			<td><?php print($row['nama_lengkap']); ?></td>
			<td><?php print($row['umur']); ?></td>
			<td><?php print($row['nama_ayah']) ?></td>
			<td><?php print($row['nama_ibu']) ?></td>
			<td>
				<a href="detail.php?id=<?php print($row['id']); ?>"><button type="button" class="btn btn-info">Detail</button></a>
		    <a href="edit.php?edit_id=<?php print($row['id']); ?>"><button type="button" class="btn btn-warning">Edit</button></a>
		    <a href="hapus.php?hapus_id=<?php print($row['id']); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
			</td>
			</tr>
			<?php
		}
	}


	public function caridata($query,$cari)
	{
		$query2=$query." WHERE nama_lengkap like '%$cari%' OR nama_panggilan like '$cari%'";
		$stmt = $this->db->prepare($query2);
		$stmt->execute();
		$no = 1;
		$jumlah_data = $stmt->rowCount();
		if ($jumlah_data < 1) {
		echo "<tr>";
		echo "<td colspan='5'>";
			echo "data yang dicari ditak ada atau tidak sesuai";
			echo "</td>";
			echo "</tr>";
		}
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
			?>
			<tr>
			<td><?php print($no++); ?></td>
			<td><?php print($row['nama_lengkap']); ?></td>
			<td><?php print($row['umur']); ?></td>
			<td><?php print($row['nama_ayah']) ?></td>
			<td><?php print($row['nama_ibu']) ?></td>
			<td>
			 <a href="detail.php?id=<?php print($row['id']); ?>"><button type="button" class="btn btn-info">Detail</button></a>
			 <a href="edit.php?edit_id=<?php print($row['id']); ?>"><button type="button" class="btn btn-warning">Edit</button></a>
			 <a href="hapus.php?hapus_id=<?php print($row['id']); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
			</td>
			</tr>
			<?php
		}
	}

	
	public function paging($query,$records_per_page)
	{
		$starting_position = 0;
		if (isset($_GET["page_no"])) {
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." LIMIT $starting_position,$records_per_page";
		return $query2;
	}



	public function paginglink($query,$records_per_page)
	{
		$self = $_SERVER['PHP_SELF'];

		$stmt = $this->db->prepare($query);
		$stmt->execute();

		$total_no_of_records = $stmt->rowCount();

		if ($total_no_of_records > 0) {
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;

			if (isset($_GET["page_no"])) {
				$current_page=$_GET["page_no"];
			}

			if ($current_page!=1) {
				$previous = $current_page-1;
				echo "<li><a href='".$self."?page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
			}

			for ($i=1; $i<=$total_no_of_pages; $i++) { 
				if ($i==$current_page) {
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}else{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}

			if ($current_page!=$total_no_of_pages) {
				$next = $current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}

	public function delete($id,$table)
 {
  $stmt = $this->db->prepare("DELETE FROM $table WHERE id=:id");
  $stmt->bindparam(":id",$id);
  $stmt->execute();
  return true;
 	
 }

}

?>
