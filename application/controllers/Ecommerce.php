<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('cart');
	}

	public function index()
	{
		$this->load->view('ecommerce/Shop_header');
		$this->load->view('ecommerce/Shop_navbar');
		$data['terbaru']=$this->db->query('SELECT * FROM produk ORDER BY id_produk DESC LIMIT 3')->result();
		$this->load->view('ecommerce/index',$data);
		$this->load->view('ecommerce/Shop_footer');
			
	}

	public function product_grid()
	{
		$this->load->view('ecommerce/Shop_header');
		$this->load->view('ecommerce/Shop_navbar');
		$data['produk']= $this->db->query('SELECT * FROM produk WHERE stok > 0')->result();
		$this->load->view('ecommerce/product_grid',$data);

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
		$this->load->view('ecommerce/Shop_header');
		$this->load->view('ecommerce/Shop_navbar');
		$this->load->view('ecommerce/contact');
		$this->load->view('ecommerce/Shop_footer');

	}

}
