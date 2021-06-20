

<section class="content-header">
      <h1>
        Profile
      </h1>
      
    </section>

<!-- Main content -->
    <section class="content">

      

      <div class="row" style="padding: 20px">

        
          <div class="box box-info">
            <div class="box-header with-border">
              
                         
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped example1">
                  <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td> <?= $data->username; ?> </td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $data->nama; ?></td>
                  </tr>
                  <tr>
                    <td>Kode Pegawai</td>
                    <td>:</td>
                    <td><?= $data->kd_pegawai; ?></td>
                  </tr>
                  <tr>
                    <td>Posisi</td>
                    <td>:</td>
                    <td><?= $data->posisi; ?></td>
                  </tr>
                  
                  
                </table>
              </div>
              <!-- /.table-responsive -->

              <a href="<?= base_url() ?>profile/edit_profile/" class="btn btn-primary btn-block btn-lg">Edit Profile</a>

            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->
        
      </div>
      <!-- /.row -->


</section>
    <!-- /.content -->