<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth_hrd extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_auth');
    }
    
    function login()
    {
        if(isset($_POST['submit'])){
            
            // proses login disini
            $username   =   $this->input->post('username', TRUE);
            $password   =   $this->input->post('password', TRUE);
            $level      =   $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->level;

            $hasil      =  $this->model_auth->login_hrd($username,$password,$level);
            if($hasil==1)
            {

                
                $this->session->set_userdata(array('status_login'=>'okey','username'=>$username));
                redirect('dashboard_hrd');
                //echo "HEY TAYO";                
                
            }
            else{

                $pass = "wrong";
                $this->session->set_flashdata('alert_user', $pass); 
                redirect('auth_hrd/login');
            }
        }
        else{
            
            chek_session_login();
            $this->load->view('form_login_hrd');
        }
    }
    
    
    function logout()
    {
        $username = $this->session->userdata('username');     
        $this->session->sess_destroy();
        redirect('auth_hrd/login');
    }
}