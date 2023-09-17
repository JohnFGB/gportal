<?php 

class ModelInvoice extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $idgame = $this->input->post('idgame');

        $invoice = array(
            'nama' => $nama,
            'id_game' => $idgame,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s',mktime(date('H'), date('i'), date('s'),date('m'),date('d') + 1,date('Y'))),
        );
        $this->db->insert('invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_invoice' => $id_invoice,
                'id' => $item['id'],
                'nama_barang' => $item['name'],
                'jumlah' => $item['qty'],
                'harga' => $item['price'],
                'email' => $this->session->userdata('email'),
            );
            $this->db->insert('pesanan', $data);
        }
        return TRUE;
    }

    public function tampilData()
    {
        $result = $this->db->get('invoice');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function tampilPesanan()
    {
        $result = $this->db->get('pesanan');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function authIdInvoice($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->limit(1)->get('invoice');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function authIdPesanan($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('pesanan');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    function status_verifikasi($where,$pesanan){
        $this->db->select('status');
        $this->db->from($pesanan);
        $this->db->where($where);
        $result = $this->db->get()->result();
   
       if($result && $result[0]->status_verifikasi == 0)
       {
          $this->db->set('status', 1);
       } else{
          $this->db->set('status', 0);
       }
   
       $this->db->where($where);
       $this->db->update($pesanan);
}
public function tampilDataPesanan()
{
    $result = $this->db->get('pesanan');
    if ($result->num_rows() > 0) {
        return $result->result();
    } else {
        return false;
    }
}

public function dataPesananId()
{
    $email = $this->session->userdata('email'); 
    // $this->db->select('*');
    // $this->db->where('id_user', $id);//
    // $this->db->from('pesanan');
    // $query = $this->db->get();
    

    $result = $this->db->where('email', $email)->get('pesanan');
    if ($result->num_rows() > 0) {
        return $result->result();
    } else {
        return false;
    }

    // $result = $this->db->where('id_user', $id)->limit(1)->get('pesanan');
    // if ($result->num_rows() > 0) {
    //     return $result->row();
    // } else {
    //     return false;
    // }
}
}
?>