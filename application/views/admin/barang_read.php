
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Barang Read</h3>
        <table class="table table-bordered">
	    <tr><td>Kd Kategori</td><td><?php echo $kd_kategori; ?></td></tr>
	    <tr><td>Nama Barang</td><td><?php echo $nama_barang; ?></td></tr>	    
	    <tr><td>Stok</td><td><?php echo $stok; ?></td></tr>
      <tr><td>Satuan</td><td><?php echo $satuan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->