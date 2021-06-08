<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Model_Cart extends CI_Model {

    public function id_order(){
        $this->db->select('RIGHT(pesanan.id_pesanan,3) as auto', FALSE);
        $this->db->order_by('id_pesanan', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('pesanan');
        if($query->num_rows() <> 0){
            $data = $query->row();
            $auto = intval($data->auto) + 1;
        }else{
            $auto = 1;

        }

        $automax = str_pad($auto,3, "0", STR_PAD_LEFT);
        $autofix = "ODR".$automax;
        return $autofix;
    }

	public function get_produk_all()
    {
        $query = $this->db->get('produk');
        return $query->result_array();
    }

    public function generateRandomString($length = 10, $phone) {
        $characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $phone.$randomString;
    }
 
}
