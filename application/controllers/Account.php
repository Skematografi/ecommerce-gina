<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct(){
		parent::__construct();
		$ver=$this->session->userdata('status');
		if($ver == 0){
			redirect('auth');
		}
	}


	public function index()
	{
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$data['profil']=$this->db->query("
	    		SELECT * FROM pelanggan
				JOIN user
				ON user.email = pelanggan.email
				WHERE pelanggan.id_pelanggan = '$id_pelanggan'
	    	")->result_array();
		$this->load->view('ecommerce/Shop_header');
		$this->load->view('ecommerce/Shop_navbar');
		$this->load->view('ecommerce/account',$data);
		$this->load->view('ecommerce/Shop_footer');
	}

	public function update(){
		$id_user=$this->input->post('id_user',true);
		$id_pel=$this->input->post('id_pelanggan',true);
		$nama = htmlspecialchars($this->input->post("nama", true));
		$jk = $this->input->post("jenis_kelamin", true);
		$email = $this->input->post("email", true);
        $pwd = $this->input->post("password", true);
        $tlp = $this->input->post("telpon", true);
        $prov = $this->input->post("provinsi", true);
        $kab = $this->input->post("kabupaten", true);
        $kec = $this->input->post("kecamatan", true);
        $pos = $this->input->post("kode_pos", true);
        $alamat = $this->input->post("alamat", true);

		$data_user=[
			'nama' => $nama,
			'email' => $email,
			'password' => password_hash($pwd, PASSWORD_BCRYPT)
		];

		$where = array(
			'id_user' => $id
		);

		$this->db->where($where);
		$this->db->update('user',$data_user);


		$data_pel=[
			'nama' => $nama,
			'jenis_kelamin' => $jk,
			'email' => $email,
			'telpon' => $tlp,
			'alamat' => $alamat,
			'provinsi' => $prov,
			'kabupaten' => $kab,
			'kecamatan' => $kec,
			'kode_pos' => $pos
		];

		$where = array(
			'id_pelanggan' => $id_pel
		);

		$this->db->where($where);
		$this->db->update('pelanggan',$data_pel);


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil berhasil di update</div>');
		redirect('account');
	}


}