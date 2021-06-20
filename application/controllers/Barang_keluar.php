<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_keluar extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        chek_session();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model('Barang_keluar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $barang_keluar = $this->Barang_keluar_model->get_all();

        $data = array(
            'barang_keluar_data' => $barang_keluar
        );

        $this->template->load('admin/template','admin/barang_keluar_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Barang_keluar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_bk' => $row->kd_bk,
		'tgl_bk' => $row->tgl_bk,
		'kd_barang' => $row->kd_barang,
		'jumlah_bk' => $row->jumlah_bk,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('admin/template','admin/barang_keluar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_keluar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang_keluar/create_action'),
	    'kd_bk' => set_value('kd_bk'),
	    'tgl_bk' => set_value('tgl_bk'),
	    'kd_barang' => set_value('kd_barang'),
	    'jumlah_bk' => set_value('jumlah_bk'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('admin/template','admin/barang_keluar_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $username = $this->session->userdata('username');        
        $kd_user = $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->kd_user;

        $kd_barang = $this->input->post('kd_barang');
        $stok = $this->db->query("SELECT * FROM barang WHERE kd_barang = '$kd_barang'")->row()->stok;
        $jbk = $this->input->post('jumlah_bk');
        $ustok = $stok - $jbk;

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_bk' => $this->input->post('tgl_bk',TRUE),
		'kd_barang' => $this->input->post('kd_barang',TRUE),
		'jumlah_bk' => $this->input->post('jumlah_bk',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'kd_user' => $kd_user,
	    );

        $datax = array(
        'stok' => $ustok
        );

            $this->Barang_keluar_model->insert($data);

            $this->db->where('kd_barang', $kd_barang);
            $this->db->update('barang', $datax);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang_keluar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_keluar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang_keluar/update_action'),
		'kd_bk' => set_value('kd_bk', $row->kd_bk),
		'tgl_bk' => set_value('tgl_bk', $row->tgl_bk),
		'kd_barang' => set_value('kd_barang', $row->kd_barang),
		'jumlah_bk' => set_value('jumlah_bk', $row->jumlah_bk),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('admin/template','admin/barang_keluar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_keluar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $username = $this->session->userdata('username');        
        $kd_user = $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->kd_user;

        $kd_barang = $this->input->post('kd_barang');
        $kd_bk = $this->input->post('kd_bk');
        $stok = $this->db->query("SELECT * FROM barang WHERE kd_barang = '$kd_barang'")->row()->stok;
        $jbk = $this->db->query("SELECT * FROM barang_keluar WHERE kd_bk = '$kd_bk'")->row()->jumlah_bk;
        $jumbk = $this->input->post('jumlah_bk');
        $ubk = $jbk - $jumbk;
        $ustok = $stok + $ubk ;

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_bk', TRUE));
        } else {
            $data = array(
		'tgl_bk' => $this->input->post('tgl_bk',TRUE),
		'kd_barang' => $this->input->post('kd_barang',TRUE),
		'jumlah_bk' => $this->input->post('jumlah_bk',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'kd_user' => $kd_user,
	    );

        $datax = array(
        'stok' => $ustok
        );

            $this->Barang_keluar_model->update($this->input->post('kd_bk', TRUE), $data);

            $this->db->where('kd_barang', $kd_barang);
            $this->db->update('barang', $datax);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang_keluar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_keluar_model->get_by_id($id);

        $kd_barang = $this->db->query("SELECT * FROM barang_keluar WHERE kd_bk = '$id'")->row()->kd_barang;
        $stok = $this->db->query("SELECT * FROM barang WHERE kd_barang = '$kd_barang'")->row()->stok;
        $jbk = $this->db->query("SELECT * FROM barang_keluar WHERE kd_bk = '$id'")->row()->jumlah_bk;
        $ustok = $stok + $jbk;

        $datax = array(
        'stok' => $ustok
        );

        if ($row) {
            $this->Barang_keluar_model->delete($id);

            $this->db->where('kd_barang', $kd_barang);
            $this->db->update('barang', $datax);

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang_keluar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_keluar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_bk', 'tgl bk', 'trim|required');
	$this->form_validation->set_rules('kd_barang', 'kd barang', 'trim|required');
	$this->form_validation->set_rules('jumlah_bk', 'jumlah bk', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('kd_bk', 'kd_bk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Barang_keluar.php */
/* Location: ./application/controllers/Barang_keluar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 07:17:36 */
/* http://harviacode.com */