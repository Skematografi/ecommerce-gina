<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Model_Produk extends CI_Model {

	public function auto_id(){
		$this->db->select('RIGHT(produk.id_produk,3) as auto', FALSE);
		$this->db->order_by('id_produk', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get('produk');
		if($query->num_rows() <> 0){
			$data = $query->row();
			$auto = intval($data->auto) + 1;
		}else{
			$auto = 1;

		}

		$automax = str_pad($auto,3, "0", STR_PAD_LEFT);
		$autofix = "PROD".$automax;
		return $autofix;
	}

	public function tambah_produk($data){
	   try{
	      $this->db->insert('produk', $data);
	      return true;
	    }catch(Exception $e){
	    }
	}

	public function hapus($data,$table){
		return $this->db->delete($table,$data);
	}

	public function edit($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}
