<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('reservation_m');
        $this->load->helper('plugin_helper');
        $this->load->helper('faktur_helper');
    }

    public function index()
    {
        check_not_login();
        $data['row'] = $this->reservation_m->get()->result();
        $this->template->load('template','reservation/index', $data);       
    }

    public function check($id = null)
    {
        check_not_login();
        if($id == null) {
            $this->session->set_flashdata('message', 'Id cannot be empty.');
            redirect('reservation/');
        }else{
            $user = $this->session->userdata('nama');
            $param = [
                'status'    => '2',
                'tag'       => $user
            ];
        
            $this->reservation_m->check($param,$id);
            $this->session->set_flashdata('message', 'Booking Complete');
            redirect('reservation/');
        }
    }

    public function add()
    {
        $data = [
            'id'            => null,
            'nama'          => $this->input->post('name'),
            'phone'         => $this->input->post('phone'),
            'jumlah_orang'  => $this->input->post('jumlah_orang'),
            'status'        => 1,
            'booking_at'    => date('Y-m-d H:i:s', time()),
            'tgl_h'         => $this->input->post('tgl_h')
        ];
        $this->reservation_m->booking($data);
        redirect(base_url());
    }

    public function edit($id){
		$reservation = new stdClass();
		$reservation->tf = null;
		$data = [
            'data' => $this->reservation_m->reserve($id)->row(),
			'page' => 'edit',
			'row' => $reservation
		];
        $this->form_validation->set_rules('id', 'Bukti Transfer', 'required');
        $this->form_validation->set_rules('status_bayar', 'Status Bayar', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'reservation/reservation_edit', $data);
		}else{
            $img_upload = $_FILES['tf']['name'];
			if ($img_upload) {
				$config['allowed_types']	= 'jpg|png|jpeg';
				$config['max_size']			= '4096';
				$config['upload_path']		= './uploads/reservation/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('tf')) {
					$image = $this->upload->data('file_name');
					$conf['image_library'] 		= 'gd2';
					$conf['source_image']		= './uploads/reservation/'.$image;
					$conf['create_thumb']		= FALSE;
					$conf['maintain_ratio']		= FALSE;
					$conf['width']				= 650;
					$conf['height']				= 350;
					$conf['new_image']			= './uploads/reservation/'.$image;
					$this->load->library('image_lib', $conf);
					$this->image_lib->resize();
				}else{
					echo $this->upload->display_errors();
				}
			}
			if ($image == null) {
				redirect('reservation/reservation_edit');
			}else{
				$param = [
                    'id'            => $id,
                    'tf'			=> $image,
                    'status_bayar'  => $this->input->post('status_bayar')   
                ];
                var_dump($param);
                die;
				$this->reservation_m->edit($param);
				$this->session->set_flashdata('message','HI THERE');
				redirect('reservation');
			}
		}
    }
    
    public function print($id)
    {
        $no_faktur = $this->reservation_m->nota_header($id)->row()->id;
		$data = [
			'header'	=> $this->reservation_m->nota_header($no_faktur)->row(),
			'body'		=> $this->reservation_m->nota_line($no_faktur)->result()
		];
		$this->load->view('reservation/nota',$data);
    }

    public function print_res()
    {
        $data = [
            'body'      => $this->reservation_m->get()->result(),
            'title'     => 'Daftar Reservasi'
        ];
        $this->load->view('reservation/print', $data);
        
    }

}
