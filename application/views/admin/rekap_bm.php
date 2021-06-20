
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
                  <h3 class='box-title'>REKAP DATA BARANG MASUK  
		</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="example">
        <caption>DATA BARANG MASUK</caption>
            <thead>
                <tr>
                    <th width="80px">No</th>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Nama Suplayer</th>
        <th>Jumlah Barang</th>
        <th>Keterangan</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($data->result() as $row): ?> 
             
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $row->tgl_bm ?></td>
        <td>
            <?php 
            $nama_barang   =   $this->db->query("SELECT * FROM barang WHERE kd_barang = '$row->kd_barang'")->row()->nama_barang;
            echo "$nama_barang";
            ?>        
            </td>
        <td>
            <?php 
            $nama_suplayer  =   $this->db->query("SELECT * FROM suplayer WHERE kd_suplayer = '$row->kd_suplayer'")->row()->nama_suplayer;
            echo "$nama_suplayer";
            ?>      
            </td>
        <td><?php echo $row->jumlah_bm ?></td>
        <td><?php echo $row->keterangan ?></td>
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