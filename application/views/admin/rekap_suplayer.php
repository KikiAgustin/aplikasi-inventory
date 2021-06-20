
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
                  <h3 class='box-title'>REKAP DATA SUPLAYER  
		</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="example">
        <caption>DATA SUPLAYER</caption>
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Suplayer</th>
		    <th>Alamat</th>
		    <th>No Telp</th>
		    <th>Keterangan</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($data->result() as $row): ?> 
             
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $row->nama_suplayer ?></td>
		    <td><?php echo $row->alamat ?></td>
		    <td><?php echo $row->no_telp ?></td>
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