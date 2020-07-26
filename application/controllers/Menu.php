<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('menu_m');
	}

	public function index()
	{
		$data['row'] = $this->menu_m->get()->result();
		$this->template->load('template', 'menu/data_menu', $data);
	}

	public function add(){
		$menu = new stdClass();
		$menu->menu_id = null;
		$menu->nama_menu = null;
		$menu->kategori_menu = null;
		$menu->harga = null;
		$menu->gambar = null;
		$data = [
			'page' => 'add',
			'row' => $menu
		];
		$this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|trim');
		$this->form_validation->set_rules('kategori_menu', 'Kategori Menu', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		// $this->form_validation->set_rules('gambar', 'Gambar', 'required|trim');
	
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'menu/menu_form', $data);
		}else{
			$img_upload = $_FILES['gambar']['name'];
			if ($img_upload) {
				$config['allowed_types']	= 'jpg|png|jpeg';
				$config['max_size']			= '4096';
				$config['upload_path']		= './uploads/menu/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$image = $this->upload->data('file_name');
					$conf['image_library'] 		= 'gd2';
					$conf['source_image']		= './uploads/menu/'.$image;
					$conf['create_thumb']		= FALSE;
					$conf['maintain_ratio']		= FALSE;
					$conf['width']				= 650;
					$conf['height']				= 350;
					$conf['new_image']			= './uploads/menu/'.$image;
					$this->load->library('image_lib', $conf);
					$this->image_lib->resize();
				}else{
					echo $this->upload->display_errors();
				}
			}
			if ($image == null) {
				redirect('menu/menu_form');
			}else{
				$param = [
					'menu_id'			=> null,
					'nama_menu'			=> $this->input->post('nama_menu'),
					'kategori_menu'		=> $this->input->post('kategori_menu'),
					'harga'				=> $this->input->post('harga'),
					'gambar'			=> $image
				];
				$this->menu_m->add($param);
				$this->session->set_flashdata('message','HI THERE');
				redirect('menu');
			}
		}
	}

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

	public function edit($id = null)
	{
		$query = $this->menu_m->get($id);
		if ($query->num_rows() > 0) {
			$menu = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $menu
			);
			$this->form_validation->set_rules('nama_menu','Nama Menu','required|trim');
			$this->form_validation->set_rules('kategori_menu','Kategori Menu','required|trim');
			$this->form_validation->set_rules('harga','Harga', 'required');

			if ($id == null) {
				$this->session->set_flashdata('message','HI THERE');
				redirect('menu/');
			} else {
				if ($this->form_validation->run() == FALSE) {
					$this->template->load('template', 'menu/menu_form_edit', $data);
				} else {
					$img_upload = $_FILES['gambar']['name'];
					if ($img_upload) {
						$config['allowed_types']	= 'jpg|png|jpeg';
						$config['max_size']			= '4096';
						$config['upload_path']		= './uploads/menu/';
						$config['overwrite']		= true;

						$this->load->library('upload', $config);

						if ($this->upload->do_upload('gambar')) {
							$image = $this->upload->data('file_name');
							$conf['image_library']		= 'gd2';
							$conf['source_image']		= './uploads/menu/'. $image;
							$conf['create_thumb']		= FALSE;
							$conf['maintain_ratio']		= FALSE;
							$conf['width']				= 650; //ini nah
							$conf['height']				= 350; // ini | OK DUDE
							$conf['new_image']			= './uploads/menu/'. $image;

							$this->load->library('image_lib', $conf);
							$this->image_lib->resize();
						} else {
							echo $this->upload->display_errors();
						}
					}
					$param = [
					'menu_id'			=> $id,
					'nama_menu'			=> $this->input->post('nama_menu'),
					'kategori_menu'		=> $this->input->post('kategori_menu'),
					'harga'				=> $this->input->post('harga'),
					'gambar'			=> $image 
					];
					$this->menu_m->edit($param);
					$this->session->set_flashdata('message','Data Updated');
					redirect('menu/');

					// kuntul wkwkwk itu km tinggal sesuai kan size gambar nya, itukan size di aku lo
				}
			}
			
		}
	}

	public function print()
    {
        $data = [
            'body'      => $this->menu_m->get()->result(),
            'title'     => 'Daftar Menu'
        ];
        $this->load->view('menu/menuprint', $data);
        
    }

	public function del($id)
	{
		$this->menu_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
		}
		redirect('menu');
	}
}
