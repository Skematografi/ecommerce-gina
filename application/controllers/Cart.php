<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('cart', 'email');
        $this->load->model('Model_Cart');
        $this->load->model('Model_Location');
    }
 
    public function index()
    {
        $this->headTemplate();
        $data['produk']= $this->db->query('SELECT * FROM produk WHERE stok > 0')->result();
		$this->load->view('ecommerce/product_grid',$data);
    }

    public function tampil_cart()
    {   
        $data['member_id'] = $this->session->userdata('member_id');
        $this->headTemplate();
        $data['produk'] = $this->Model_Cart->get_produk_all();
		$this->load->view('ecommerce/cart',$data);
    }
 
    public function check_out()
    {   
       $data['produk'] = $this->Model_Cart->get_produk_all();
        $this->headTemplate();
        $this->load->view('ecommerce/check_out',$data);
    }

    public function pembayaran(){
        $data['produk'] = $this->Model_Cart->get_produk_all();
        $this->load->view('ecommerce/check_out',$data);
    }
 
    function tambah()
    {
        $code = $this->input->post('code');
        $size = $this->input->post('size');
        $data = array();

        $sql = "SELECT a.id,a.name,a.price, a.stock, a.image
                FROM products a WHERE a.code ='".$code."' AND a.size = '".$size."' LIMIT 1";

        $query = $this->db->query($sql)->result();

        foreach($query as $row){
            $data = [
                "id" => $row->id,
                "name" => $row->name,
                "price" => $row->price,
                "image" => $row->image,
                "stock" => $row->stock
            ];
        }

        $data_produk= array('id' => $data['id'],
                            'name' => $data['name'],
                            'price' => $data['price'],
                            'gambar' => $data['image'],
                            'qty' => $this->input->post('quantity'),
                            'size' => $this->input->post('size'),
                            'stock' => $data['stock']
                        );

        $this->cart->insert($data_produk);

        $cart = $this->cart->contents();
		$total_cart = count($cart);

        echo json_encode(['success' => 'Produk berhasil dimasukan keranjang', 'total_cart' => $total_cart, 'link' => 'ecommerce/product_grid']);
    }
 
    function hapus($rowid)
    {
        if ($rowid=="all")
            {
                $this->cart->destroy();
            }
        else
            {
                $data = array('rowid' => $rowid,
                              'qty' =>0);
                $this->cart->update($data);
            }
        redirect('cart/tampil_cart');
    }
 
    function ubah_cart()
    {
        $cart_info = $_POST['cart'] ;
        foreach( $cart_info as $id => $cart)
        {
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $gambar = $cart['gambar'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $data = array('rowid' => $rowid,
                            'price' => $price,
                            'gambar' => $gambar,
                            'amount' => $amount,
                            'qty' => $qty);
            $this->cart->update($data);
        }
        redirect('cart/tampil_cart');
    }
 
    public function proses_order()
    {
        //-------------------------Input data pesanan--------------------------
        $phone = $this->input->post('phone');
        $code=$this->Model_Cart->generateRandomString(4,$phone);

        $now = new DateTime();
        $now->modify("+1 day");
        $next_day = $now->format("Y-m-d H:i:s");

        $data_order = array(
                            'code' => $code,
                            'member_id' => $this->input->post('member_id'),
                            'name' => $this->input->post('name'),
                            'email' => $this->input->post('email'),
                            'phone' => $phone,
                            'state' => $this->input->post('state'),
                            'city' => $this->input->post('city'),
                            'district' => $this->input->post('district'),
                            'address' => $this->input->post('address'),
                            'shipping_cost' => $this->input->post('ongkir'),
                            'total_price' => $this->input->post('total'),
                            'expired_date' => $next_day,
                            'discount_member' => $this->input->post('discount_member'),
                            'discount_voucher' => $this->input->post('discount_voucher'),
                            'invoice' => 'INV/'.date('Ymd').'/'.substr($code,-4)
                        );

        $this->db->insert('orders',$data_order);
        $insert_id = $this->db->insert_id();

        //-------------------------Input data detail order-----------------------
        if ($cart = $this->cart->contents())
            {
                foreach ($cart as $item)
                    {   
                        $data_detail = array(
                                        'order_id' => $insert_id,
                                        'product_id' => $item['id'],
                                        'price' => $item['price'],
                                        'quantity' => $item['qty']
                                    );
                        $this->db->insert('order_details',$data_detail);
                    }
            }
        
        $dataForEmail = [
            'code' => $code,
            'total' =>  $this->input->post('total'),
            'address' =>  $this->input->post('address')."\n".$this->input->post('district').", ".$this->input->post('city').", ".$this->input->post('state'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $phone,
            'expired_date' => $next_day,
            'shipping_cost' => $this->input->post('ongkir'),
            'discount_member' => $this->input->post('discount_member'),
            'discount_voucher' => $this->input->post('discount_voucher'),
            'invoice' => 'INV/'.date('Ymd').'/'.substr($code,-4)
        ];

        $this->sendEmailPayment($dataForEmail);

        $this->cart->destroy();
        redirect('cart/thanks', 'refresh');

    }

    public function thanks()
    {           
        $this->headTemplate();
        $this->load->view('ecommerce/thanks');
    }

    private function headTemplate(){
		$cart = $this->cart->contents();
		$data['total_cart'] = count($cart);
		$this->load->view('ecommerce/Shop_header');
		$this->load->view('ecommerce/Shop_navbar', $data);
	}

    public function getCityByState(){

        $state_id = $this->input->post('state_id');
        $data = $this->Model_Location->getCity($state_id);

        echo json_encode($data);
    }

    public function getDistrictByCity(){

        $city_id = $this->input->post('city_id');
        $data = $this->Model_Location->getDistrict($city_id);

        echo json_encode($data);
    }

    private function sendEmailPayment($order){

        $this->email->from('admin@colornizer.co', 'Colornizer.co');
		$this->email->to($order['email']);
 
		$this->email->subject('Colonizer.co');

        $product = array();
        if ($cart = $this->cart->contents()){
            foreach ($cart as $item){   
                $product[] = array(
                                'name' => $item['name'],
                                'image' => $item['gambar'],
                                'size' => $item['size'],
                                'price' => $item['price'],
                                'quantity' => $item['qty']
                            );
            }
        }

        $data = [
            'order' => $order,
            'products' => $product
        ];
        
        $this->email->message($this->load->view('template_email/invoice',$data, true));

		$this->email->set_mailtype('html');
		$this->email->send();
    }

}