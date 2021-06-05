<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Model_Promo extends CI_Model {

	public function tambah($data){
	   try{
	      $this->db->insert('promotions', $data);
	      return true;
	    }catch(Exception $e){
			return $e;
	    }
	}

	public function hapus($id, $data){
		$this->db->where(['id' => $id]);
		$this->db->update('promotions', $data);
	}

	public function update($id,$data){
        try{
            $this->db->where(['id' => $id]);
            $this->db->update('promotions', $data);
            return true;
        }catch(Exception $e){
            return $e;
        }
	}

	public function getData(){

		$sql="SELECT a.id,a.code,a.name,a.description,a.start_date,a.end_date,a.discount
				FROM promotions a WHERE a.status = 1
				ORDER BY a.start_date DESC";

		$query = $this->db->query($sql);

		return $query->result_array();
	}

	public function getProductById($id){

		$sql="SELECT a.id,a.code,a.name,a.description,a.start_date,a.end_date,a.discount
				FROM promotions a WHERE a.id = '".$id."' AND a.status = 1";

		$query = $this->db->query($sql);

		return $query->result();
	}

    public function getProductByCode($code){

		$sql="SELECT a.id as total FROM promotions a WHERE a.code = '".$code."'";

		$query = $this->db->query($sql);

		return $query->num_rows();
	}

}
