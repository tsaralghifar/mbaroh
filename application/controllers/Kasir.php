<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('menu_m');
		$this->load->model('kasir_m');
		$this->load->helper('faktur_helper');
		$this->load->helper('plugin_helper');
	}
	
	public function index()
	{
		$data = [
			'menu' 			=> $this->menu_m->get()->result(),
			'dataFromCart'	=> $this->kasir_m->get()->result(),
			'grand_total'	=> $this->kasir_m->grandTotal()
		];
		$this->template->load('template','kasir/index', $data);
	}

	public function addtocart()
	{
		$param = [
			'id' => null,
			'menu_id' => $this->input->post('product'),
			'qty' => $this->input->post('qty')
		];
		$this->kasir_m->addtocart($param);
		
		$getCartDetail = $this->kasir_m->get($param['menu_id'])->row();

		$cart = [
			'id'			=> null,
			'cart_id'		=> $getCartDetail->id,
			'subtotal'		=> $getCartDetail->harga * $getCartDetail->qty
		];
		// var_dump($param, $getCartDetail, $cart);
		// die;
		$this->kasir_m->addtocartdetail($cart);
		redirect('kasir/');
	}

	public function proses()
	{
		if($this->input->post('customer') == null) {
			$pelanggan = 'Umum';
		}else{
			$pelanggan = $this->input->post('customer');
		}
		$data = [
			'faktur'			=> noFaktur(fakturAutoID()),
			'kasir'				=> $this->session->userdata('nama'),
			'pelanggan'			=> $pelanggan,
			'total'				=> $this->kasir_m->grandTotal(),
			'bayar'				=> $this->input->post('cash'),
			'kembalian'			=> $this->input->post('cash') - $this->kasir_m->grandTotal(),
			'waktu_transaksi'	=> date('Y-m-d H::s' , time())
		];

		if($this->kasir_m->grandTotal() <= 0) {
			redirect('kasir/');
		}else{
			// var_dump($data);
			// die;
			$this->kasir_m->proses($data);
			$this->kasir_m->addDetail($this->kasir_m->last_row()->faktur);
			// $this->kasir_m->clear();
			$cashback = $this->kasir_m->last_row()->cashback;
			if($cashback == 0) {
				redirect('kasir/print/' . $data['faktur']);
			}
		}
	}

	public function print($faktur)
	{
		$no_faktur = $this->kasir_m->nota_header($faktur)->row()->faktur;
		$data = [
			'header'	=> $this->kasir_m->nota_header($no_faktur)->row(),
			'body'		=> $this->kasir_m->nota_line($no_faktur)->result()
		];
		$this->load->view('kasir/nota',$data);
	}

	public function hapus($id)
	{
		$this->kasir_m->hapus($id);
		redirect('kasir/');
	}

	public function clear()
    {
        $this->kasir_m->clear();
        redirect('kasir/');
    }
}
