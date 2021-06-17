<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Produk');
		$this->load->helper(array('form', 'url'));
		$this->load->library('cart');

	}

	public function index()
	{
		$this->headTemplate();
		$data['terbaru']=$this->db->query('SELECT * FROM products ORDER BY created_at DESC LIMIT 3')->result();
		$this->load->view('ecommerce/index',$data);

		$member_id = $this->session->userdata('member_id');
		$check_promo = $this->db->query("SELECT count(id) as aktif FROM promotions WHERE end_date >= now() AND status = 1")->row();

		if($member_id != '' && $check_promo->aktif > 0 ){
			$promo = $this->db->query("SELECT * FROM promotions WHERE end_date >= now() AND status = 1")->row();
			$this->load->view('ecommerce/modal_voucher',$promo);
		} else if($member_id == ''){
			$this->load->view('ecommerce/modal_umum');
		}

		$this->load->view('ecommerce/Shop_footer');
			
	}

	public function product_grid()
	{
		$key = $this->input->get('cari');
		$this->headTemplate();

		if($key == ''){
			$data['produk']= $this->Model_Produk->displayProduct();
		} else {

			$data['produk']= $this->Model_Produk->searchProduct($key);

			if($data['produk']==NULL){
				$this->session->set_flashdata('message', 'Pencarian tidak ditemukan.');
			}else{
				$this->session->set_flashdata('message', 'Hasil pencarian');
			}
		}

		$this->load->view('ecommerce/product_grid',$data);
	}
	
	public function product_detail()
	{
		$this->headTemplate();
		$data['produk'] = $this->Model_Produk->detailProduct($this->input->post());
		$this->load->view('ecommerce/product_detail',$data);
	}

	public function confirmation()
	{
		$this->headTemplate();
		$this->load->view('ecommerce/confirmation');
		$this->load->view('ecommerce/Shop_footer');
	}

	public function confirmation_payment(){
		$code = strtoupper($this->input->post('code'));
		$email = $this->input->post('email');
		$nominal = $this->input->post('nominal');
		$account_number = $this->input->post('account_number');
		$account_name = $this->input->post('account_name');

		$get_order = "SELECT id, status FROM orders WHERE code = '".$code."'
						AND email = '".$email."'
						AND total_price = '".$nominal."'";

		$order = $this->db->query($get_order)->row();

		if($order == NULL){
			$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Transaksi tidak ditemukan</div>');
			redirect('ecommerce/confirmation');
		} elseif($order->status == 'Kadaluarsa'){
			$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Transaksi sudah kadaluarsa</div>');
			redirect('ecommerce/confirmation');
		}

		$evidence_transfer = $this->do_upload();

		$update_order = "UPDATE orders a SET a.account_number = '".$account_number."', a.account_name = '".$account_name."', a.evidence_transfer = '".$evidence_transfer."', a.status = 'Menunggu Verifikasi' WHERE a.id = '".$order->id."'";

		$this->db->query($update_order);

		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Konfirmasi berhasil dilakukan, dalam 1x24 Jam admin akan mengirim E-Mail verifikasi pembayaran</div>');
		redirect('ecommerce/confirmation');
	}

	public function history()
	{
		$this->headTemplate();
		$member_id = $this->session->userdata('member_id');
		$data['riwayat'] = $this->db->query("SELECT created_at, code, total_price, status, resi  from orders where member_id = '".$member_id."' ")->result_array();		
		$this->load->view('ecommerce/history', $data);
		$this->load->view('ecommerce/Shop_footer');
	}

	private function headTemplate(){
		$cart = $this->cart->contents();
		$data['total_cart'] = count($cart);
		$this->load->view('ecommerce/Shop_header');
		$this->load->view('ecommerce/Shop_navbar', $data);
	}

	public function getCost(){

		$destination = $this->input->post('city_id');
		$post = "origin=455&destination=".$destination."&weight=2000&courier=jne";
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $post,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: b1f5099b5679537ba2636f19697bb32e"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		$decode = json_decode($response, true);

		$name = $decode['rajaongkir']['results'][0]['name'];
		$cost = $decode['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
		$description = $decode['rajaongkir']['results'][0]['costs'][0]['description'];

		$data = [
			'name' => $name,
			'cost' => $cost,
			'description' => $description
		];

		if ($err) {
		echo "cURL Error #:" . $err;
		} else {
			echo json_encode($data);
		}


	}

	private function do_upload(){

    	$config['upload_path'] = './assets/struk/';
    	$config['allowed_types'] = 'jpg|png|JPEG';
    	$config['max_size'] = 1048;

    	$this->upload->initialize($config);
		$this->load->library('upload');

		if (!$this->upload->do_upload('evidence_transfer')) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Struk gagal diupload</div>');
			redirect('ecommerce/confirmation');
		}

		$file = $this->upload->data();
		return $file['file_name'];
	}

	public function checkVoucher(){
		$code = strtoupper($this->input->post('code'));
		$now = date('Y-m-d');
		$disc = 0;

		$sql = "SELECT discount FROM promotions WHERE code = '$code' AND end_date >= '$now' AND status = 1";

		$getDiscount = $this->db->query($sql)->row();

		if(!is_null($getDiscount)){
			$disc = $getDiscount->discount;
		}

		echo json_encode(['discount' => $disc]);
	}

}
