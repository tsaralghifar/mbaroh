<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('menu_m');
        $data['menu'] = $this->menu_m->getMenu()->result();
        // var_dump($data['menu']);
        // die;
        $this->load->view('home', $data);
    }
}
