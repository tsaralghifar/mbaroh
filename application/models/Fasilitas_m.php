<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas_m extends CI_Model
{

    // public function get($id = null)
    // {
    //     $this->db->from('fasilitas');
    //     if ($id != null) {
    //         $this->db->where('id', $id);
    //     }
    //     $query = $this->db->get();
    //     return $query;
    // }

    public function get($param = null)
    {
        $this->db->select('fasilitas.*,kategori_.nama_kategori');
        $this->db->from('fasilitas');
        $this->db->join('kategori_', 'kategori_.id = fasilitas.kategori');
        if ($param !== null) {
            $this->db->where('kategori', $param);
        }
        return $this->db->get();
    }

    public function get_barang($param = null)
    {
        $this->db->select('fasilitas.*,kategori_.nama_kategori');
        $this->db->from('fasilitas');
        $this->db->join('kategori_', 'kategori_.id = fasilitas.kategori');
        if ($param !== null) {
            $this->db->where('fasilitas.id', $param);
        }
        return $this->db->get();
    }

    public function getMenu()
    {
        $this->db->from('fasilitas');
        $this->db->order_by('id DESC');
        $this->db->limit(6);
        return $this->db->get();
    }

    public function get_kategori()
    {
        $this->db->from('kategori_');
        $this->db->order_by('id DESC');
        $this->db->limit(6);
        return $this->db->get();
    }

    public function get_keluar()
    {
        $this->db->from('barang_keluar');
        $this->db->order_by('id DESC');
        $this->db->limit(6);
        return $this->db->get();
    }

    public function get_stock()
    {
        return $this->db->query("SELECT unit FROM fasilitas ORDER BY id DESC LIMIT 1");
    }

    public function stockin($param)
    {
        $this->db->set('unit', $param['barang'] + $param['jumlah']);
        $this->db->where('id', $param['id']);
        $this->db->update('fasilitas');
    }

    public function track_stock($param)
    {
        $data = [
            'id'            => null,
            'id_brg'        => $param['id'],
            'jumlah'        => $param['jumlah'],
            'tanggal'       => date('Y-m-d H:i:s', time()),
            'created_by'    => $param['created_by']
        ];
        $this->db->insert('barang_masuk', $data);
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
            $this->db->where('id', $param['id']);
            $this->db->update('fasilitas');
        } else {
            $this->db->set('nama_barang', $param['nama_barang']);
            $this->db->set('tipe_barang', $param['tipe_barang']);
            $this->db->set('status', $param['status']);
            $this->db->set('foto_barang', $param['foto_barang']);
            $this->db->where('id', $param['id']);
            $this->db->update('fasilitas');
        }
    }

    public function add_cat($param)
    {
        $this->db->insert('kategori_', $param);
    }

    public function del($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('fasilitas');
    }
}
