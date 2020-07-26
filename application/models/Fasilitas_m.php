<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('fasilitas');
        if ($id != null) {
            $this->db->where('id_barang', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getMenu()
    {
        $this->db->from('fasilitas');
        $this->db->order_by('id_barang DESC');
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
        $this->db->insert('fasilitas', $param);
    }

    public function edit($param) // 
    {
        if ($param['foto_barang'] == null) {
            $this->db->set('nama_barang', $param['nama_barang']);
            $this->db->set('tipe_barang', $param['tipe_barang']);
            $this->db->set('status', $param['status']);
            $this->db->where('id_barang', $param['id_barang']);
            $this->db->update('fasilitas');
        } else {
            $this->db->set('nama_barang', $param['nama_barang']);
            $this->db->set('tipe_barang', $param['tipe_barang']);
            $this->db->set('status', $param['status']);
            $this->db->set('foto_barang', $param['foto_barang']);
            $this->db->where('id_barang', $param['id_barang']);
            $this->db->update('fasilitas');
        }
    }

    public function del($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('fasilitas');
    }
}
