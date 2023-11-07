<?php
class Jual extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jual_model');
        $this->load->model('Barang_model');
    }

    public function index()
    {
        $data['penjualan'] = $this->Jual_model->get_all_penjualan();
        $data['get_nama_brg'] = $this->Jual_model->get_nama_brg();
        $data['get_jual'] = $this->Jual_model->get_jual();
        $this->load->view('home/header');
        $this->load->view('jual', $data);
        $this->load->view('home/footer');
    }

    public function tambah_penjualan()
    {
        $get_jual = $this->Jual_model->get_jual();
        $tgl = date('Y-m-d');
        $data = array(
            'nofaktur' => $get_jual,
            'tgl' => $tgl,
            'kodebrg' => $this->input->post('kodebrg'),
            'qty' => $this->input->post('qty')
        );
        $stok_barang = $this->Barang_model->get_stok_by_kodebrg($data['kodebrg']);

        if ($data['qty'] <= 0) {
            // Qty tidak valid, kurang dari atau sama dengan 0 harus mulai dari 1
            $this->session->set_flashdata('error_message', 'STOK TIDAK MENCUKUPI!!!');
        } elseif ($stok_barang === 0 && $data['qty'] === 0) {
            // Stok barang sudah habis dan qty = 0
            $this->session->set_flashdata('error_message', 'STOK BARANG SUDAH HABIS!!!');
        } elseif ($stok_barang >= $data['qty']) {
            // Stok mencukupi, lanjutkan penjualan
            $this->Jual_model->tambah_penjualan($data);
            $this->Barang_model->kurangi_stok($data['kodebrg'], $data['qty']);
            $this->session->set_flashdata('success_message', 'PENJUALAN BARANG BERHASIL!!!');
        } elseif ($stok_barang < $data['qty']) {
            // Stok tidak mencukupi
            $this->session->set_flashdata('error_message', 'STOK TIDAK MENCUKUPI!!!');
        }

        redirect('jual');
    }
}
