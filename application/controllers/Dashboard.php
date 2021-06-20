<?php

defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Kolkata');

class dashboard extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        chek_session();
        date_default_timezone_set("Asia/Bangkok");
    }

    function index(){
        
    	$username = $this->session->userdata('username');
        $fullname = $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->nama;
        $kd_user = $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->kd_user;
        $bulan  = date('m');
        $query = $this->db->query("SELECT * FROM absensi WHERE kd_user = '$kd_user' AND keterangan = 'Terlambat' AND Month(tgl_absen) = '$bulan' ")->num_rows();

        $all_barang = $this->db->get('barang')->num_rows();
        $all_bm = $this->db->get('barang_masuk')->num_rows();
        $all_bk = $this->db->get('barang_keluar')->num_rows();
    	
        $this->template->load('admin/template','admin/dashboard', array(
        'all_barang' => $all_barang,
        'all_bm' => $all_bm,
        'all_bk' => $all_bk,
        'query' => $query,
		));

    }

        
    


}