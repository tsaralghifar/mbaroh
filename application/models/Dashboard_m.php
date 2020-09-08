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

  function getOmset()
  {
    $query =
      "SELECT 
        SUM(penjualan.total) AS omset,
        DATE_FORMAT(penjualan.waktu_transaksi, '%m/%d/%Y') AS periode,
        MONTHNAME(penjualan.waktu_transaksi) AS month_name,
        MONTH(penjualan.waktu_transaksi) AS indexOfMonth
      FROM
        penjualan
      WHERE 
        (penjualan.waktu_transaksi BETWEEN DATE_FORMAT(NOW(), '%Y-01-01') AND NOW())
      GROUP BY
        MONTHNAME(penjualan.waktu_transaksi)
      ORDER BY
        indexOfMonth ASC";

    return $this->db->query($query);
  }
}
