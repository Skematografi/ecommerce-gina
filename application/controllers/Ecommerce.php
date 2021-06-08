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
		$this->load->view('ecommerce/Shop_footer');
			
	}

	public function product_grid()
	{
		$this->headTemplate();
		$data['produk']= $this->Model_Produk->displayProduct();
		$this->load->view('ecommerce/product_grid',$data);

	}
	
	public function product_detail()
	{
		$this->headTemplate();
		$data['produk'] = $this->Model_Produk->detailProduct($this->input->post());
		$this->load->view('ecommerce/product_detail',$data);
	}

	public function product_search()
	{
		$cari = $this->input->get('cari');

		$this->load->view('ecommerce/Shop_header');
		$this->load->view('ecommerce/Shop_navbar');
		$this->db->like('kategori',$cari);
		$data['produk']= $this->db->get('produk')->result();
		if($data['produk']==NULL){
			$this->session->set_flashdata('message', 'Pencarian tidak ditemukan.');
		}else{
			$this->session->set_flashdata('message', 'Hasil pencarian');
		}
		$this->load->view('ecommerce/product_grid',$data);
		$this->load->view('ecommerce/Shop_footer');

	}

	public function contact()
	{
		$this->headTemplate();
		$this->load->view('ecommerce/contact');
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

}
