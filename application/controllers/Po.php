<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po extends CI_Controller
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
        $data['title'] = "Data Pengajuan Barang";
        $data['barang_pengajuan'] = $this->admin->get('barang_pengajuan');
        $this->template->load('templates/dashboard', 'po/daftar-permintaan_barang', $data);
    }

    public function add(){
        $data['title'] = "Tambah PO";
        // $data['barang_pengajuan'] = $this->admin->get('barang_pengajuan');
        $this->template->load('templates/dashboard', 'po/add', $data);
    }

    public function invoice(){
        $data['title'] = "Invoice";
        // $data['barang_pengajuan'] = $this->admin->get('barang_pengajuan');
        $this->template->load('templates/dashboard', 'po/invoice', $data);
    }

    public function nota_pembayaran(){
        $data['title'] = "Nota Pembayaran";
        // $data['barang_pengajuan'] = $this->admin->get('barang_pengajuan');
        $this->template->load('templates/dashboard', 'po/nota_pembayaran', $data);
    }

    public function konfirmasi_pengiriman_barang(){
        $data['title'] = "Konfirmasi Pengiriman Barang";
        // $data['barang_pengajuan'] = $this->admin->get('barang_pengajuan');
        $this->template->load('templates/dashboard', 'po/konfirmasi-pengiriman_barang', $data);
    }

    // private function _validasi()
    // {
    //     $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required|trim');
    //     $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim|numeric');
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    // }

    // public function add()
    // {
    //     $this->_validasi();
    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = "Supplier";
    //         $this->template->load('templates/dashboard', 'supplier/add', $data);
    //     } else {
    //         $input = $this->input->post(null, true);
    //         $save = $this->admin->insert('supplier', $input);
    //         if ($save) {
    //             set_pesan('data berhasil disimpan.');
    //             redirect('supplier');
    //         } else {
    //             set_pesan('data gagal disimpan', false);
    //             redirect('supplier/add');
    //         }
    //     }
    // }


    // public function edit($getId)
    // {
    //     $id = encode_php_tags($getId);
    //     $this->_validasi();

    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = "Supplier";
    //         $data['supplier'] = $this->admin->get('supplier', ['id_supplier' => $id]);
    //         $this->template->load('templates/dashboard', 'supplier/edit', $data);
    //     } else {
    //         $input = $this->input->post(null, true);
    //         $update = $this->admin->update('supplier', 'id_supplier', $id, $input);

    //         if ($update) {
    //             set_pesan('data berhasil diedit.');
    //             redirect('supplier');
    //         } else {
    //             set_pesan('data gagal diedit.');
    //             redirect('supplier/edit/' . $id);
    //         }
    //     }
    // }

    // public function delete($getId)
    // {
    //     $id = encode_php_tags($getId);
    //     if ($this->admin->delete('supplier', 'id_supplier', $id)) {
    //         set_pesan('data berhasil dihapus.');
    //     } else {
    //         set_pesan('data gagal dihapus.', false);
    //     }
    //     redirect('supplier');
    // }
}
