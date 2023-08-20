<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuanbarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    // public function index()
    // {
    //     $data['title'] = "Pengajuan Barang";
    //     $data['pengajuan_barang'] = $this->admin->getPengajuanBarang();
    //     $this->template->load('templates/dashboard', 'barang_pengajuan/data', $data);
    // }

    public function pengajuan()
    {
        $data['title'] = "Pengajuan Barang";
        $data['pengajuan_barang'] = $this->admin->getPengajuanBarang();
        $this->template->load('templates/dashboard', 'barang_pengajuan/data', $data);
    }

    public function verifikasi()
    {
        $data['title'] = "Pengajuan Barang";
        $data['pengajuan_barang'] = $this->admin->getVerifikasiBarang();
        $this->template->load('templates/dashboard', 'barang_pengajuan/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jenis_id', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Pengajuan Barang";
            $data['jenis'] = $this->admin->get('jenis');
            $data['satuan'] = $this->admin->get('satuan');

            $this->template->load('templates/dashboard', 'barang_pengajuan/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('barang_pengajuan', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('pengajuanbarang');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('pengajuanbarang/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Pengajuan Barang";
            $data['jenis'] = $this->admin->get('jenis');
            $data['satuan'] = $this->admin->get('satuan');
            $data['barang_pengajuan'] = $this->admin->get('barang_pengajuan', ['id_pengajuan' => $id]);
            $this->template->load('templates/dashboard', 'barang_pengajuan/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('barang_pengajuan', 'id_pengajuan', $id, $input);

            if ($update) {
                if($input['status'] == 'pengajuan') {
                    set_pesan('data berhasil disimpan');
                    redirect('pengajuanbarang/pengajuan');
                } else {
                    set_pesan('data berhasil disimpan');
                    redirect('pengajuanbarang/verifikasi');
                }
            } else {
                set_pesan('gagal menyimpan data');
                redirect('pengajuanbarang/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('barang_pengajuan', 'id_pengajuan', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('pengajuanbarang');
    }

    public function konfirmasi($getId, $status)
    {
        $id = encode_php_tags($getId);
        $status = encode_php_tags($status);
        if ($status == 1) {
            $input['status'] = 'disetujui';
            $update = $this->admin->update('barang_pengajuan', 'id_pengajuan', $id, $input);
            redirect('pengajuanbarang/verifikasi');
        } else {
            $input['status'] = 'ditolak';
            $update = $this->admin->update('barang_pengajuan', 'id_pengajuan', $id, $input);    
            redirect('pengajuanbarang/verifikasi');
        }
    }
}
