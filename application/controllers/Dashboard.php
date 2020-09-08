<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_m', 'dashboard');
	}

	public function index()
	{
		check_not_login();

		$data = [
			'javascript' => 'dashboard.js'
		];

		$this->template->load('template', 'dashboard', $data);
	}

	public function get_omset()
	{
		$data = $this->dashboard->getOmset()->result();

		header('Content-Type: application/json');
		echo json_encode(['status' => true, 'data' => $data]);
	}
}
