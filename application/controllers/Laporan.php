<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('menu_m');
        $this->load->model('kasir_m');
        $this->load->model('laporan_m');
        $this->load->model('reservation_m');
        $this->load->library('pdf');
    }
    
    public function penjualan_print()
    {
        $id = $this->input->post('id');
        $data = [
            'header'    => $this->laporan_m->get_penjualan($id)->row(),
            'body'      => $this->laporan_m->detail_penjualan($id)->result(),
            'title'     => 'LAPORAN PENJUALAN'
        ];
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = preg_replace("([/])", '-', $data['header']->no_doc);
        $this->pdf->load_view('laporan/print_penjualan', $data);
    }

    public function reservasi_print()
    {
        $id = $this->input->post('id');
        $data = [
            'header'    => $this->laporan_m->get_reservasi($id)->row(),
            'body'      => $this->laporan_m->detail_reservasi($id)->result(),
            'title'     => 'LAPORAN RESERVASI'
        ];
        // var_dump($data);
        // die;
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = preg_replace("([/])", '-', $data['header']->no_doc);
        $this->pdf->load_view('laporan/print_reservasi', $data);
        // $this->load->view('laporan/print_reservasi', $data);
    }

    public function generate_penjualan()
    {
        $header = [
            'id'            => null,
            'no_doc'        => FormatNoTrans(penjualanAutoID(), '/PJ'),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('nama'),
            'doc_type'      => 1
        ];

        $this->laporan_m->generatePenjualan($header);

        $body = $this->laporan_m->getLastID()->row()->id;

        $penjualan = $this->kasir_m->geto()->result();
        $data = array();

        foreach($penjualan as $prd){ 
            array_push($data, array(
                'id'            => null,
                'doc_id'        => $body,
                'faktur'        => $prd->faktur,
                'total'         => $prd->total
            ));
        }
        $this->laporan_m->generate_penjualan($data);
        redirect('laporan/penjualan/');
    }

    public function generate_reservasi()
    {
        $header = [
            'id'            => null,
            'no_doc'        => FormatNoTrans(reservasiAutoID(), '/PJ'),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('nama'),
            'doc_type'      => 2
        ];

        $this->laporan_m->generateReservasi($header);

        $body = $this->laporan_m->getLastID()->row()->id;

        $reservasi = $this->reservation_m->get()->result();
        $data = array();

        foreach($reservasi as $prd){ 
            array_push($data, array(
                'id'            => null,
                'doc_id'        => $body,
                'nama'          => $prd->nama,
                'phone'         => $prd->phone,
                'status'        => $prd->status
            ));
        }
        $this->laporan_m->generate_reservasi($data);
        redirect('laporan/reservasi/');
    }

    public function penjualan()
    {
        $data = [
            'title'     => 'Laporan Penjualan',
            'penjualan' => $this->laporan_m->get_penjualan()->result()
        ];
        
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'laporan/penjualan', $data);
        } else {
            $param = [
                'tgl_awal'  => $this->input->post('tgl_awal') . ' 00:00:00',
                'tgl_akhir' => $this->input->post('tgl_akhir') . ' 23:59:59'
            ];
            $data = [
                'title'     => 'Laporan Penjualan',
                'penjualan' => $this->laporan_m->filter_penjualan($param)->result()
            ];
            $this->template->load('template', 'laporan/penjualan', $data);
        }
    }

    public function reservasi()
    {
        $data = [
            'title'     => 'Laporan Reservasi',
            'reservasi' => $this->laporan_m->get_reservasi()->result()
        ];
        
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'laporan/reservasi', $data);
        } else {
            $param = [
                'tgl_awal'  => $this->input->post('tgl_awal') . ' 00:00:00',
                'tgl_akhir' => $this->input->post('tgl_akhir') . ' 23:59:59'
            ];
            $data = [
                'title'     => 'Laporan Reservasi',
                'reservasi' => $this->laporan_m->filter_reservasi($param)->result()
            ];
            $this->template->load('template', 'laporan/reservasi', $data);
        }
    }

    public function generate_penjualan_periode()
    {
        $header = [
            'id'            => null,
            'no_doc'        => FormatNoTrans(penjualanAutoID(), '/PJ'),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('nama'),
            'doc_type'      => 1
        ];

        $this->laporan_m->generatePenjualan($header);

        $param = [
            'tgl_a'     => $this->input->post('tgl_a'),
            'tgl_b'     => $this->input->post('tgl_b')
        ];

        $body = $this->laporan_m->getLastID()->row()->id;

        $penjualan = $this->kasir_m->filter_kasir($param)->result();
        // print_r($penjualan);
        // die;
        $data = array();

        foreach($penjualan as $prd){ 
            array_push($data, array(
                'id'            => null,
                'doc_id'        => $body,
                'faktur'        => $prd->faktur,
                'total'         => $prd->total
            ));
        }
        $this->laporan_m->generate_penjualan($data);
        redirect('laporan/penjualan/');
    }

    // public function penjualan_print_filter()
    // {
    //     $param = [
    //         'tgl1'      => $this->input->post('tgl1'),
    //         'tgl1'      => $this->input->post('tgl1')
    //     ];

    //     $this->laporan_m->filter_cetak_penjualan($param);

    //     $data = [
    //         'header'    => $this->laporan_m->get_penjualan($id)->row(),
    //         'body'      => $this->laporan_m->detail_penjualan($id)->result(),
    //         'title'     => 'LAPORAN PENJUALAN'
    //     ];
        
    //     $this->load->library('pdf');
        
    //     $this->pdf->setPaper('A4', 'potrait');
    //     $this->pdf->filename = preg_replace("([/])", '-', $data['header']->no_doc);
    //     $this->pdf->load_view('laporan/print_penjualan', $data);
    // }

    // public function generate_penjualan_filter()
    // {
    //     $header = [
    //         'id'            => null,
    //         'no_doc'        => FormatNoTrans(penjualanAutoID(), '/PJ'),
    //         'created_at'    => date('Y-m-d H:i:s', time()),
    //         'created_by'    => $this->session->userdata('nama'),
    //         'doc_type'      => 1
    //     ];

    //     $this->laporan_m->generatePenjualan($header);

    //     $param = [
    //         'tgl1'      => $this->input->post('tgl1'),
    //         'tgl1'      => $this->input->post('tgl1')
    //     ];

    //     $this->laporan_m->filter_penjualan_cetak($param);

    //     $body = $this->laporan_m->getLastID()->row()->id;

    //     $penjualan = $this->kasir_m->geto()->result();
    //     $data = array();

    //     foreach($penjualan as $prd){ 
    //         array_push($data, array(
    //             'id'            => null,
    //             'doc_id'        => $body,
    //             'faktur'        => $prd->faktur,
    //             'total'         => $prd->total
    //         ));
    //     }
    //     $this->laporan_m->generate_penjualan($data);
    //     redirect('laporan/penjualan/');
    // }

}