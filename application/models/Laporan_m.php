<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{
  public function get_penjualan($param = null)
  {
    $this->db->where('doc_type', 1);
    if ($param !== null) {
      $this->db->where('id', $param);
    }
    $this->db->order_by('no_doc ASC');
    return $this->db->get('laporan');
  }

  public function get_reservasi($param = null)
  {
    $this->db->where('doc_type', 2);
    if ($param !== null) {
      $this->db->where('id', $param);
    }
    $this->db->order_by('created_at ASC');
    return $this->db->get('laporan');
  }

  public function get_pendapatan($param = null)
  {
    $this->db->where('doc_type', 2);
    if ($param !== null) {
      $this->db->where('id', $param);
    }
    $this->db->order_by('created_at ASC');
    return $this->db->get('laporan');
  }

  public function get_barang($param = null)
  {
    $this->db->where('doc_type', 4);
    if ($param !== null) {
      $this->db->where('id', $param);
    }
    $this->db->order_by('created_at ASC');
    return $this->db->get('laporan');
  }

  public function get_barang_masuk($param = null)
  {
    $this->db->where('doc_type', 5);
    if ($param !== null) {
      $this->db->where('id', $param);
    }
    $this->db->order_by('created_at ASC');
    return $this->db->get('laporan');
  }

  public function get_barang_keluar($param = null)
  {
    $this->db->where('doc_type', 6);
    if ($param !== null) {
      $this->db->where('id', $param);
    }
    $this->db->order_by('created_at ASC');
    return $this->db->get('laporan');
  }

  public function getLastID()
  {
    $this->db->from('laporan');
    $this->db->limit(1);
    $this->db->order_by('id DESC');
    return $this->db->get();
  }

  public function generate_penjualan($data)
  {
    $this->db->insert_batch('laporan_penjualan_detail', $data);
  }

  public function generate_reservasi($data)
  {
    $this->db->insert_batch('laporan_reservasi_detail', $data);
  }

  public function generate_barang($data)
  {
    $this->db->insert_batch('laporan_barang_detail', $data);
  }

  public function generate_barang_masuk($data)
  {
    $this->db->insert_batch('laporan_barangmasuk_detail', $data);
  }

  public function generate_barang_keluar($data)
  {
    $this->db->insert_batch('laporan_barangkeluar_detail', $data);
  }

  public function generatePenjualan($param)
  {
    $this->db->insert('laporan', $param);
  }

  public function generateReservasi($param)
  {
    $this->db->insert('laporan', $param);
  }

  public function generateBarang($param)
  {
    $this->db->insert('laporan', $param);
  }

  public function generateBarangMasuk($param)
  {
    $this->db->insert('laporan', $param);
  }

  public function generateBarangKeluar($param)
  {
    $this->db->insert('laporan', $param);
  }

  public function filter_penjualan($param)
  {
    $this->db->where('doc_type', 1);
    $this->db->where('created_at >=', $param['tgl_awal']);
    $this->db->where('created_at <=', $param['tgl_akhir']);
    return $this->db->get('laporan');
  }

  public function filter_reservasi($param)
  {
    $this->db->where('doc_type', 2);
    $this->db->where('created_at >=', $param['tgl_awal']);
    $this->db->where('created_at <=', $param['tgl_akhir']);
    return $this->db->get('laporan');
  }

  public function filter_barang($param)
  {
    $this->db->where('doc_type', 4);
    $this->db->where('created_at >=', $param['tgl_awal']);
    $this->db->where('created_at <=', $param['tgl_akhir']);
    return $this->db->get('laporan');
  }

  public function filter_barang_masuk($param)
  {
    $this->db->where('doc_type', 5);
    $this->db->where('created_at >=', $param['tgl_awal']);
    $this->db->where('created_at <=', $param['tgl_akhir']);
    return $this->db->get('laporan');
  }

  public function filter_barang_keluar($param)
  {
    $this->db->where('doc_type', 6);
    $this->db->where('created_at >=', $param['tgl_awal']);
    $this->db->where('created_at <=', $param['tgl_akhir']);
    return $this->db->get('laporan');
  }

  public function detail_penjualan($param)
  {
    $this->db->where('doc_id', $param);
    return $this->db->get('laporan_penjualan_detail');
  }

  public function detail_reservasi($param, $status)
  {
    $this->db->where('doc_id', $param);

    // foreach ($status as $key) {
    $this->db->where_in('status_bayar', $status);
    // }

    return $this->db->get('laporan_reservasi_detail');
  }

  public function detail_barang($param)
  {
    $this->db->where('doc_id', $param);
    return $this->db->get('laporan_barang_detail');
  }

  public function detail_barang_masuk($param)
  {
    $this->db->where('doc_id', $param);
    return $this->db->get('laporan_barangmasuk_detail');
  }

  public function detail_barang_keluar($param)
  {
    $this->db->where('doc_id', $param);
    return $this->db->get('laporan_barangkeluar_detail');
  }

  function dataPendapatan($dataFilter)
  {
    $query =
      "SELECT
        penjualan.faktur,
        penjualan.waktu_transaksi,
        penjualan.total,
        REPLACE(penjualan.faktur, penjualan.faktur, 'Penjualan') AS tipe
      FROM
        penjualan
      WHERE
        penjualan.waktu_transaksi >= '" . $dataFilter['tanggal_awal'] . "'
      AND 
        penjualan.waktu_transaksi <= '" . $dataFilter['tanggal_akhir'] . "'
      
      UNION ALL
      
      SELECT
        reservation.kode_booking,
        reservation.booking_at,
        reservation.total_k,
        REPLACE(reservation.kode_booking, reservation.kode_booking, 'Reservation') AS tipe
      FROM
        reservation
      WHERE
        reservation.booking_at >= '" . $dataFilter['tanggal_awal'] . "'
      AND 
        reservation.booking_at <= '" . $dataFilter['tanggal_akhir'] . "'
      AND  
        reservation.total_k > 0";

    return $this->db->query($query);
  }
}
