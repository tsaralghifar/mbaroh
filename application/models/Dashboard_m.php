<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{
    public function get_penjualan()
    {
        $query = "SELECT COUNT(faktur) as total FROM penjualan";
        $execute = $this->db->query($query);
        if ($execute->row() == null) {
            return null;
        } else {
            return $this->db->query($query)->row()->total;
        }
    }
}
