<?php
class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jual_model');
        $this->load->model('Barang_model');
        $this->load->model('Beli_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['barang'] = $this->Barang_model->get_all_barang();
        $data['get_brg'] = $this->Barang_model->get_brg();
        $this->load->view('home/header');
        $this->load->view('barang', $data);
        $this->load->view('home/footer');
    }

    public function tambah_barang()
    {
        $get_brg = $this->Barang_model->get_brg();
        if ($this->input->post()) {
            $data = array(
                'kodebrg' => $get_brg,
                'nama' => $this->input->post('nama'),
                'satuan' => $this->input->post('satuan'),
                'stok' => '0'
            );
            $this->Barang_model->add_barang($data);
            $this->session->set_flashdata('success_message', 'BERHASIL MENAMBAHKAN BARANG BARU');
        }

        redirect('barang');
    }

    // Tambahkan fungsi lain sesuai kebutuhan
}
