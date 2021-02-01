<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservation_m extends CI_Model
{
    public function booking($param)
    {
        $this->db->insert('reservation', $param);
    }

    public function geto()
    {
        $this->db->where('booking_at >=', date('Y-m-d', time()) . ' 00:00:00' .')');
        $this->db->where('booking_at <=', date('Y-m-d', time()) . ' 23:59:59' .')');
        return $this->db->get('reservation');
    }

    public function get($param = null)
    {
        $this->db->select('reservation.*,book_status.status_b');
        $this->db->from('reservation');
        $this->db->join('book_status','book_status.id = reservation.status');
        if ($param != null){
            $this->db->where('status', $param);
        }
        $this->db->where("DATEDIFF(booking_at,now()) >= 0 OR status_bayar != 1", null,false);
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('booking_at', 'ASC');
        return $this->db->get();
    }

    public function check($param, $id)
    {
        $this->db->set('tag',$param['tag']);
        $this->db->set('status',$param['status']);
        $this->db->where('kode_booking',$id);
        $this->db->update('reservation', $param);
    }

    public function edit($param) // 
    {
        if ($param['tf'] == null) {
            $this->db->set('status_bayar', $param['status_bayar']);
            $this->db->set('total_k', $param['total_k']);
            $this->db->where('kode_booking', $param['kode_booking']);
            $this->db->update('reservation');
        } else {
            $this->db->set('status_bayar', $param['status_bayar']);
            $this->db->set('tf', $param['tf']);
            $this->db->set('total_k', $param['total_k']);
            $this->db->where('kode_booking', $param['kode_booking']);

            $this->db->update('reservation');
        }
    }

    public function reserve($id)
    {
        $this->db->where('kode_booking', $id);
        return $this->db->get('reservation');
    }

    public function nota_header($id)
    {
        $this->db->where('kode_booking', $id);
        return $this->db->get('reservation');
    }

    public function nota_line($id)
    {
        $this->db->where('kode_booking', $id);
        return $this->db->get('reservation');
    }

    public function makanan_line($kode_booking)
    {
        $this->db->select('reservation_detail.*,menu.nama_menu, menu.harga');
        $this->db->from('reservation_detail');
        $this->db->join('menu','reservation_detail.items = menu.menu_id');
        $this->db->join('reservation','reservation_detail.booking_id = reservation.kode_booking');
        $this->db->where('reservation.kode_booking',$kode_booking);
        return $this->db->get();
    }

    public function filter_reserve($param)
    {
        $this->db->where('booking_at >=', $param['tgl_a'] . ' 00:00:00');
        $this->db->where('booking_at <=', $param['tgl_b'] . ' 23:59:59');
        // $condition = "waktu_transaksi BETWEEN " . "'" . $param['tgl_a'] . "'" . " AND " . "'" . $param['tgl_b'] . "'";
        // $this->db->select("waktu_transaksi BETWEEN". $param['tgl_a']. 'AND' . $param['tgl_b']);
        // $this->db->where('waktu_transaksi',$condition);
        // $this->db->select();
        // $this->db->from('penjualan');
        // $this->db->where(' waktu_transaksi >= date("'.$param['tgl_a'].'")');
        // $this->db->where( 'waktu_transaksi <= date("'.$param['tgl_b'].'")');
        // $this->db->where('DATE(waktu_transaksi) >=', date('Y-m-d',strtotime($param['tgl_a'])));
        // $this->db->where('DATE(waktu_transaksi) <=', date('Y-m-d',strtotime($param['tgl_b'])));
        return $this->db->get('reservation');
    }

    // Home reserve

    public function addtocart($param)
    {
        $prod = $this->db->select('*')->from('cart_book')->where('menu_id', $param['menu_id'])->get()->row();
        // var_dump($prod->menu_id);
        // die;
        if ($this->input->post('product') == $prod->menu_id) {
            $this->db->set('qty', $param['qty']);
            $this->db->where('menu_id', $prod->menu_id);
            $this->db->update('cart_book');
        } else {
            $this->db->insert('cart_book', $param);
        }
    }

    public function get_cart($id = null)
    {
        // $this->db->select('menu.*, cart.id, cart.id, cart.qty');
        // $this->db->from('menu');
        // $this->db->join('cart', 'menu.menu_id = cart.menu_id');
        // return $this->db->get();

        $this->db->select('cart_book.*, menu.menu_id, menu.nama_menu, menu.harga');
        $this->db->from('cart_book');
        $this->db->join('menu', 'menu.menu_id = cart_book.menu_id');
        if ($id != null ){
            $this->db->where('menu.menu_id',$id);
        }
        return $this->db->get();
    }

    public function addtocartDetail($param)
    {
        $this->db->insert('cart_book_detail', $param);
    }

    public function grandTotal()
    {
        $query = "SELECT sum(subtotal) AS grand_total FROM cart_book_detail HAVING (sum(subtotal) > 0)";
        $execute = $this->db->query($query);
        if ($execute->row() == null) {
            return 0;
        }else{
            return $execute->row()->grand_total;
        }

        // $query = 'SELECT sum(subtotal) AS grand_total FROM cart_detail';
        // return $this->db->query($query)->row()->grand_total;
    }

    public function hapus($id)
    {
        $cart_id = $this->db->select('id')->where('menu_id', $id)->get('cart_book')->row()->id;
        $this->db->where('menu_id',$id);
        $this->db->delete('cart_book');
        $this->db->where('cart_id',$cart_id);
        $this->db->delete('cart_book_detail');
    }

    public function clear()
    {
        $this->db->query('DELETE FROM cart_book_detail');
        $this->db->query('DELETE FROM cart_book');
    }

    public function addDetail($no_invoice)
    {
        $this->db->query("INSERT INTO reservation_detail (id, booking_id, items, sold_qty) SELECT null, '$no_invoice', cart_book.menu_id, cart_book.qty FROM cart_book");
    }

    public function last_row()
    {
        return $this->db->from('reservation')->order_by('booking_at DESC')->limit(1)->get()->row();
    }

}