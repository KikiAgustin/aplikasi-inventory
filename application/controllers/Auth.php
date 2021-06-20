<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('model_auth');
    }

    function login()
    {
        if (isset($_POST['submit'])) {

            // proses login disini
            $username   =   $this->input->post('username', TRUE);
            $password   =   $this->input->post('password', TRUE);
            $level      =   $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->level;
            $kd_user    =   $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->kd_user;
            $today      =   date('Y-m-d');
            $time       =   date('H:i');
            if ($time > '07:30') {
                $keterangan = 'Terlambat';
            } else {
                $keterangan = 'Tepat Waktu';
            }

            $hasil      =  $this->model_auth->login($username, $password, $level);
            if ($hasil == 1) {

                $cek_absen = $this->db->get_where('absensi', array('kd_user' => $kd_user, 'tgl_absen' => $today))->num_rows();
                if ($cek_absen == 0) {
                    $data   = array(
                        'tgl_absen' => $today,
                        'waktu_absen' => $time,
                        'kd_user' => $kd_user,
                        'absen' => 'Masuk',
                        'keterangan' => $keterangan,
                    );
                    $this->db->insert('absensi', $data);
                }


                $this->session->set_userdata(array('status_login' => 'oke', 'username' => $username));
                redirect('dashboard');
                //echo "HEY TAYO";                

            } else {

                $pass = "wrong";
                $this->session->set_flashdata('alert_user', $pass);
                redirect('auth/login');
            }
        } else {

            chek_session_login();
            $this->load->view('auth/header');
            $this->load->view('auth/form_login');
            $this->load->view('auth/footer');
        }
    }


    function logout()
    {
        $username = $this->session->userdata('username');
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
