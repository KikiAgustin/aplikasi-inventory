<?php

defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Kolkata');

class profile extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        chek_session();
        date_default_timezone_set("Asia/Bangkok");
    }

    function index(){
        
    	$username = $this->session->userdata('username');
        
        $kd_user = $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->kd_user;

        $query  =  "SELECT * FROM users WHERE kd_user = '$kd_user'";
        
        $this->template->load('admin/template','admin/profile', array(
        'data' => $this->db->query($query)->row(),
        ));
    }

    function edit_profile(){
        
        $username = $this->session->userdata('username');        
        $kd_user = $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->kd_user;

        $query  =  "SELECT * FROM users WHERE username = '$username'";
        
        $this->template->load('admin/template','admin/edit_profile', array(
        'data' => $this->db->query($query)->row(),
        ));

    }

    function proses_edit(){

        $username = $this->session->userdata('username');
        $kd_user = $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->kd_user;

        $nama = $this->input->post('nama');
        $kd_pegawai = $this->input->post('kd_pegawai');
        $posisi = $this->input->post('posisi');

        $data   = array (
                'nama' => $nama,
                'kd_pegawai' => $kd_pegawai, 
                'posisi' => $posisi,  
                );    

        $this->db->where('kd_user', $kd_user);
        $this->db->update('users', $data);

        
        $notif = "success";
        $this->session->set_flashdata('alert_user', $notif);
        redirect('profile/edit_profile');

    }
    
    


}