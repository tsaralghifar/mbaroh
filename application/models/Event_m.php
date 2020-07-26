<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('event');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getMenu()
    {
        $this->db->from('event');
        $this->db->order_by('status DESC');
        $this->db->limit(6);
        return $this->db->get();
    }

    // public function adds($post)
    // {
    //     $params = [
    //         'nama_menu' => $post['nama_menu'],
    //         'kategori_menu' => $post['kategori_menu'],
    //         'harga' => $post['harga'],
    //         'gambar' => $post['gambar']
    //     ];
    //     $this->db->insert('menu', $params);
    // }

    public function add($param)
    {
        $this->db->insert('event', $param);
    }

    public function edit($param) // 
    {
        if ($param['foto'] == null) {
            $this->db->set('nama_event', $param['nama_event']);
            $this->db->set('kegiatan', $param['kegiatan']);
            $this->db->set('status', $param['status']);
            $this->db->set('tgl', $param['tgl']);
            $this->db->where('id', $param['id']);
            $this->db->update('event');
        } else {
            $this->db->set('nama_event', $param['nama_event']);
            $this->db->set('kegiatan', $param['kegiatan']);
            $this->db->set('foto', $param['foto']);
            $this->db->set('status', $param['status']);
            $this->db->set('tgl', $param['tgl']);
            $this->db->where('id', $param['id']);
            $this->db->update('event');
        }
    }

    public function del($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('event');
    }
}
