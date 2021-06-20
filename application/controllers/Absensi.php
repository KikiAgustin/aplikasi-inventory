<?php

defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Kolkata');

class absensi extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        chek_session_hrd();
        date_default_timezone_set("Asia/Bangkok");
    }

    function index(){
        
    	$username = $this->session->userdata('username');

        $fullname = $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->nama;
        $sql = "SELECT * FROM users WHERE level = 1";        
        $combo = $this->db->query($sql);
    	
        $this->template->load('hrd/template','hrd/absensi', array(
        'fullname' => $fullname,
        'cmb' => $combo
		));

    }

    function generate(){
        
        $username = $this->session->userdata('username');       

        $kd_user = $this->input->post('kd_user');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $nama = $this->db->query("SELECT * FROM users WHERE kd_user = '$kd_user'")->row()->nama;

        $tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $from1 = $tahun.'-'.$bulan.'-01';
        $from = date('Y-m-d',strtotime($from1 . "-1 days"));
        $to1 = $tahun.'-'.$bulan.'-'.$tanggal;
        $to = date('Y-m-d',strtotime($to1 . "-0 days"));
        
        
        $this->template->load('hrd/template','hrd/absensi_generate', array(
        'from' => $from,
        'to' => $to,
        'kd_user' => $kd_user,
        'name' => strtoupper($nama)
        ));

    }

        
    


}