<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>DATA BARANG MASUK</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Tgl Barang Masuk <?php echo form_error('tgl_bm') ?></td>
            <td><input type="date" class="form-control" name="tgl_bm" id="tgl_bm" placeholder="Tgl Bm" value="<?php echo $tgl_bm; ?>" />
        </td>
	    <tr><td>Nama Barang <?php echo form_error('kd_barang') ?></td>
            <td><?php echo cmb_dinamis('kd_barang', 'barang', 'nama_barang', 'kd_barang', $kd_barang) ?> 
        </td>
	    <tr><td>Nama Suplayer <?php echo form_error('kd_suplayer') ?></td>
            <td><?php echo cmb_dinamis('kd_suplayer', 'suplayer', 'nama_suplayer', 'kd_suplayer', $kd_suplayer) ?> 
        </td>
	    <tr><td>Jumlah Barang <?php echo form_error('jumlah_bm') ?></td>
            <td><input type="text" class="form-control" name="jumlah_bm" id="jumlah_bm" placeholder="Jumlah Barang" value="<?php echo $jumlah_bm; ?>" />
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
            <td><textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </td></tr>
	    <input type="hidden" name="kd_bm" value="<?php echo $kd_bm; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('barang_masuk') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->