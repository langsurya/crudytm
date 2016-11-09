<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
          	<div class="form-group">
          		<label>no.KK</label>
          		<input type="text" name="no_kk" class="form-control" placeholder="No KK .." required>
          	</div>
          	<div class="form-group">
          		<label>Nama Lengkap</label>
          		<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap .." required>
          	</div>
          	<div class="form-group">
          		<label>Nama Panggilan</label>
          		<input type="text" name="nama_panggilan" class="form-control" placeholder="Nama Panggilan .." required>
          	</div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="tmpt_lahir" class="form-control" placeholder="Tempat Lahir .." required>
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="text" name="tgl_lahir" id="tgl" class="form-control" placeholder="Tanggal Lahir ..">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label><br>
              <label class="radio-inline">
              <input type="radio" name="jk" value="L">Laki-laki
              </label>
              <label class="radio-inline">
                <input type="radio" name="jk" value="P">Perempuan
              </label>
            </div>
            <div class="form-group">
              <label>Umur</label>
              <select class="form-control col-sm-5" name="umur">
                <?php 
                for ($i=1; $i < 20; $i++) 
                { 
                  echo "<option value='".$i."'>$i</option>";
                }                
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Status</label><br>
              <label class="radio-inline">
              <input type="radio" name="status" value="S">Sekolah
              </label>
              <label class="radio-inline">
                <input type="radio" name="status" value="T">Tidak Sekolah
              </label>
            </div>
            <div class="form-group">
              <label>Jenjang Pendidikan</label>
              <select class="form-control col-sm-5" name="jenjang_pendidikan">
                <option value="TK">TK</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
              </select>
            </div>
            <div class="form-group">
              <label>Kelas</label>
              <select class="form-control col-sm-5" name="kelas">
                <?php 
                for ($i=1; $i <= 12; $i++) 
                { 
                  echo "<option value='".$i."'>".$i."</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Alamat Sekolah</label>
              <textarea class="form-control" name="alamat_sekolah"></textarea>
            </div>
            <div class="form-group">
              <label>Nama Ayah (alm)</label>
              <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah ..">
            </div>
            <div class="form-group">
              <label>Nama Ibu (alm)</label>
              <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu ..">
            </div>
            <div class="form-group">
              <label>Pekerjaan Ibu</label>
              <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan Ibu ..">
            </div>
            <div class="form-group">
              <label>Tinggal Dengan</label>
              <input type="text" name="tinggal_dengan" class="form-control" placeholder="Tinggal Dengan .." required>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat" required></textarea>
            </div>
          	<div class="form-group">
          		<label>Photo</label>
          		<input type="file" name="photo" class="">
          	</div>

          	<div class="modal-footer">
          		<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          		<input type="submit" name="btn-save" class="btn btn-primary" value="Simpan">
          	</div>
          </form>
        </div>
      </div>
      
    </div>
  </div>


  <script type="text/javascript">
    $(document).ready(function(){
      $("#tgl").datepicker({dateFormat : 'yy/mm/dd'});
    });
  </script>
