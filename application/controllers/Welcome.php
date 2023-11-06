<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		$this->load->view('home/content', $data);
		$this->load->view('home/footer');
	}
}
