<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('Model_Location');
		$ver=$this->session->userdata('member_id');
		if($ver == ''){
			redirect('auth');
		}
	}


	public function index()
	{
		$member_id = $this->session->userdata('member_id');
		$data['profil']=$this->db->query("SELECT * FROM members WHERE id = '$member_id'")->row();
		$data['locations'] = $this->Model_Location->getState();
		$this->headTemplate();
		$this->load->view('ecommerce/account',$data);
		$this->load->view('ecommerce/Shop_footer');
	}

	public function update(){
		$member_id = $this->session->userdata('member_id');
		$user_id = $this->session->userdata('user_id');
		$nama = htmlspecialchars($this->input->post("name", true));
		$jk = $this->input->post("gender", true);
		$email = $this->input->post("email", true);
        $pwd = $this->input->post("password", true);
        $tlp = $this->input->post("phone", true);
        $prov = $this->input->post("state", true);
        $kab = $this->input->post("city", true);
        $kec = $this->input->post("district", true);
        $pos = $this->input->post("postal_code", true);
        $alamat = $this->input->post("address", true);

		$data_user=[
			'email' => $email,
			'password' => password_hash($pwd, PASSWORD_BCRYPT)
		];

		$where = array(
			'id' => $user_id
		);

		$this->db->where($where);
		$this->db->update('users',$data_user);


		$data_pel=[
			'name' => $nama,
			'gender' => $jk,
			'email' => $email,
			'phone' => $tlp,
			'address' => $alamat,
			'state' => $prov,
			'city' => $kab,
			'district' => $kec,
			'postal_code' => $pos
		];

		$where = array(
			'id' => $member_id
		);

		$this->db->where($where);
		$this->db->update('members',$data_pel);


		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Profil berhasil diupdate</div>');

	}

	private function headTemplate(){
		$cart = $this->cart->contents();
		$data['total_cart'] = count($cart);
		$this->load->view('ecommerce/Shop_header');
		$this->load->view('ecommerce/Shop_navbar', $data);
	}


}