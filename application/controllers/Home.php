<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('menu_m');
        $this->load->model('event_m');
        $data['menu'] = $this->menu_m->getMenu()->result();
        $data['event'] = $this->event_m->getMenu()->result();
        // var_dump($data['menu']);
        // die;
        $this->load->view('home', $data);
    }

    public function print()
    {
        $this->load->model("menu_m");
        $data = [
            'body'      => $this->menu_m->get()->result(),
            'title'     => 'Daftar Menu'
        ];
        $this->load->view('menuprint', $data);
        
    }
}
