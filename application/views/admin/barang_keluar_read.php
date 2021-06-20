<?php 
$nama_barang   =   $this->db->query("SELECT * FROM barang WHERE kd_barang = '$kd_barang'")->row()->nama_barang;
?> 
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Barang Keluar Detail</h3>
        <table class="table table-bordered">
	    <tr><td>Tgl Barang Keluar</td><td><?php echo $tgl_bk; ?></td></tr>
	    <tr><td>Nama Barang</td><td><?php echo $nama_barang; ?></td></tr>
	    <tr><td>Jumlah Barang</td><td><?php echo $jumlah_bk; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('barang_keluar') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->