<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-del']))
{
 $id = $_GET['hapus_id'];
 $table = 'tbl_ytm';
 $yatim->delete($id,$table);
 header("Location: hapus.php?terhapus"); 
}

?>

<?php include_once 'header.php'; ?>
<br/><br/><br/><br/>
<div class="clearfix"></div>

<div class="container">

 <?php
 if(isset($_GET['terhapus']))
 {
  ?>
        <div class="alert alert-success">
     <strong>Success!</strong> record was deleted... 
  </div>
        <?php
 }
 else
 {
  ?>
        <div class="alert alert-danger">
     <strong>Sure !</strong> to remove the following record ? 
  </div>
        <?php
 }
 ?> 
</div>

<div class="clearfix"></div>

<div class="container">
  
  <?php
  if(isset($_GET['hapus_id']))
  {
   ?>
        <table class='table table-bordered'>
        <tr>
          <th class="col-md-1">no</th>
          <th class="col-md-3">Nama</th>
          <th class="col-md-1">Umur</th>
          <th class="col-md-2">Nama Ayah (alm)</th>
          <th class="col-md-2">Nama Ibu (alm)</th>
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM tbl_ytm WHERE id=:id");
         $stmt->execute(array(":id"=>$_GET['hapus_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php print($row['id']); ?></td>
             <td><?php print($row['nama_lengkap']); ?></td>
             <td><?php print($row['umur']); ?></td>
             <td><?php print($row['nama_ayah']); ?></td>
             <td><?php print($row['nama_ibu']); ?></td>
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
  }
  ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['hapus_id']))
{
 ?>
   <form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="barang.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
 <?php
}
else
{
 ?>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
</p>
</div> 