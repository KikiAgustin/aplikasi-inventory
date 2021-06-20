<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>DATA ABSENSI </h3>
                      <div class='box box-primary'>
        <form action="<?= base_url() ?>absensi/generate" method="post">
            <table class='table table-bordered'>
        <tr><td>Nama Pegawai </td>
        <td>
            <select name="kd_user" class="form-control">
                <?php foreach ($cmb->result() as $row): ?>                                
                <option value="<?php echo $row->kd_user; ?>"><?php echo $row->nama; ?> - <?php echo $row->kd_pegawai; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
        <tr><td>Bulan</td>
        <td>
            <input type="text" class="form-control" name="bulan" id="bulan" placeholder="Contoh : 01" required/>
        </td>
        <tr><td>Tahun</td>
        <td>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Contoh : 2019" required/>
        </td>
        
        <tr>
            <td colspan='2'><button type="submit" class="btn btn-primary">Generate</button>
    
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->