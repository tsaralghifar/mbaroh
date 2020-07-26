<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('karyawan');
        if ($id != null) {
            $this->db->where('id_karyawan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getMenu()
    {
        $this->db->from('karyawan');
        $this->db->order_by('id_karyawan DESC');
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
        $this->db->insert('karyawan', $param);
    }

    public function edit($param) // 
    {
        if ($param['foto'] == null) {
            $this->db->set('nama_karyawan', $param['nama_karyawan']);
            $this->db->set('alamat', $param['alamat']);
            $this->db->where('id_karyawan', $param['id_karyawan']);
            $this->db->update('karyawan');
        } else {
            $this->db->set('nama_karyawan', $param['nama_karyawan']);
            $this->db->set('alamat', $param['alamat']);
            $this->db->set('foto', $param['foto']);
            $this->db->where('id_karyawan', $param['id_karyawan']);
            $this->db->update('karyawan');
        }
    }

    public function del($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->delete('karyawan');
    }
}
