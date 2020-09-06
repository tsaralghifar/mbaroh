<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_m Extends CI_Model
{
    public function get_penjualan($param = null)
    {
        $this->db->where('doc_type', 1);
        if ($param !== null) {
            $this->db->where('id', $param);
        }
        $this->db->order_by('no_doc ASC');
        return $this->db->get('laporan');
    }

    public function get_reservasi($param = null)
    {
        $this->db->where('doc_type', 2);
        if ($param !== null) {
            $this->db->where('id', $param);
        }
        $this->db->order_by('created_at ASC');
        return $this->db->get('laporan');
    }

    public function get_pendapatan($param = null)
    {
        $this->db->where('doc_type', 2);
        if ($param !== null) {
            $this->db->where('id', $param);
        }
        $this->db->order_by('created_at ASC');
        return $this->db->get('laporan');
    }

    public function get_barang($param = null)
    {
        $this->db->where('doc_type', 4);
        if ($param !== null) {
            $this->db->where('id', $param);
        }
        $this->db->order_by('created_at ASC');
        return $this->db->get('laporan');
    }

    public function getLastID()
    {
        $this->db->from('laporan');
        $this->db->limit(1);
        $this->db->order_by('id DESC');
        return $this->db->get();
    }

    public function generate_penjualan($data)
    {
        $this->db->insert_batch('laporan_penjualan_detail', $data);
    }

    public function generate_reservasi($data)
    {
        $this->db->insert_batch('laporan_reservasi_detail', $data);
    }

    public function generate_barang($data)
    {
        $this->db->insert_batch('laporan_barang_detail', $data);
    }

    public function generatePenjualan($param)
    {
        $this->db->insert('laporan', $param);
    }

    public function generateReservasi($param)
    {
        $this->db->insert('laporan', $param);
    }

    public function generateBarang($param)
    {
        $this->db->insert('laporan', $param);
    }

    public function filter_penjualan($param)
    {
        $this->db->where('doc_type', 1);
        $this->db->where('created_at >=', $param['tgl_awal']);
        $this->db->where('created_at <=', $param['tgl_akhir']);
        return $this->db->get('laporan');
    }

    public function filter_reservasi($param)
    {
        $this->db->where('doc_type', 2);
        $this->db->where('created_at >=', $param['tgl_awal']);
        $this->db->where('created_at <=', $param['tgl_akhir']);
        return $this->db->get('laporan');
    }

    public function filter_barang($param)
    {
        $this->db->where('doc_type', 4);
        $this->db->where('created_at >=', $param['tgl_awal']);
        $this->db->where('created_at <=', $param['tgl_akhir']);
        return $this->db->get('laporan');
    }

    public function detail_penjualan($param)
    {
        $this->db->where('doc_id', $param);
        return $this->db->get('laporan_penjualan_detail');
    }

    public function detail_reservasi($param, $status)
    {
        $this->db->where('doc_id', $param);

        // foreach ($status as $key) {
            $this->db->where_in('status_bayar', $status);
        // }

        return $this->db->get('laporan_reservasi_detail');
    }

    public function detail_barang($param)
    {
        $this->db->where('doc_id', $param);
        return $this->db->get('laporan_barang_detail');
    }

    // public function filter_cetak_penjualan($param)
    // {
    //     $this->db->where('doc_type', 1);
    //     $this->db->select('laporan_penjualan_detail.*, penjualan.waktu_transaksi');
    //     $this->db->from('laporan_penjualan_detail');
    //     $this->db->where('waktu_transaksi >=', $param['tgl1']);
    //     $this->db->where('waktu_transaksi >=', $param['tgl2']);
    //     return $this->db->get('laporan_penjualan_detail');
    // }

    // public function filter_penjualan_cetak($param)
    // {
    //     $this->db->where('faktur', $param);
    //     $this->db->where('waktu_transaksi >=', $param['tgl1']);
    //     $this->db->where('waktu_transaksi <=', $param['tgl2']);
    //     return $this->db->get('penjualan');
    // }

}