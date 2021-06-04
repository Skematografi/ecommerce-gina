<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('Model_Cart');
    }
 
    public function index()
    {
        $this->load->view('ecommerce/Shop_header');
		$this->load->view('ecommerce/Shop_navbar');
        $data['produk']= $this->db->query('SELECT * FROM produk WHERE stok > 0')->result();
		$this->load->view('ecommerce/product_grid',$data);
    }

    public function tampil_cart()
    {   
        $data['produk'] = $this->Model_Cart->get_produk_all();
        $this->load->view('ecommerce/Shop_header');
		$this->load->view('ecommerce/Shop_navbar');
		$this->load->view('ecommerce/cart',$data);
    }
 
    public function check_out()
    {   
        $id_produk = $this->input->post('id_produk');
        $sisa = $this->input->post('sisa');

        $updata_prod=[
            'stok' => $sisa
        ];
    
        $where=[
            'id_produk' => $id_produk
        ];

        $this->db->where($where);
        $this->db->update('produk',$updata_prod);

        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $data['profil'] = $this->db->get('pelanggan',['id_pelanggan' => $id_pelanggan])->result_array();
        $data['produk'] = $this->Model_Cart->get_produk_all();
        $this->load->view('ecommerce/Shop_header');
        $this->load->view('ecommerce/Shop_navbar');
        $this->load->view('ecommerce/check_out',$data);
    }

    public function pembayaran(){
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $data['profil']=$this->db->query("SELECT id_pelanggan AS id FROM pelanggan WHERE id_pelanggan='$id_pelanggan' ")->row();
        $data['produk'] = $this->Model_Cart->get_produk_all();
        $this->load->view('ecommerce/check_out',$data);
    }
 
    function tambah()
    {
        $data_produk= array('id' => $this->input->post('id'),
                             'name' => $this->input->post('nama'),
                             'price' => $this->input->post('harga'),
                             'gambar' => $this->input->post('gambar'),
                             'qty' =>$this->input->post('qty'),
                             'stock' =>$this->input->post('stok')
                            );
        $this->cart->insert($data_produk);
        redirect('cart');
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
        $id_order=$this->Model_Cart->id_order();
        $proses=1;
        $status=$this->session->userdata('status');

        if($status == 0){

            $data_order = array(
                                'id_pesanan' => $id_order,
                                'tanggal' => date('Y-m-d'),
                                'nama_pelanggan' => $this->input->post('nama'),
                                'telpon_pelanggan' => $this->input->post('telpon'),
                                'kabupaten' => $this->input->post('kabupaten'),
                                'kecamatan' => $this->input->post('kecamatan'),
                                'alamat' => $this->input->post('alamat'),
                                'total' => $this->input->post('total'),
                                'ongkir' => $this->input->post('ongkir'),
                                'status' => $proses
                            );

            $this->db->insert('pesanan',$data_order);

            //-------------------------Input data detail order-----------------------
            if ($cart = $this->cart->contents())
                {
                    foreach ($cart as $item)
                        {   
                            $data_detail = array(
                                            'id_pesanan' => $id_order,
                                            'id_produk' => $item['id'],
                                            'harga' => $item['price'],
                                            'jumlah' => $item['qty']
                                        );
                           /* $where = array('id_produk' => $item['id']);
                            $this->db->where($where,'produk');
                            $this->db->get('produk')*/
                            $this->db->insert('detail_pesanan',$data_detail);
                        }
                }
            $this->cart->destroy();
            $this->_thanks();
        }else{

            $data_order = array(
                                'id_pesanan' => $id_order,
                                'id_pelanggan' => $this->input->post('id_pelanggan'),
                                'tanggal' => date('Y-m-d'),
                                'nama_pelanggan' => $this->input->post('nama'),
                                'telpon_pelanggan' => $this->input->post('telpon'),
                                'kabupaten' => $this->input->post('kabupaten'),
                                'kecamatan' => $this->input->post('kecamatan'),
                                'alamat' => $this->input->post('alamat'),
                                'total' => $this->input->post('total'),
                                'ongkir' => $this->input->post('ongkir'),
                                'status' => $proses
                            );

            $this->db->insert('pesanan',$data_order);

            //-------------------------Input data detail order-----------------------
            if ($cart = $this->cart->contents())
                {
                    foreach ($cart as $item)
                        {
                            $data_detail = array(
                                            'id_pesanan' => $id_order,
                                            'id_produk' => $item['id'],
                                            'harga' => $item['price'],
                                            'jumlah' => $item['qty']
                                        );
                            $this->db->insert('detail_pesanan',$data_detail);
                        }
                }
            $this->cart->destroy();
            $this->_thanks();
        }

    }

    private function _thanks()
    {   
        $this->load->view('ecommerce/Shop_header');
        $this->load->view('ecommerce/Shop_navbar');
        $this->load->view('ecommerce/thanks');
    }




}