<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Produk');
		$this->load->model('Model_Pelanggan');
		$this->load->helper(array('form', 'url'));
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

		$data['pesanan']=$this->db->query('SELECT COUNT(id_pesanan) as total FROM pesanan WHERE status = 1')->row();
		$data['penjualan']=$this->db->query('SELECT COUNT(id_pesanan) as total FROM pesanan WHERE status = 0')->row();
		$data['produk']=$this->db->query('SELECT COUNT(id_produk) as total FROM produk')->row();
		$data['pelanggan']=$this->db->query('SELECT COUNT(id_pelanggan) as total FROM pelanggan')->row();
		$this->load->view('dashboard/index',$data);
		$this->load->view('dashboard/footer');
			
	}

	//CRUD Produk

	public function produk_tersedia()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/asidebar');
		$data['auto']=$this->Model_Produk->auto_id();
		$data['stok']='Stok Tersedia';
		$data['produk']= $this->db->query('SELECT * FROM produk WHERE stok != 0')->result();
		$this->load->view('dashboard/produk',$data);	
	}

    public function do_upload(){

    	$config['upload_path'] = './assets/produk/';
    	$config['allowed_types'] = 'gif|jpg|png|JPEG';
    	$config['max_size'] = 2048;

    	$this->upload->initialize($config);
	      $this->load->library('upload');
	      if (!$this->upload->do_upload('gambar')) //jika gagal upload
	      {
	        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Produk gagal di tambah</div>');
	          redirect('dashboard/produk_tersedia');
	      } else
	      {
	          $file = $this->upload->data();
	          $data = ['gambar' => $file['file_name'],
	           		'id_produk' => $this->input->post('id_produk',TRUE),
	            	'nama_produk' => htmlspecialchars($this->input->post('nama_produk',TRUE)),
					'kategori' => htmlspecialchars($this->input->post('kategori',TRUE)),
					'deskripsi' => htmlspecialchars($this->input->post('deskripsi',TRUE)),
					'harga' => $this->input->post('harga',TRUE),
					'berat' => $this->input->post('berat',TRUE),
					'stok' => $this->input->post('stok',TRUE)
	         ];
	          $this->Model_Produk->tambah_produk($data); //memasukan data ke database
	          $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Produk berhasil di tambah</div>');
	          redirect('dashboard/produk_tersedia');

	      }
  	}

	public function hapus_produk($id){
		$where = array('id_produk' => $id);
		$this->Model_Produk->hapus($where,'produk');
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Produk berhasil di hapus</div>');
		redirect('dashboard/produk_tersedia');
	}

	public function edit_produk($id_produk){

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/asidebar');
		$where = array('id_produk' => $id_produk);
		$data['data'] = $this->Model_Produk->edit($where,'produk')->result();		
		$this->load->view('dashboard/edit_produk',$data);
	}	

	public function update_produk(){

    	$config['upload_path'] = './assets/produk/';
    	$config['allowed_types'] = 'gif|jpg|png|JPEG';
    	$config['max_size'] = 2048;

    	$this->upload->initialize($config);
	      $this->load->library('upload');
	      if (!$this->upload->do_upload('gambar')) //jika gagal upload
	      {
	        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Produk gagal di tambah</div>');
	          redirect('dashboard/produk_tersedia');
	      } else
	      {
	          $file = $this->upload->data();
	          $id_produk = $this->input->post('id_produk',TRUE);

	          $data = ['gambar' => $file['file_name'],
	            	'nama_produk' => htmlspecialchars($this->input->post('nama_produk',TRUE)),
					'kategori' => htmlspecialchars($this->input->post('kategori',TRUE)),
					'deskripsi' => htmlspecialchars($this->input->post('deskripsi',TRUE)),
					'harga' => $this->input->post('harga',TRUE),
					'berat' => $this->input->post('berat',TRUE),
					'stok' => $this->input->post('stok',TRUE)
	         ];

	        $where = array(
				'id_produk' => $id_produk
			);
	          $this->Model_Produk->update($where,$data,'produk'); //update data ke database
	          $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Produk berhasil di update</div>');
	          redirect('dashboard/produk_tersedia');

	      }
  	}

	public function produk_habis()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/asidebar');
		$data['auto']=$this->Model_Produk->auto_id();
		$data['stok']='Stok Habis';
		$data['produk']= $this->db->query('SELECT * FROM produk WHERE stok < 1')->result();
		$this->load->view('dashboard/produk',$data);	
	}

	

	public function pelanggan()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/asidebar');
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('pelanggan', 'pelanggan.email = user.email');
		$data['pelanggan']= $this->db->get()->result();
		$this->load->view('dashboard/pelanggan',$data);	
	}

	public function ban_pelanggan($id_user){

		$nonaktif=0;

		$data=array(
			'status' => $nonaktif
		);

		$where = array(
			'id_user' => $id_user
		);

		$this->Model_Pelanggan->update($where,$data,'user'); 
	    $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Pelanggan berhasil di non aktifkan</div>');
	    redirect('dashboard/pelanggan');

	}

	public function pesanan()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/asidebar');
		$data['pesanan']=$this->db->query('
				SELECT * FROM pesanan
				LEFT JOIN detail_pesanan
				ON pesanan.id_pesanan = detail_pesanan.id_pesanan
				WHERE status = 1
			')->result();
		$this->load->view('dashboard/pesanan',$data);	
	}

	public function selesai($id_pesanan){
		$selesai=0;

		$data=array(
			'status' => $selesai
		);

		$where = array(
			'id_pesanan' => $id_pesanan
		);

		$this->Model_Produk->update($where,$data,'pesanan'); 
	    $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Pesanan selesai diproses</div>');
	    redirect('dashboard/pesanan');		
	}

	public function penjualan()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/asidebar');
		$data['pesanan']=$this->db->query('
				SELECT * FROM pesanan
				LEFT JOIN detail_pesanan
				ON pesanan.id_pesanan = detail_pesanan.id_pesanan
				WHERE status = 0
			')->result();
		$this->load->view('dashboard/penjualan',$data);	
	}

	public function laporan()
	{
		$dari=$this->input->post('dari');
		$sampai=$this->input->post('sampai');

		$data['pesanan']=$this->db->query("
				SELECT *
				FROM pesanan
				LEFT JOIN detail_pesanan
				ON pesanan.id_pesanan = detail_pesanan.id_pesanan
				WHERE tanggal
				BETWEEN '$dari' AND '$sampai'
				
			")->result();

		$data['total']=$this->db->query("
				SELECT SUM(total)
				AS penjualan
				FROM pesanan
				WHERE status = 0
				UNION ALL
				SELECT total
				FROM pesanan
				WHERE tanggal
				BETWEEN '$dari' AND '$sampai' 				
			")->row();
		$this->load->view('dashboard/laporan',$data);
			
	}
}
