<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('event_m');
	}

	public function index()
	{
		$data['row'] = $this->event_m->getMenu()->result();
		$this->template->load('template', 'event/index', $data);
	}

	public function add(){
		$event = new stdClass();
		$event->id = null;
		$event->nama_event = null;
		$event->kegiatan = null;
		$event->foto = null;
		$event->status = null;
		$event->tgl = null;
		$data = [
			'page' => 'add',
			'row' => $event
		];
		$this->form_validation->set_rules('nama_event', 'Nama Event', 'required|trim');
		$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required|trim');
		// $this->form_validation->set_rules('gambar', 'Gambar', 'required|trim');
	
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'event/event_add', $data);
		}else{
			$img_upload = $_FILES['foto']['name'];
			if ($img_upload) {
				$config['allowed_types']	= 'jpg|png|jpeg';
				$config['max_size']			= '4096';
				$config['upload_path']		= './uploads/event/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					$image = $this->upload->data('file_name');
					$conf['image_library'] 		= 'gd2';
					$conf['source_image']		= './uploads/event/'.$image;
					$conf['create_thumb']		= FALSE;
					$conf['maintain_ratio']		= FALSE;
					$conf['width']				= 650;
					$conf['height']				= 350;
					$conf['new_image']			= './uploads/event/'.$image;
					$this->load->library('image_lib', $conf);
					$this->image_lib->resize();
				}else{
					echo $this->upload->display_errors();
				}
			}
			if ($image == null) {
				redirect('event/event_add');
			}else{
				$param = [
					'id'			=> null,
					'nama_event'	=> $this->input->post('nama_event'),
					'kegiatan'		=> $this->input->post('kegiatan'),
					'foto'			=> $image,
					'status'		=> $this->input->post('status'),
					'tgl'			=> $this->input->post('tgl')
				];
				$this->event_m->add($param);
				$this->session->set_flashdata('message','HI THERE');
				redirect('event');
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
		$query = $this->event_m->get($id);
		if ($query->num_rows() > 0) {
			$event = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $event
			);
			$this->form_validation->set_rules('nama_event', 'Nama Event', 'required|trim');
		    $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required|trim');

			if ($id == null) {
				$this->session->set_flashdata('message','HI THERE');
				redirect('event/');
			} else {
				if ($this->form_validation->run() == FALSE) {
					$this->template->load('template', 'event/event_edit', $data);
				} else {
					$img_upload = $_FILES['foto']['name'];
					if ($img_upload) {
						$config['allowed_types']	= 'jpg|png|jpeg';
						$config['max_size']			= '4096';
						$config['upload_path']		= './uploads/event/';
						$config['overwrite']		= true;

						$this->load->library('upload', $config);

						if ($this->upload->do_upload('foto')) {
							$image = $this->upload->data('file_name');
							$conf['image_library']		= 'gd2';
							$conf['source_image']		= './uploads/event/'. $image;
							$conf['create_thumb']		= FALSE;
							$conf['maintain_ratio']		= FALSE;
							$conf['width']				= 650; //ini nah
							$conf['height']				= 350; // ini | OK DUDE
							$conf['new_image']			= './uploads/event/'. $image;

							$this->load->library('image_lib', $conf);
							$this->image_lib->resize();
						} else {
							echo $this->upload->display_errors();
						}
					}
					$param = [
					'id'			=> $id,
					'nama_event'	=> $this->input->post('nama_menu'),
					'kegiatan'		=> $this->input->post('kategori_menu'),
					'foto'			=> $image,
					'status'		=> $this->input->post('status'),
					'tgl'			=> $this->input->post('tgl')
					];
					$this->event_m->edit($param);
					$this->session->set_flashdata('message','Data Updated');
					redirect('event/');

					// kuntul wkwkwk itu km tinggal sesuai kan size gambar nya, itukan size di aku lo
				}
			}
			
		}
	}

	public function print()
    {
        $data = [
            'body'      => $this->event_m->get()->result(),
            'title'     => 'Daftar Fasilitas'
        ];
        $this->load->view('event/print', $data);
        
    }

	public function del($id)
	{
		$this->event_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
		}
		redirect('event');
	}
}
