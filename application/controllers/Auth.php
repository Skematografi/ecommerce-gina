<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('Model_Pelanggan');
	}

	public function index()
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run() == false){
			$this->load->view('auth/auth_header');
			$this->load->view('auth/login'); 
			$this->load->view('auth/auth_footer');
		}else{
			//validasi sukses
			$this->_login();
		}
	}


	private function _login(){
	    $email = $this->input->post('email');  
	    $password = $this->input->post('password'); 

	    $user=$this->db->query("
	    		SELECT * FROM pelanggan
				JOIN user
				ON user.email = pelanggan.email
				WHERE user.email = '$email'
	    	")->row_array();

	    if($user){

	    		if(password_verify($password,$user['password'])){
	    			$data = [
	    				'email' => $user['email'],
	    				'password' => $user['password'],
	    				'nama' => $user['nama'],
	    				'id_pelanggan' => $user['id_pelanggan'],
	    				'id_user' => $user['id_user'],
	    				'id_role' => $user['id_role'],
	    				'status' => $user['status']

	    			];
	    			if($user['id_role']==1 AND $user['status']==1){
	    				$this->session->set_userdata($data);
	    				redirect('dashboard');
	    			}elseif($user['id_role']==2 AND $user['status']==1){
	    				$this->session->set_userdata($data);
	    				redirect('ecommerce');
	    			}else{
	    				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf Account anda di non aktifkan!</div>');
	    				redirect('auth');
	    			}
	    			
	    		}else{
	    			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
	    			redirect('auth');
	    		}

	    }else{
	    	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak ditemukan!</div>');
	    	redirect('auth');
	    }

	}


	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('id_role');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('id_pelanggan');

		$this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">Anda telah berhasil keluar.</div>');
		redirect('ecommerce');
	}

	public function register()
	{
		$this->form_validation->set_rules('nama','Username','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password1','Password','trim|required');
		$this->form_validation->set_rules('password2','Password Confirmation','trim|required');

		if($this->form_validation->run() == false){
			$data['title'] = 'Login Page';
			/*$this->load->view('layouts/auth_header',$data);*/
			$this->load->view('auth/auth_header');
			$this->load->view('auth/register'); 
			$this->load->view('auth/auth_footer');
		}else{
			//validasi sukses
			$this->_process();
		}

	}

	private function _process()
	{	
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');  
	    $password1 = $this->input->post('password1'); 
	    $password2 = $this->input->post('password2');
	    $id_role=2;
	    $status=1;
	    $id=$this->Model_Pelanggan->auto_id(); 

	    $user = $this->db->get_where('pelanggan', ['email' => $email])->row_array();

	    if($user){
	    		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email sudah terdaftar!</div>');
	    	redirect('auth/register');
	    }else{
	    	if($password1 != $password2){
	    		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak sama!</div>');
	    	redirect('auth/register');
	    	}else{
	    		$data_user = array(
					'nama' => $nama,
					'email' => $email,
					'password' => password_hash($password1, PASSWORD_BCRYPT),
					'id_role' => $id_role,
					'status' => $status
				);

				$data_pelanggan = array(
					'id_pelanggan' => $id,
					'nama' => $nama,
					'email' => $email
				);
				$this->db->insert('user',$data_user);
				$this->db->insert('pelanggan',$data_pelanggan);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran berhasil, silahkan masuk.</div>');
				redirect('auth');
			}
	    }	
	}

	public function forget()
	{
		$this->load->view('auth/auth_header');
		$this->load->view('auth/forgot_password');
		$this->load->view('auth/auth_footer');

	}
}
