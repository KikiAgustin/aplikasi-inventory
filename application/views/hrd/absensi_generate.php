
<script>    
  $(document).ready(function() {
      $('#example').DataTable( {
          lengthMenu: [ 10, 25, 50, 75, 100 ],
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
                  <h3 class='box-title'>DATA ABSENSI 
		</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="example">
        <caption>DATA ABSENSI <?= $name ?></caption>
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Tanggal</th>
		    <th>Absen</th>
		    <th>Waktu Absen</th>
		    <th>Keterangan</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            ?> 
             
        
        <?php
        while (strtotime($from)<strtotime($to)){
        $from = mktime(0,0,0,date('m',strtotime($from)),date('d',strtotime($from))+1,date('Y',strtotime($from)));
        $from = date('d-m-Y', $from);
        ?>
        <tr>
        <td><?= ++$start ?></td>
        <td><?= $from ?></td>
        <td>
          <?php
          $cek_from = date('Y-m-d',strtotime($from . "+0 days"));
          $cek_absen = $this->db->get_where('absensi', array('tgl_absen' => $cek_from))->num_rows();
          $absen = $this->db->query("SELECT * FROM absensi WHERE kd_user = '$kd_user'")->row()->absen;
          $waktu = $this->db->query("SELECT * FROM absensi WHERE kd_user = '$kd_user'")->row()->waktu_absen;
          $keterangan = $this->db->query("SELECT * FROM absensi WHERE kd_user = '$kd_user'")->row()->keterangan;
          if($cek_absen == 0){
            $absensi = 'Belum Absen';
            $waktu = '-';
            $keterangan = '-';
          }else{
            $absensi = $absen;
            $waktu = $waktu;
            $keterangan = $keterangan;
          }
          echo "$absensi";
          ?>
        </td>
        <td>
          <?= $waktu ?>
        </td>
        <td>
          <?= $keterangan ?>
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
        
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->