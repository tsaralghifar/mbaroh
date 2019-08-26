<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('menu');
        if ($id != null) {
            $this->db->where('menu_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getMenu()
    {
        $this->db->from('menu');
        $this->db->order_by('menu_id DESC');
        $this->db->limit(6);
        return $this->db->get();
    }

    public function add($post)
    {
        $params = [
            'nama_menu' => $post['nama_menu'],
            'kategori_menu' => $post['kategori_menu'],
            'harga' => $post['harga'],
            'gambar' => $post['gambar']
        ];
        $this->db->insert('menu', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_menu' => $post['nama_menu'],
            'kategori_menu' => $post['kategori_menu'],
            'harga' => $post['harga']
        ];
        if ($post['gambar'] != null) {
            $params['gambar'] = $post['gambar'];
        }
        $this->db->where('menu_id', $post['id']);
        $this->db->update('menu', $params);
    }

    public function del($id)
    {
        $this->db->where('menu_id', $id);
        $this->db->delete('menu');
    }
}
