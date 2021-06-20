
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DATA BARANG <?php echo anchor('barang/create/','Create',array('class'=>'btn btn-primary btn-sm'));?>
		</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Kategori</th>
		    <th>Nama Barang</th>		    
		    <th>Stok</th>
            <th>Satuan</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php            
            $start = 0;
            foreach ($barang_data as $barang)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td>
            <?php 
            $nama_kategori   =   $this->db->query("SELECT * FROM kategori_barang WHERE kd_kategori = '$barang->kd_kategori'")->row()->nama_kategori;
            echo "$nama_kategori";
            ?>                
            </td>
		    <td><?php echo $barang->nama_barang ?></td>
            <td><?php echo $barang->stok ?></td>
		    <td><?php echo $barang->satuan ?></td>
		    
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('barang/read/'.$barang->kd_barang),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('barang/update/'.$barang->kd_barang),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('barang/delete/'.$barang->kd_barang),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->