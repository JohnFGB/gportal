<?php 

class Invoice extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->ModelInvoice->tampilData();
        $data['title'] = 'Invoice';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates/footer');
    }
    public function detail($id_invoice)
    {
        $data['invoice'] = $this->ModelInvoice->authIdInvoice($id_invoice);
        $data['pesanan'] = $this->ModelInvoice->authIdPesanan($id_invoice);
        $data['title'] = 'Detail Pesanan';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/detailinvoice', $data);

    }  
    function status_verifikasi($id_pesanan){
        $where = array('id_pesanan' => $id_pesanan);
        $this->ModelInvoice->status_verifikasi($where,'pesanan');
        $this->session->set_flashdata("success","<div class='alert alert-primary' role='alert'>
            Status Berhasil Diubah!
          </div>");
        redirect('admin/invoice/');}
}

?>