<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Order extends CI_Model {

	public function getOrder()
    {   
        $sql = "SELECT a.id, a.code, a.name, a.created_at,CONCAT(a.address,', ',a.district,', ',a.city,', ',a.state) as address, a.phone, a.evidence_transfer, a.account_name, a.account_number, a.total_price ,a.shipping_cost
		FROM orders a
		WHERE a.status = 'Menunggu Verifikasi' AND a.evidence_transfer IS NOT NULL";

		$data = $this->db->query($sql)->result();

		return $data;
    }

    public function getSales()
    {   
        $sql = "SELECT a.id, a.code, a.name, a.created_at,CONCAT(a.address,', ',a.district,', ',a.city,', ',a.state) as address, a.phone, a.evidence_transfer, a.account_name, a.account_number, a.total_price ,a.shipping_cost
		FROM orders a
		WHERE a.status = 'Selesai' AND a.evidence_transfer IS NOT NULL";

		$data = $this->db->query($sql)->result();

		return $data;
    }

    public function getOrderDetail($id){
        $sql = "SELECT b.code, b.name, b.size, a.quantity
                FROM order_details a
                LEFT JOIN products b ON b.id = a.product_id 
                WHERE a.order_id = '$id'";

        $products = $this->db->query($sql)->result();
        $data = array();

        foreach($products as $item){
            $data[] = 'Kode : <b>'.$item->code.'</b><br>Nama : <br><b>'.$item->name.'</b><br>Ukuran : <b>'.$item->size.'</b><br>Jumlah : <b>'.$item->quantity.'</b><hr>';
        }

        $implode = implode(',', $data);
        $replace = str_replace(',','',$implode);

        return $replace;
    }

    public function updateStock($id){
        $sql = "SELECT a.product_id as id, (b.stock-a.quantity) as remaining_stock
                FROM order_details a 
                LEFT JOIN products b
                ON b.id = a.product_id
                WHERE a.order_id ='$id'";

        $products = $this->db->query($sql)->result();

        foreach($products as $item){
            $this->db->query("UPDATE products SET stock = '$item->remaining_stock' WHERE id = '$item->id'");
        }

        return true;
    }
 
}
