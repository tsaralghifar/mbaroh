<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('reservation_m');
        $this->load->model('menu_m');
        $this->load->helper('plugin_helper');
        $this->load->helper('faktur_helper');
    }

    public function index()
    {
        check_not_login();
        $data = [
            'row'       => $this->reservation_m->get()->result()
        ];
        $this->template->load('template','reservation/index', $data);       
    }

}