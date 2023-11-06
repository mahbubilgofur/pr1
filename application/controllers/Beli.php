<?php
class Beli extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jual_model');
        $this->load->model('Barang_model');
        $this->load->model('Beli_model');
    }
    public function index()
    {
        $data['get_beli'] = $this->Beli_model->get_beli();
        $data['get_nama_beli'] = $this->Beli_model->get_nama_beli();
        $this->load->view('home/header');
        $this->load->view('beli', $data);
        $this->load->view('home/footer');
    }

    public function tambah_pembelian()
    {
        if ($this->input->post()) {
            $data = array(
                'nofaktur' => $this->input->post('nofaktur'),
                'tgl' => $this->input->post('tgl'),
                'kodebrg' => $this->input->post('kodebrg'),
                'qty' => $this->input->post('qty')
            );

            // Tambahkan data pembelian ke dalam tabel tbl_beli
            $this->Beli_model->add_pembelian($data);

            // Tambahkan stok barang
            $this->Barang_model->tambah_stok_barang($data['kodebrg'], $data['qty']);

            // Redirect atau tampilkan pesan sukses
            redirect('beli');
        }
    }
}
