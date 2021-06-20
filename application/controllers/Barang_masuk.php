<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        chek_session();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model('Barang_masuk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $barang_masuk = $this->Barang_masuk_model->get_all();

        $data = array(
            'barang_masuk_data' => $barang_masuk
        );

        $this->template->load('admin/template','admin/barang_masuk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Barang_masuk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_bm' => $row->kd_bm,
		'tgl_bm' => $row->tgl_bm,
		'kd_barang' => $row->kd_barang,
		'kd_suplayer' => $row->kd_suplayer,
		'jumlah_bm' => $row->jumlah_bm,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('admin/template','admin/barang_masuk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_masuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang_masuk/create_action'),
	    'kd_bm' => set_value('kd_bm'),
	    'tgl_bm' => set_value('tgl_bm'),
	    'kd_barang' => set_value('kd_barang'),
	    'kd_suplayer' => set_value('kd_suplayer'),
	    'jumlah_bm' => set_value('jumlah_bm'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('admin/template','admin/barang_masuk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $username = $this->session->userdata('username');        
        $kd_user = $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->kd_user;

        $kd_barang = $this->input->post('kd_barang');
        $stok = $this->db->query("SELECT * FROM barang WHERE kd_barang = '$kd_barang'")->row()->stok;
        $jbm = $this->input->post('jumlah_bm');
        $ustok = $stok + $jbm;

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_bm' => $this->input->post('tgl_bm',TRUE),
		'kd_barang' => $this->input->post('kd_barang',TRUE),
		'kd_suplayer' => $this->input->post('kd_suplayer',TRUE),
		'jumlah_bm' => $this->input->post('jumlah_bm',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'kd_user' => $kd_user,
	    );

        $datax = array(
        'stok' => $ustok
        );

            $this->Barang_masuk_model->insert($data);

            $this->db->where('kd_barang', $kd_barang);
            $this->db->update('barang', $datax);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang_masuk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_masuk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang_masuk/update_action'),
		'kd_bm' => set_value('kd_bm', $row->kd_bm),
		'tgl_bm' => set_value('tgl_bm', $row->tgl_bm),
		'kd_barang' => set_value('kd_barang', $row->kd_barang),
		'kd_suplayer' => set_value('kd_suplayer', $row->kd_suplayer),
		'jumlah_bm' => set_value('jumlah_bm', $row->jumlah_bm),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('admin/template','admin/barang_masuk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_masuk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $username = $this->session->userdata('username');        
        $kd_user = $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->kd_user;

        $kd_barang = $this->input->post('kd_barang');
        $kd_bm = $this->input->post('kd_bm');
        $stok = $this->db->query("SELECT * FROM barang WHERE kd_barang = '$kd_barang'")->row()->stok;
        $jbm = $this->db->query("SELECT * FROM barang_masuk WHERE kd_bm = '$kd_bm'")->row()->jumlah_bm;
        $jumbm = $this->input->post('jumlah_bm');
        $ubm = $jbm - $jumbm;
        $ustok = $stok - $ubm ;

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_bm', TRUE));
        } else {
            $data = array(
		'tgl_bm' => $this->input->post('tgl_bm',TRUE),
		'kd_barang' => $this->input->post('kd_barang',TRUE),
		'kd_suplayer' => $this->input->post('kd_suplayer',TRUE),
		'jumlah_bm' => $this->input->post('jumlah_bm',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'kd_user' => $kd_user,
	    );

        $datax = array(
        'stok' => $ustok
        );
            
            $this->Barang_masuk_model->update($this->input->post('kd_bm', TRUE), $data);

            $this->db->where('kd_barang', $kd_barang);
            $this->db->update('barang', $datax);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang_masuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_masuk_model->get_by_id($id);

        $kd_barang = $this->db->query("SELECT * FROM barang_masuk WHERE kd_bm = '$id'")->row()->kd_barang;
        $stok = $this->db->query("SELECT * FROM barang WHERE kd_barang = '$kd_barang'")->row()->stok;
        $jbm = $this->db->query("SELECT * FROM barang_masuk WHERE kd_bm = '$id'")->row()->jumlah_bm;
        $ustok = $stok - $jbm;

        $datax = array(
        'stok' => $ustok
        );

        if ($row) {
            $this->Barang_masuk_model->delete($id);

            $this->db->where('kd_barang', $kd_barang);
            $this->db->update('barang', $datax);

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang_masuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_masuk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_bm', 'tgl bm', 'trim|required');
	$this->form_validation->set_rules('kd_barang', 'kd barang', 'trim|required');
	$this->form_validation->set_rules('kd_suplayer', 'kd suplayer', 'trim|required');
	$this->form_validation->set_rules('jumlah_bm', 'jumlah bm', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('kd_bm', 'kd_bm', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Barang_masuk.php */
/* Location: ./application/controllers/Barang_masuk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 07:17:26 */
/* http://harviacode.com */