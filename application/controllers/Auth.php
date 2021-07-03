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

	    $user = $this->db->query("SELECT a.id,a.user_id,a.name,a.phone,a.gender,a.address,a.state,a.city,a.district,a.postal_code, b.email, b.password,b.role_id FROM members a
								JOIN users b ON b.email = a.email
								WHERE b.status = 1 AND b.email = '".$email."'")->row_array();

	    if($user){

	    		if(password_verify($password,$user['password'])){
	    			$data = [
	    				'email' => $user['email'],
	    				'password' => $user['password'],
	    				'name' => $user['name'],
	    				'user_id' => $user['user_id'],
	    				'member_id' => $user['id'],
						'role_id' => $user['role_id']

	    			];

	    			if($user['role_id']==1){
	    				$this->session->set_userdata($data);
	    				redirect('dashboard');
	    			}elseif($user['role_id']==2){
	    				$this->session->set_userdata($data);
	    				redirect('ecommerce');
	    			}else{
	    				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Maaf Akun anda di non aktifkan!</div>');
	    				redirect('auth');
	    			}
	    			
	    		}else{
	    			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Password salah!</div>');
	    			redirect('auth');
	    		}

	    }else{
	    	$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Email tidak ditemukan!</div>');
	    	redirect('auth');
	    }

	}


	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('member_id');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Anda telah berhasil keluar.</div>');
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
	    $email_user = $this->db->get_where('users', ['email' => $email])->row_array();
	    $email_member = $this->db->get_where('members', ['email' => $email])->row_array();

	    if($email_user || $email_member){

			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Email sudah terdaftar!</div>');
			redirect('auth/register');

		}else{

	    	if($password1 != $password2){
	    		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Password tidak sama!</div>');
	    		redirect('auth/register');

	    	}else{

	    		$data_user = array(
					'email' => $email,
					'password' => password_hash($password1, PASSWORD_BCRYPT)
				);

				$this->db->insert('users',$data_user);
				$insert_id = $this->db->insert_id();

				$data_member = array(
					'user_id' => $insert_id,
					'name' => $nama,
					'email' => $email
				);

				$this->db->insert('members',$data_member);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Pendaftaran berhasil, silahkan masuk.</div>');
				redirect('auth');
			}
	    }	
	}

	
	public function forget_password(){
		$this->load->view('auth/auth_header');
		$this->load->view('auth/forgot_password'); 
		$this->load->view('auth/auth_footer');
	}

	public function reset_password(){
		$email = $this->input->post('email');

		$check_email = $this->db->query("SELECT a.*, b.name
										FROM users a 
										LEFT JOIN members b ON b.user_id = a.id
										WHERE a.email = '$email' AND a.role_id = 2")->row();

		if(!$check_email){
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Email tidak terdaftar!</div>');
			redirect('auth/forget_password');
		}
		
		$create_pwd = $this->generateRandomString(8);
		$password = password_hash($create_pwd, PASSWORD_BCRYPT);

		$update_user = $this->db->query("UPDATE users SET password = '$password' WHERE  id = '$check_email->id' ");

		if($update_user){

			$data = [
				'email' => $check_email->email,
				'password' => $create_pwd,
				'name' => $check_email->name
			];

			$this->sendEmail($data);

			$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Password baru telah dikirim ke email anda.</div>');
			redirect('auth/forget_password');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Password gagal diperbarui!</div>');
			redirect('auth/forget_password');
		}


	}

	function sendEmail($data){

        $this->email->from('admin@gudangbuku.com', 'Gudang Buku');

		$this->email->to($data['email']);
 
		$this->email->subject('Password Baru');
        
        $this->email->message($this->load->view('reset_password',$data, true));

		$this->email->set_mailtype('html');

		$this->email->send();
    }

	public function generateRandomString($length = 10) {
        $characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
