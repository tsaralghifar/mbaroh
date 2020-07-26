<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feedback extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('feedback_m');
		$this->load->helper('plugin_helper');
	}

	public function index()
	{
		check_not_login();
		$data['row'] = $this->feedback_m->get()->result();
		$this->template->load('template', 'feedback/index', $data);
	}

	public function add()
    {
		$ratedIndex = $this->input->post('rate');
		
		
        $data = [
            'id'            	 => null,
            'nama_plgn'          => $this->input->post('nama_plgn'),
			'kritik_saran'       => $this->input->post('kritik_saran'),
			'rateIndex'		 	 => $ratedIndex			
        ];
        $this->feedback_m->add($data);
        redirect(base_url());
	}
	
	public function print()
    {
        $data = [
            'body'      => $this->feedback_m->get()->result(),
            'title'     => 'Feedback'
        ];
        $this->load->view('feedback/print', $data);
        
    }

	// public function add(){
	// 	$feedback = new stdClass();
	// 	$feedback->id = null;
	// 	$feedback->nama_plgn = null;
	// 	$feedback->kritik_saran = null;
	// 	$data = [
	// 		'page' => 'add',
	// 		'row' => $feedback
	// 	];
	// 	$this->form_validation->set_rules('nama_plgn', 'Nama Pelanggan', 'required|trim');
	// 	$this->form_validation->set_rules('kritik_saran', 'Kritik & Saran', 'required|trim');
    //     // $this->form_validation->set_rules('foto_barang', 'Foto Barang', 'required');
	// 	// $this->form_validation->set_rules('gambar', 'Gambar', 'required|trim');
	
	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->template->load('template', 'feedback/feedback_add', $data);
	// 	}
	// 			redirect('feedback/feedback_add');
			
	// 			$param = [
	// 				'id'			    => null,
	// 				'nama_plgn'		    => $this->input->post('nama_plgn'),
	// 				'kritik_saran'		=> $this->input->post('kritik_saran')				
	// 			];
	// 			$this->feedback_m->add($param);
	// 			$this->session->set_flashdata('message','HI THERE');
	// 			redirect('feedback');
			
		
	// }

	// public function add()
	// {
	// 	$menu = new stdClass();
	// 	$menu->menu_id = null;
	// 	$menu->nama_menu = null;
	// 	$menu->kategori_menu = null;
	// 	$menu->harga = null;
	// 	$data = array(
	// 		'page' => 'add',
	// 		'row' => $menu
	// 	);
	// 	$this->template->load('template', 'menu/menu_form', $data);
	// }

	
}
