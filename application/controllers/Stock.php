<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Stock";
        $data['stock'] = $this->admin->getStock();
        $this->template->load('templates/dashboard', 'stock/data', $data);
    }

    public function minmax()
    {
        $data['title'] = "MinMax";
        $data['stock'] = $this->admin->getMinmax();
        $this->template->load('templates/dashboard', 'stock/dataMinmax', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('barang_id', 'Barang', 'required|trim');
        $this->form_validation->set_rules('jumlah_minimal', 'Jumlah Minimal', 'required|trim');
        $this->form_validation->set_rules('jumlah_maximal', 'Jumlah Maximal', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "MinMax";
            $data['barang'] = $this->admin->get('barang', null, null);
            $this->template->load('templates/dashboard', 'stock/add', $data);
        } else {
            $input = $this->input->post(null, true);
            // print_r($input);
            // die();
            $insert = $this->admin->insert('minmax', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('stock/minmax');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('stock/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "MinMax";
            $data['barang'] = $this->admin->get('barang', null, null);
            $data['minmax'] = $this->admin->get('minmax', ['id_minmax' => $id]);
            $this->template->load('templates/dashboard', 'stock/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('minmax', 'id_minmax', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('stock/minmax');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('stock/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('satuan', 'id_satuan', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('satuan');
    }
}
