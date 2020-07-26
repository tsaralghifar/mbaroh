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
        $this->db->where('booking_at >=', date('Y-m-d H:i:s', time()) . ' 00:00:00' .')');
        $this->db->where('booking_at <=', date('Y-m-d H:i:s', time()) . ' 23:59:59' .')');
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
        $this->db->where('id',$id);
        $this->db->update('reservation', $param);
    }

    public function edit($param) // 
    {
        if ($param['tf'] == null) {
            $this->db->update('reservation');
        } else {
            $this->db->set('tf', $param['tf']);
            $this->db->set('jumlah_tf', $param['jumlah_tf']);
            $this->db->set('total_k', $param['total_k']);
            $this->db->where('id', $param['id']);

            $this->db->update('reservation');
        }
    }

    public function reserve($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('reservation');
    }

    public function nota_header($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('reservation');
    }

    public function nota_line($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('reservation');
    }

}