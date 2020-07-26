<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feedback_m extends CI_Model
{

    public function get($rateIndex = null)
    {
        $this->db->from('feedback');
        if ($rateIndex != null) {
            $this->db->where('rateIndex', $rateIndex);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getMenu()
    {
        $this->db->from('feedback');
        $this->db->order_by('id DESC');
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

    public function add($data)
    {
        $this->db->insert('feedback', $data);
    }

   
}
