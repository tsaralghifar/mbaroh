<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservation_m extends CI_Model
{
    public function booking($param)
    {
        $this->db->insert('reservation', $param);
    }

    public function geto()
    {
        $this->db->where('booking_at >=', date('Y-m-d', time()) . ' 00:00:00' .')');
        $this->db->where('booking_at <=', date('Y-m-d', time()) . ' 23:59:59' .')');
        return $this->db->get('reservation');
    }

    public function get($param = null)
    {
        $this->db->select('reservation.*,book_status.status_b');
        $this->db->from('reservation');
        $this->db->join('book_status','book_status.id = reservation.status');
        if ($param != null){
            $this->db->where('status', $param);
        }
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('booking_at', 'ASC');
        return $this->db->get();
    }

    public function check($param, $id)
    {
        $this->db->set('tag',$param['tag']);
        $this->db->set('status',$param['status']);
        $this->db->where('kode_booking',$id);
        $this->db->update('reservation', $param);
    }

    public function edit($param) // 
    {
        if ($param['tf'] == null) {
            $this->db->set('status_bayar', $param['status_bayar']);
            $this->db->set('total_k', $param['total_k']);
            $this->db->where('kode_booking', $param['kode_booking']);
            $this->db->update('reservation');
        } else {
            $this->db->set('status_bayar', $param['status_bayar']);
            $this->db->set('tf', $param['tf']);
            $this->db->set('total_k', $param['total_k']);
            $this->db->where('kode_booking', $param['kode_booking']);

            $this->db->update('reservation');
        }
    }

    public function reserve($id)
    {
        $this->db->where('kode_booking', $id);
        return $this->db->get('reservation');
    }

    public function nota_header($id)
    {
        $this->db->where('kode_booking', $id);
        return $this->db->get('reservation');
    }

    public function nota_line($id)
    {
        $this->db->where('kode_booking', $id);
        return $this->db->get('reservation');
    }

    public function filter_reserve($param)
    {
        $this->db->where('booking_at >=', $param['tgl_a'] . ' 00:00:00');
        $this->db->where('booking_at <=', $param['tgl_b'] . ' 23:59:59');
        // $condition = "waktu_transaksi BETWEEN " . "'" . $param['tgl_a'] . "'" . " AND " . "'" . $param['tgl_b'] . "'";
        // $this->db->select("waktu_transaksi BETWEEN". $param['tgl_a']. 'AND' . $param['tgl_b']);
        // $this->db->where('waktu_transaksi',$condition);
        // $this->db->select();
        // $this->db->from('penjualan');
        // $this->db->where(' waktu_transaksi >= date("'.$param['tgl_a'].'")');
        // $this->db->where( 'waktu_transaksi <= date("'.$param['tgl_b'].'")');
        // $this->db->where('DATE(waktu_transaksi) >=', date('Y-m-d',strtotime($param['tgl_a'])));
        // $this->db->where('DATE(waktu_transaksi) <=', date('Y-m-d',strtotime($param['tgl_b'])));
        return $this->db->get('reservation');
    }

}