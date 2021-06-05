<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Model_Pelanggan extends CI_Model {

	public function auto_id(){
		$this->db->select('RIGHT(pelanggan.id_pelanggan,3) as auto', FALSE);
		$this->db->order_by('id_pelanggan', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get('pelanggan');
		if($query->num_rows() <> 0){
			$data = $query->row();
			$auto = intval($data->auto) + 1;
		}else{
			$auto = 1;

		}

		$automax = str_pad($auto,3, "0", STR_PAD_LEFT);
		$autofix = "PLGN".$automax;
		return $autofix;
	}

	public function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function getData(){

		$sql="SELECT a.id,a.user_id,a.name,a.email,a.phone,a.gender,a.address,a.state,a.city,a.district,a.postal_code
				FROM members a WHERE a.status = 1
				ORDER BY a.created_at DESC";

		$query = $this->db->query($sql);

		return $query->result_array();
	}

	public function hapus($id, $data){
		$this->db->where(['id' => $id]);
		$this->db->update('members', $data);
	}

}
