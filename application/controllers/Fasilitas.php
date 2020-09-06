<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('fasilitas_m');
	}

	public function index()
	{
		$data = [
			'row'		=> $this->fasilitas_m->get()->result(),
			'kategori'	=> $this->fasilitas_m->get_kategori()->result(),
			'stok'      => $this->fasilitas_m->get_stock()->row()
		]; 
		$this->template->load('template', 'fasilitas/data_fasilitas', $data);
	}

	public function add(){
		$fasilitas = new stdClass();
		$fasilitas->id = null;
		$fasilitas->nama_barang = null;
		$fasilitas->kategori = null;
		$fasilitas->status = null;
		$fasilitas->foto_barang = null;
		$data = [
			'page' => 'add',
			'row' => $fasilitas,
			'kategori' => $this->fasilitas_m->get_kategori()->result()
		];
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
		$this->form_validation->set_rules('kategori', 'Tipe', 'required|trim');
		$this->form_validation->set_rules('status', 'Status Barang', 'required|trim');
        // $this->form_validation->set_rules('foto_barang', 'Foto Barang', 'required');
		// $this->form_validation->set_rules('gambar', 'Gambar', 'required|trim');
	
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'fasilitas/fasilitas_add', $data);
		}else{
			$img_upload = $_FILES['foto_barang']['name'];
			if ($img_upload) {
				$config['allowed_types']	= 'jpg|png|jpeg';
				$config['max_size']			= '4096';
				$config['upload_path']		= './uploads/fasilitas/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto_barang')) {
					$image = $this->upload->data('file_name');
					$conf['image_library'] 		= 'gd2';
					$conf['source_image']		= './uploads/fasilitas/'.$image;
					$conf['create_thumb']		= FALSE;
					$conf['maintain_ratio']		= FALSE;
					$conf['width']				= 650;
					$conf['height']				= 350;
					$conf['new_image']			= './uploads/fasilitas/'.$image;
					$this->load->library('image_lib', $conf);
					$this->image_lib->resize();
				}else{
					echo $this->upload->display_errors();
				}
			}
			if ($image == null) {
				redirect('fasilitas/fasilitas_add');
			}else{
				$param = [
					'id'			=> null,
					'nama_barang'		=> $this->input->post('nama_barang'),
					'kategori'			=> $this->input->post('kategori'),
					'status'			=> $this->input->post('status'),
					'foto_barang'		=> $image					
				];
				$this->fasilitas_m->add($param);
				$this->session->set_flashdata('message','HI THERE');
				redirect('fasilitas');
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
		$query = $this->fasilitas_m->get($id);
		if ($query->num_rows() > 0) {
			$fasilitas = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $fasilitas
			);
			$this->form_validation->set_rules('nama_barang','Nama Barang','required|trim');
			$this->form_validation->set_rules('tipe_barang','Tipe Barang','required|trim');
			$this->form_validation->set_rules('status','Status Barang', 'required');

			if ($id == null) {
				$this->session->set_flashdata('message','HI THERE');
				redirect('fasilitas/');
			} else {
				if ($this->form_validation->run() == FALSE) {
					$this->template->load('template', 'fasilitas/fasilitas_edit', $data);
				} else {
					$img_upload = $_FILES['foto_barang']['name'];
					if ($img_upload) {
						$config['allowed_types']	= 'jpg|png|jpeg';
						$config['max_size']			= '4096';
						$config['upload_path']		= './uploads/fasilitas/';
						$config['overwrite']		= true;

						$this->load->library('upload', $config);

						if ($this->upload->do_upload('foto_barang')) {
							$image = $this->upload->data('file_name');
							$conf['image_library']		= 'gd2';
							$conf['source_image']		= './uploads/fasilitas/'. $image;
							$conf['create_thumb']		= FALSE;
							$conf['maintain_ratio']		= FALSE;
							$conf['width']				= 650; //ini nah
							$conf['height']				= 350; // ini | OK DUDE
							$conf['new_image']			= './uploads/fasilitas/'. $image;

							$this->load->library('image_lib', $conf);
							$this->image_lib->resize();
						} else {
							echo $this->upload->display_errors();
						}
					}
					$param = [
					'id'			=> $id,
					'nama_barang'		=> $this->input->post('nama_barang'),
					'tipe_barang'		=> $this->input->post('tipe_barang'),
					'status'			=> $this->input->post('status'),
					'foto_barang'		=> $image 
					];
					$this->fasilitas_m->edit($param);
					$this->session->set_flashdata('message','Data Updated');
					redirect('fasilitas/');

				
				}
			}
			
		}
	}

	public function kategori()
	{
		$data = [
			'row' 		=> $this->fasilitas_m->get_kategori()->result()
		];
		$this->template->load('template', 'fasilitas/kategori',$data);
	}

	public function add_kategori()
	{
		$param = [
			'id'			 => null,
			'nama_kategori'  => $this->input->post('nama_kategori')
		];
		$this->fasilitas_m->add_cat($param);
		redirect('fasilitas/kategori');
	}

	function add_unit()
    {
		$id = $this->input->post('barang_stok');
		// var_dump($id);
		// die;
        if ($id == null) {
            redirect('fasilitas/');
        } else {
            $param = [
                'id'            => $id,
                'jumlah'        => $this->input->post('jumlah_unit'),
				'barang'        => $this->fasilitas_m->get_barang($id)->row()->unit,
				'created_by'    => $this->session->userdata('nama')
			];
			// var_dump($param);
			// die;
			$this->fasilitas_m->track_stock($param);
            $this->fasilitas_m->stockin($param);
            redirect('fasilitas/');
        }
	}
	
	public function barang_out()
	{
		$data = [
			'row'				=> $this->fasilitas_m->get()->result(),
			'kategori'			=> $this->fasilitas_m->get_kategori()->result(),
			'stok'     		 	=> $this->fasilitas_m->get_stock()->row(),
            'barangkeluar'      => $this->fasilitas_m->get_keluar()->result()
        ];
        $this->template->load('template','fasilitas/barang_out', $data);
	}

	public function print()
    {
        $data = [
            'body'      => $this->fasilitas_m->get()->result(),
            'title'     => 'Daftar Fasilitas'
        ];
        $this->load->view('fasilitas/print', $data);
        
    }

	public function del($id)
	{
		$this->fasilitas_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
		}
		redirect('fasilitas');
	}
}
