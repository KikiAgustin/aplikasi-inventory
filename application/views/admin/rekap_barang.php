
<script>    
  $(document).ready(function() {
      $('#example').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      } );
  } );
</script>
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>REKAP DATA BARANG  
		</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="example">
        <caption>DATA BARANG</caption>
            <thead>
                <tr>
        <th width="80px">No</th>
        <th>Nama Kategori</th>
        <th>Nama Barang</th>        
        <th>Stok</th>
            <th>Satuan</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($data->result() as $row): ?> 
             
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td>
            <?php 
            $nama_kategori   =   $this->db->query("SELECT * FROM kategori_barang WHERE kd_kategori = '$row->kd_kategori'")->row()->nama_kategori;
            echo "$nama_kategori";
            ?>                
            </td>
        <td><?php echo $row->nama_barang ?></td>
            <td><?php echo $row->stok ?></td>
        <td><?php echo $row->satuan ?></td>
	        </tr>
            <?php endforeach; ?> 
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->