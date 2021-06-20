<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        chek_session();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $barang = $this->Barang_model->get_all();

        $data = array(
            'barang_data' => $barang
        );

        $this->template->load('admin/template','admin/barang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_barang' => $row->kd_barang,
		'kd_kategori' => $row->kd_kategori,
		'nama_barang' => $row->nama_barang,
		'satuan' => $row->satuan,
		'stok' => $row->stok,
	    );
            $this->template->load('admin/template','admin/barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function create() 
    {
        
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang/create_action'),
	    'kd_barang' => set_value('kd_barang'),
	    'kd_kategori' => set_value('kd_kategori'),
	    'nama_barang' => set_value('nama_barang'),
	    'satuan' => set_value('satuan'),
	);
        $this->template->load('admin/template','admin/barang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_kategori' => $this->input->post('kd_kategori',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
	    );

            $this->Barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang/update_action'),
		'kd_barang' => set_value('kd_barang', $row->kd_barang),
		'kd_kategori' => set_value('kd_kategori', $row->kd_kategori),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'satuan' => set_value('satuan', $row->satuan),
	    );
            $this->template->load('admin/template','admin/barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_barang', TRUE));
        } else {
            $data = array(
		'kd_kategori' => $this->input->post('kd_kategori',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
	    );

            $this->Barang_model->update($this->input->post('kd_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $this->Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_kategori', 'kd kategori', 'trim|required');
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');

	$this->form_validation->set_rules('kd_barang', 'kd_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 06:05:09 */
/* http://harviacode.com */