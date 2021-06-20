
<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>BARANG</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Kategori Barang <?php echo form_error('kd_kategori') ?></td>
            <td>
            <?php echo cmb_dinamis('kd_kategori', 'kategori_barang', 'nama_kategori', 'kd_kategori', $kd_kategori) ?>              
        </td>
	    <tr><td>Nama Barang <?php echo form_error('nama_barang') ?></td>
            <td><input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
        </td>
	    <tr><td>Satuan <?php echo form_error('satuan') ?></td>
            <td><input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" />
        </td>
	    
	    <input type="hidden" name="kd_barang" value="<?php echo $kd_barang; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->