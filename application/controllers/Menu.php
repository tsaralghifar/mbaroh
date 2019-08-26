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
		$data['row'] = $this->menu_m->get();
		$this->template->load('template', 'menu/data_menu', $data);
	}

	public function add()
	{
		$menu = new stdClass();
		$menu->menu_id = null;
		$menu->nama_menu = null;
		$menu->kategori_menu = null;
		$menu->harga = null;
		$data = array(
			'page' => 'add',
			'row' => $menu
		);
		$this->template->load('template', 'menu/menu_form', $data);
	}

	public function edit($id)
	{
		$query = $this->menu_m->get($id);
		if ($query->num_rows() > 0) {
			$menu = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $menu
			);
			$this->template->load('template', 'menu/menu_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('menu') . "';</script>";
		}
	}

	public function process()
	{

		$config['upload_path'] = './uploads/menu/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 2048;
		$config['file_name'] = 'menu-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			if (@$_FILES['gambar']['name'] != null) {
				if ($this->upload->do_upload('gambar')) {
					$post['gambar'] = $this->upload->data('file_name');
					$this->menu_m->add($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
						redirect('menu');
					}
				}
			} else if (isset($_POST['edit'])) {
				if (@$_FILES['gambar']['name'] != null) {
					if ($this->upload->do_upload('gambar')) {
						$post['gambar'] = $this->upload->data('file_name');
						$this->menu_m->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data Berhasil Diedit');
							redirect('menu');
						}
					}else{
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error',$error);
						redirect('menu/add');
					}
				}
			} else {
				$post['gambar'] = null;
				$this->menu_m->edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
					redirect('menu');
				}
			}
		}
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
