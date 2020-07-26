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
        $this->db->insert('menu', $param);
    }

    public function edit($param) // 
    {
        if ($param['gambar'] == null) {
            $this->db->set('nama_menu', $param['nama_menu']);
            $this->db->set('kategori_menu', $param['kategori_menu']);
            $this->db->set('harga', $param['harga']);
            $this->db->where('menu_id', $param['menu_id']);
            $this->db->update('menu');
        } else {
            $this->db->set('nama_menu', $param['nama_menu']);
            $this->db->set('kategori_menu', $param['kategori_menu']);
            $this->db->set('harga', $param['harga']);
            $this->db->set('gambar', $param['gambar']);
            $this->db->where('menu_id', $param['menu_id']);
            $this->db->update('menu');
        }
    }

    public function nota_header()
    {
        $this->db->where('menu_id');
        return $this->db->get('menu');
    }

    public function nota_line($data)
    {
        $this->db->where('menu_id');
        return $this->db->get('menu');
    }

    public function del($id)
    {
        $this->db->where('menu_id', $id);
        $this->db->delete('menu');
    }
}
