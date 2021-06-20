<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        chek_session_hrd();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model('Users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $users = $this->Users_model->get_all();

        $data = array(
            'users_data' => $users
        );

        $this->template->load('hrd/template','hrd/users_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_user' => $row->kd_user,
		'username' => $row->username,
		'password' => $row->password,
		'level' => $row->level,
		'nama' => $row->nama,
		'kd_pegawai' => $row->kd_pegawai,
		'posisi' => $row->posisi,
	    );
            $this->template->load('hrd/template','hrd/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
	    'kd_user' => set_value('kd_user'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'level' => set_value('level'),
	    'nama' => set_value('nama'),
	    'kd_pegawai' => set_value('kd_pegawai'),
	    'posisi' => set_value('posisi'),
	);
        $this->template->load('hrd/template','hrd/users_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
		'level' => $this->input->post('level',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'kd_pegawai' => $this->input->post('kd_pegawai',TRUE),
		'posisi' => $this->input->post('posisi',TRUE),
	    );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
		'kd_user' => set_value('kd_user', $row->kd_user),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'level' => set_value('level', $row->level),
		'nama' => set_value('nama', $row->nama),
		'kd_pegawai' => set_value('kd_pegawai', $row->kd_pegawai),
		'posisi' => set_value('posisi', $row->posisi),
	    );
            $this->template->load('hrd/template','hrd/users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_user', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
		'level' => $this->input->post('level',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'kd_pegawai' => $this->input->post('kd_pegawai',TRUE),
		'posisi' => $this->input->post('posisi',TRUE),
	    );

            $this->Users_model->update($this->input->post('kd_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('kd_pegawai', 'kd pegawai', 'trim|required');
	$this->form_validation->set_rules('posisi', 'posisi', 'trim|required');

	$this->form_validation->set_rules('kd_user', 'kd_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 10:00:03 */
/* http://harviacode.com */