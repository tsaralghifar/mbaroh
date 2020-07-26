<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_m extends CI_Model {

    public function addtocart($param)
    {
        $prod = $this->db->select('*')->from('cart')->where('menu_id', $param['menu_id'])->get()->row();
        // var_dump($prod->menu_id);
        // die;
        if ($this->input->post('product') == $prod->menu_id) {
            $this->db->set('qty', $param['qty']);
            $this->db->where('menu_id', $prod->menu_id);
            $this->db->update('cart');
        } else {
            $this->db->insert('cart', $param);
        }
    }

    // public function getCartDetail()
    // {
    //     $this->db->select
    // }
    public function geto()
    {
        $this->db->where('waktu_transaksi >=', date('Y-m-d', time()) . ' 00:00:00' .')');
        $this->db->where('waktu_transaksi <=', date('Y-m-d', time()) . ' 23:59:59' .')');
        return $this->db->get('penjualan');
    }

    public function get($id = null)
    {
        // $this->db->select('menu.*, cart.id, cart.id, cart.qty');
        // $this->db->from('menu');
        // $this->db->join('cart', 'menu.menu_id = cart.menu_id');
        // return $this->db->get();

        $this->db->select('cart.*, menu.menu_id, menu.nama_menu, menu.harga');
        $this->db->from('cart');
        $this->db->join('menu', 'menu.menu_id = cart.menu_id');
        if ($id != null ){
            $this->db->where('menu.menu_id',$id);
        }
        return $this->db->get();
    }

    public function grandTotal()
    {
        $query = "SELECT sum(subtotal) AS grand_total FROM cart_detail HAVING (sum(subtotal) > 0)";
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
        $cart_id = $this->db->select('id')->where('menu_id', $id)->get('cart')->row()->id;
        $this->db->where('menu_id',$id);
        $this->db->delete('cart');
        $this->db->where('cart_id',$cart_id);
        $this->db->delete('cart_detail');
    }

    public function addtocartDetail($param)
    {
        $this->db->insert('cart_detail', $param);
    }

    public function proses($param)
    {
        $this->db->insert('penjualan',$param);
    }

    public function last_row()
    {
        return $this->db->from('penjualan')->order_by('waktu_transaksi DESC')->limit(1)->get()->row();
    }

    public function addDetail($no_invoice)
    {
        $this->db->query("INSERT INTO penjualan_detail (id, faktur_id, items, sold_qty) SELECT null, '$no_invoice', cart.menu_id, cart.qty FROM cart");
    }

    public function nota_header($faktur)
    {
        $this->db->where('faktur', $faktur);
        return $this->db->get('penjualan');
    }

    public function nota_line($faktur)
    {
        $this->db->select('penjualan_detail.*,menu.nama_menu, menu.harga');
        $this->db->from('penjualan_detail');
        $this->db->join('menu','penjualan_detail.items = menu.menu_id');
        $this->db->join('penjualan','penjualan_detail.faktur_id = penjualan.faktur');
        $this->db->where('penjualan.faktur',$faktur);
        return $this->db->get();
    }

    public function clear()
    {
        $this->db->query('DELETE FROM cart_detail');
        $this->db->query('DELETE FROM cart');
    }

    public function filter_kasir($param)
    {
        $this->db->where('waktu_transaksi >=', $param['tgl_a'] . ' 00:00:00');
        $this->db->where('waktu_transaksi <=', $param['tgl_b'] . ' 23:59:59');
        // $condition = "waktu_transaksi BETWEEN " . "'" . $param['tgl_a'] . "'" . " AND " . "'" . $param['tgl_b'] . "'";
        // $this->db->select("waktu_transaksi BETWEEN". $param['tgl_a']. 'AND' . $param['tgl_b']);
        // $this->db->where('waktu_transaksi',$condition);
        // $this->db->select();
        // $this->db->from('penjualan');
        // $this->db->where(' waktu_transaksi >= date("'.$param['tgl_a'].'")');
        // $this->db->where( 'waktu_transaksi <= date("'.$param['tgl_b'].'")');
        // $this->db->where('DATE(waktu_transaksi) >=', date('Y-m-d',strtotime($param['tgl_a'])));
        // $this->db->where('DATE(waktu_transaksi) <=', date('Y-m-d',strtotime($param['tgl_b'])));
        return $this->db->get('penjualan');
    }

}