<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	function __construct(){
		parent::__construct();
		$ver=$this->session->userdata('status');
		$ver2=$this->session->userdata('id_role');
		if($ver == 0 || $ver2 == 2){
			redirect('ecommerce');
		}
	}


	public function index()
	{
		
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/asidebar');
		$email=$this->session->userdata('email');
		$data['profil']= $this->db->get_where('user', array('email' => $email))->result();
		$this->load->view('dashboard/profil',$data);
		$this->load->view('dashboard/footer');
	}

	public function update(){
		$id=$this->input->post('id',true);
		$user = htmlspecialchars($this->input->post("nama", true));
		$email = $this->input->post("email", true);
        $password = $this->input->post("password", true);

		$data=[
			'nama' => $user,
			'email' => $email,
			'password' => password_hash($password, PASSWORD_BCRYPT)
		];

		$where = array(
			'id_user' => $id
		);

		$this->db->where($where);
		$this->db->update('user',$data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil berhasil di update</div>');
		redirect('Profil');
	}




























}