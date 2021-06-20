

<section class="content-header">
      <h1>Profile
      </h1>
      
    </section>


<!-- Main content -->
    <section class="content">

      

      <div class="row" style="padding: 20px">

        <?php if ($this->session->flashdata('alert_user') == 'success'): ?>
        <div class="alert alert-success" style="margin: 10px"><center>Data Berhasil Disimpan !</center></div>
        <?php endif; ?>

        <div class="box">
            <div class="box-header">
             <h3>Form Edit Profile</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
            <div class="single-task">
             
              <?php echo form_open('profile/proses_edit'); ?>
              
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="<?= $data->nama; ?>"> 
                </div>
                <div class="form-group">
                  <label>Kode Pegawai</label>
                  <input type="text" name="kd_pegawai" class="form-control" value="<?= $data->kd_pegawai; ?>"> 
                </div>
                <div class="form-group">
                  <label>Posisi</label>
                  <input type="text" name="posisi" class="form-control" value="<?= $data->posisi; ?>"> 
                </div>
                

                <button type="submit" class="btn btn-primary">Submit</button>                
              
              </form>
              <br>
              </div>
                           
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
        
      </div>
      <!-- /.row -->


</section>
    <!-- /.content -->
