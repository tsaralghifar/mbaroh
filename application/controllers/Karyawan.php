<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('karyawan_m');
	}

	public function index()
	{
		$data['row'] = $this->karyawan_m->get()->result();
		$this->template->load('template', 'karyawan/index', $data);
	}

	public function add(){
		$karyawan = new stdClass();
		$karyawan->id_karyawan = null;
		$karyawan->nama_karyawan = null;
		$karyawan->alamat = null;
		$karyawan->foto = null;
		$data = [
			'page' => 'add',
			'row' => $karyawan
		];
		$this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        // $this->form_validation->set_rules('foto_barang', 'Foto Barang', 'required');
		// $this->form_validation->set_rules('gambar', 'Gambar', 'required|trim');
	
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'karyawan/karyawan_add', $data);
		}else{
			$img_upload = $_FILES['foto']['name'];
			if ($img_upload) {
				$config['allowed_types']	= 'jpg|png|jpeg';
				$config['max_size']			= '4096';
				$config['upload_path']		= './uploads/karyawan/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					$image = $this->upload->data('file_name');
					$conf['image_library'] 		= 'gd2';
					$conf['source_image']		= './uploads/karyawan/'.$image;
					$conf['create_thumb']		= FALSE;
					$conf['maintain_ratio']		= FALSE;
					$conf['width']				= 650;
					$conf['height']				= 350;
					$conf['new_image']			= './uploads/karyawan/'.$image;
					$this->load->library('image_lib', $conf);
					$this->image_lib->resize();
				}else{
					echo $this->upload->display_errors();
				}
			}
			if ($image == null) {
				redirect('karyawan/karyawan_add');
			}else{
				$param = [
					'id_karyawan'		=> null,
					'nama_karyawan'		=> $this->input->post('nama_karyawan'),
					'alamat'		    => $this->input->post('alamat'),
					'foto'		        => $image					
				];
				$this->karyawan_m->add($param);
				$this->session->set_flashdata('message','HI THERE');
				redirect('karyawan');
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
		$query = $this->karyawan_m->get($id);
		if ($query->num_rows() > 0) {
			$karyawan = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $karyawan
			);
			$this->form_validation->set_rules('nama_karyawan','Nama Karyawan','required|trim');
			$this->form_validation->set_rules('alamat','Alamat','required|trim');

			if ($id == null) {
				$this->session->set_flashdata('message','HI THERE');
				redirect('karyawan/');
			} else {
				if ($this->form_validation->run() == FALSE) {
					$this->template->load('template', 'karyawan/karyawan_edit', $data);
				} else {
					$img_upload = $_FILES['foto']['name'];
					if ($img_upload) {
						$config['allowed_types']	= 'jpg|png|jpeg';
						$config['max_size']			= '4096';
						$config['upload_path']		= './uploads/karyawan/';
						$config['overwrite']		= true;

						$this->load->library('upload', $config);

						if ($this->upload->do_upload('foto')) {
							$image = $this->upload->data('file_name');
							$conf['image_library']		= 'gd2';
							$conf['source_image']		= './uploads/karyawan/'. $image;
							$conf['create_thumb']		= FALSE;
							$conf['maintain_ratio']		= FALSE;
							$conf['width']				= 650; //ini nah
							$conf['height']				= 350; // ini | OK DUDE
							$conf['new_image']			= './uploads/karyawan/'. $image;

							$this->load->library('image_lib', $conf);
							$this->image_lib->resize();
						} else {
							echo $this->upload->display_errors();
						}
					}
					$param = [
					'id_karyawan'		=> $id,
					'nama_karyawan' 	=> $this->input->post('nama_barang'),
					'alamat'		    => $this->input->post('tipe_barang'),
					'foto'		        => $image 
					];
					$this->karyawan_m->edit($param);
					$this->session->set_flashdata('message','Data Updated');
					redirect('karyawan/');

				
				}
			}
			
		}
	}

	public function print()
    {
        $data = [
            'body'      => $this->karyawan_m->get()->result(),
            'title'     => 'Daftar Karyawan'
        ];
        $this->load->view('karyawan/print', $data);
        
    }

	public function del($id)
	{
		$this->karyawan_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
		}
		redirect('karyawan');
	}
}
