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
	      $this->db->insert('products', $data);
	      return true;
	    }catch(Exception $e){
			return $e;
	    }
	}

	public function hapus($id, $data){
		$this->db->where(['id' => $id]);
		$this->db->update('products', $data);
	}

	public function update($id,$data){
		$this->db->where(['id' => $id]);
		$this->db->update('products', $data);
	}

	public function getData(){

		$sql="SELECT a.id,a.code,a.name,a.description,a.category,a.image,a.weight,a.size,a.price,a.stock
				FROM products a WHERE a.status = 1
				ORDER BY a.created_at DESC, a.stock DESC";

		$query = $this->db->query($sql);

		return $query->result_array();
	}

	public function getProductById($id){

		$sql="SELECT a.id,a.code,a.name,a.description,a.category,a.image,a.weight,a.size,a.price,a.stock
				FROM products a WHERE a.id = '".$id."' AND a.status = 1";

		$query = $this->db->query($sql);

		return $query->result();
	}

}
