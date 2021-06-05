<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Model_Produk');
		$this->load->model('Model_Promo');
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


	//CRUD Produk ========================================================

	public function produk()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/asidebar');
		$this->load->view('dashboard/modal_product');
		$data['auto']=$this->Model_Produk->auto_id();
		$data['products']= $this->getDatatableProduct();
		$this->load->view('dashboard/produk',$data);	
	}

    public function do_upload(){

    	$config['upload_path'] = './assets/produk/';
    	$config['allowed_types'] = 'gif|jpg|png|JPEG';
    	$config['max_size'] = 2048;

    	$this->upload->initialize($config);
		$this->load->library('upload');

		$id = $this->input->post('product_id',TRUE);

		if($id == ''){
			//Proses penyimpanan data
			if (!$this->upload->do_upload('image')) {
				$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Produk gagal di tambah</div>');
				redirect('dashboard/produk');
			} else {
				$file = $this->upload->data();
				$data = ['image' => $file['file_name'],
					'code' => strtoupper($this->input->post('code',TRUE)),
					'name' => htmlspecialchars($this->input->post('name',TRUE)),
					'category' => htmlspecialchars($this->input->post('category',TRUE)),
					'description' => htmlspecialchars($this->input->post('description',TRUE)),
					'price' => $this->input->post('price',TRUE),
					'size' => strtoupper($this->input->post('size',TRUE)),
					'weight' => $this->input->post('weight',TRUE),
					'stock' => $this->input->post('stock',TRUE)
				];
				$this->Model_Produk->tambah_produk($data); //memasukan data ke database
				$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Produk berhasil di tambah</div>');
				redirect('dashboard/produk');

			}

		} else {
			//Proses update data
			if($_FILES['image']['size'] == 0){	
				$data = [
					'name' => htmlspecialchars($this->input->post('name',TRUE)),
					'category' => htmlspecialchars($this->input->post('category',TRUE)),
					'description' => htmlspecialchars($this->input->post('description',TRUE)),
					'price' => $this->input->post('price',TRUE),
					'size' => strtoupper($this->input->post('size',TRUE)),
					'weight' => $this->input->post('weight',TRUE),
					'stock' => $this->input->post('stock',TRUE)
				];
				$this->Model_Produk->update($id, $data); //memasukan data ke database
				$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Produk berhasil di update</div>');
				redirect('dashboard/produk');

			} else {

				if (!$this->upload->do_upload('image')){
					$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Produk gagal di update</div>');
					redirect('dashboard/produk');
				} else {
					$file = $this->upload->data();
					$data = ['image' => $file['file_name'],
						'name' => htmlspecialchars($this->input->post('name',TRUE)),
						'category' => htmlspecialchars($this->input->post('category',TRUE)),
						'description' => htmlspecialchars($this->input->post('description',TRUE)),
						'price' => $this->input->post('price',TRUE),
						'size' => strtoupper($this->input->post('size',TRUE)),
						'weight' => $this->input->post('weight',TRUE),
						'stock' => $this->input->post('stock',TRUE)
					];
					$this->Model_Produk->update($id, $data); //memasukan data ke database
					$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Produk berhasil di update</div>');
					redirect('dashboard/produk');
	
				}
			}

		}

		
  	}

	public function hapus_produk(){
		$id = $this->input->post('id',TRUE);

		$this->Model_Produk->hapus($id, ["status" => 0]);
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Produk berhasil di hapus</div>');

		echo json_encode(['link' =>'Dashboard/produk']);
	}

	public function edit_produk(){
		$id = $this->input->post('id',TRUE);
		$data = $this->Model_Produk->getProductById($id);
		echo json_encode($data);
	}	

	
	//CRUD Promo ========================================================

	public function promo()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/asidebar');
		$this->load->view('dashboard/modal_promo');
		$data['promotions']= $this->getDatatablePromo();
		$this->load->view('dashboard/promo',$data);	
	}

    public function tambah_promo(){

		$id = $this->input->post('product_id',TRUE);
		$code = strtoupper($this->input->post('code',TRUE));
		$start = new DateTime($this->input->post('start_date'));
		$end = new DateTime($this->input->post('end_date'));
		$check = $this->Model_Promo->getProductByCode($code);

		//Proses penyimpanan data
		if ($start > $end){
			$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Promo gagal di simpan, tanggal akhir harus lebih dari tanggal mulai</div>');

		} else {

			if($id == ''){
					$data = [
						'code' => $code,
						'name' => htmlspecialchars($this->input->post('name',TRUE)),
						'description' => htmlspecialchars($this->input->post('description',TRUE)),
						'start_date' => $this->input->post('start_date',TRUE),
						'end_date' => $this->input->post('end_date',TRUE),
						'discount' => $this->input->post('discount',TRUE)
					];

					if($check == 0){
						$this->Model_Promo->tambah($data); //memasukan data ke database
						$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Promo berhasil di simpan</div>');
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Promo gagal di simpan, Kode sudah pernah digunakan</div>');
					}

			} else {
				$data = [
					'name' => htmlspecialchars($this->input->post('name',TRUE)),
					'description' => htmlspecialchars($this->input->post('description',TRUE)),
					'start_date' => $this->input->post('start_date',TRUE),
					'end_date' => $this->input->post('end_date',TRUE),
					'discount' => $this->input->post('discount',TRUE)
				];

				if($check == 0){
					$this->Model_Promo->update($id, $data); //memasukan data ke database
					$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Promo berhasil di update</div>');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Promo gagal di update, Kode sudah pernah digunakan</div>');
				}
			}
		}

		redirect('dashboard/promo');
		
  	}

	public function hapus_promo(){
		$id = $this->input->post('id',TRUE);

		$this->Model_Promo->hapus($id, ["status" => 0]);
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Promo berhasil di hapus</div>');

		echo json_encode(['link' =>'Dashboard/promo']);
	}

	public function edit_promo(){
		$id = $this->input->post('id',TRUE);
		$data = $this->Model_Promo->getProductById($id);
		echo json_encode($data);
	}	


	
	//Member ========================================================

	public function member()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/asidebar');
		$data['members']= $this->getDatatableMember();
		$this->load->view('dashboard/pelanggan',$data);	
	}

	public function hapus_member(){
		$id = $this->input->post('id',TRUE);
		$this->Model_Pelanggan->hapus($id, ["status" => 0]);
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Member berhasil di hapus</div>');

		echo json_encode(['link' =>'Dashboard/member']);
	}

	//Order ========================================================

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

	//Datatable Collection ========================================================

	public function getDatatableProduct()
	{   

		$products = $this->Model_Produk->getData();
		$data = array();
		foreach($products as $row) {
			$data[] = [
				"code" => $row['code'],
				"name" => $row['name'],
				"description" => $row['description'],
				"category" => $row['category'],
				"image" => $row['image'],
				"weight" => $row['weight'],
				"size" => $row['size'],
				"price" => $row['price'],
				"stock" => $row['stock'],
				"action" => '<a href="javascript:void(0);" title="Klik untuk melakukan perubahan" data-id="'.$row['id'].'" class="mr-1" onclick="editProduct(this)"><i class="far fa-edit text-primary"></i></a><a href="javascript:void(0);" title="Klik untuk menghapus" data-id="'.$row['id'].'" onclick="deleteProduct(this)"><i class="far fa-trash-alt text-danger"></i></a>'
			];
		}

        return $data;
	}

	public function getDatatableMember()
	{   

		$products = $this->Model_Pelanggan->getData();
		$data = array();
		foreach($products as $row) {
			$data[] = [
				"name" => $row['name'],
				"email" => $row['email'],
				"phone" => $row['phone'],
				"gender" => $row['gender'],
				"address" => $row['address'],
				"state" => $row['state'],
				"city" => $row['city'],
				"district" => $row['district'],
				"action" => '<a href="javascript:void(0);" title="Klik untuk menghapus" data-id="'.$row['id'].'" onclick="deleteMember(this)"><i class="fas fa-remove text-danger"></i></a>'
			];
		}

        return $data;
	}

	public function getDatatablePromo()
	{   

		$products = $this->Model_Promo->getData();
		$data = array();
		$now = new DateTime(date('Y-m-d'));
		
		foreach($products as $row) {
			
			$end = new DateTime($row['end_date']);

			if($end > $now) {
				$status = '<div class="badge badge-success">Berjalan</div>';
			} else {
				$status = '<div class="badge badge-secondary">Berakhir</div>';
			}

			$data[] = [
				"code" => $row['code'],
				"name" => $row['name'],
				"description" => $row['description'],
				"discount" => $row['discount'],
				"start_date" => $row['start_date'],
				"end_date" => $row['end_date'],
				"status" => $status,
				"action" => '<a href="javascript:void(0);" title="Klik untuk melakukan perubahan" data-id="'.$row['id'].'" class="mr-1" onclick="editPromo(this)"><i class="far fa-edit text-primary"></i></a><a href="javascript:void(0);" title="Klik untuk menghapus" data-id="'.$row['id'].'" onclick="deletePromo(this)"><i class="far fa-trash-alt text-danger"></i></a>'
			];
		}

        return $data;
	}
}
