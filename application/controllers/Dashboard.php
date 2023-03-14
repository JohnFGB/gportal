<?php 

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Gportal - Home';
        $this->load->view('templates/user_header',$data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/user_footer');
    }
    public function tampilData()
    {
        $data['barang'] = $this->ModelBarang->tampilData()->result();
        $data['title'] = 'Gportal - Data Diamond';
        $this->load->view('templates/user_header',$data);
        $this->load->view('user/databarang', $data);
        $this->load->view('templates/user_footer');
    }
    public function addToCart($id)
    {
        $barang = $this->ModelBarang->find($id);
        
        $data = array(
            'id' => $barang->id,
            'qty' => 1,
            'price' => $barang->harga,
            'name' => $barang->nama_barang
        );
        $this->cart->insert($data);
        redirect('dashboard/detailcart');
    }
    public function detailCart()
    {
        $data['title'] = 'Gportal - Pesanan';
        $this->load->view('templates/user_header',$data);
        $this->load->view('cart');
        $this->load->view('templates/user_footer');
    }
    public function deleteCart()
    {
        $this->cart->destroy();
        redirect('dashboard');
    }
    public function pembayaran()
    {
        $data['title'] = 'Gportal - Pembayaran';
        $this->load->view('templates/user_header', $data);
        $this->load->view('pembayaran');
        $this->load->view('templates/user_footer');
    }
    public function prosesPesanan()
    {
        $data['title'] = 'Gportal - Transaksi';
        $proccess = $this->ModelInvoice->index();
        if ($proccess) {
            $this->load->view('templates/user_header',$data);
            $this->load->view('prosespesanan');
            $this->load->view('templates/user_footer');
            $this->cart->destroy();
        } else {
            echo "Maaf pesanan anda gagal di proses";
        }

    }
    public function detail($id_barang)
    {
        $data['barang'] = $this->ModelBarang->detailBarang($id_barang);
        $data['title'] = 'Gportal - Detail Barang';
        $this->load->view('templates/user_header',$data);
        $this->load->view('detail', $data);
        $this->load->view('templates/user_footer');
    }

}

?>