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
            $nofaktur = $this->Beli_model->get_beli();
            $tgl = date('Y-m-d');

            $data = array(
                'nofaktur' => $nofaktur,
                'tgl' => $tgl,
                'kodebrg' => $this->input->post('kodebrg'),
                'qty' => $this->input->post('qty')
            );

            if ($data['qty'] < 1) {
                // Qty tidak valid, harus lebih besar atau sama dengan 1
                $this->session->set_flashdata('error_message', 'JUMLAH PEMBELIAN TIDAK VALID 1');
            } else {
                $this->Beli_model->add_pembelian($data);
                $this->Barang_model->tambah_stok($data['kodebrg'], $data['qty']);
                $this->session->set_flashdata('success_message', 'PEMBELIAN BARANG BERHASIL!!!');
            }

            redirect('beli');
        }
    }
}
