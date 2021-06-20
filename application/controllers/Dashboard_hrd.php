<?php

defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Kolkata');

class dashboard_hrd extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        chek_session_hrd();
        date_default_timezone_set("Asia/Bangkok");
    }

    function index(){
        
    	$username = $this->session->userdata('username');

        $fullname = $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->nama;

        $all_barang = $this->db->get('barang')->num_rows();
        $all_bm = $this->db->get('barang_masuk')->num_rows();
        $all_bk = $this->db->get('barang_keluar')->num_rows();

        
    	
        $this->template->load('hrd/template','hrd/dashboard', array(
        'all_barang' => $all_barang,
        'all_bm' => $all_bm,
        'all_bk' => $all_bk,
		));

    }

        
    


}