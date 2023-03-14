<?php 

class Kategori extends CI_Controller
{
    public function mobileLegend()
    {
        $data['mobilelegend'] = $this->ModelKategori->mobileLegend()->result();
        $data['title'] = 'Gportal - Mobile Legends';
        $this->load->view('templates/user_header',$data);
        $this->load->view('kategori/mobilelegend',$data);
        $this->load->view('templates/user_footer');
    }
    public function pubg()
    {
        $data['pubg'] = $this->ModelKategori->pubg()->result();
        $data['title'] = 'Gportal - PUBG';
        $this->load->view('templates/user_header',$data);
        $this->load->view('kategori/pubg',$data);
        $this->load->view('templates/user_footer');
    }
    public function freeFire()
    {
        $data['freefire'] = $this->ModelKategori->freeFire()->result();
        $data['title'] = 'Gportal - Freefire';
        $this->load->view('templates/user_header',$data);
        $this->load->view('kategori/freefire',$data);
        $this->load->view('templates/user_footer');
    }
}

?>