<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{ 
    public function __construct()
    {
        Parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Gportal - Beranda';
        $this->load->view('templates/user_header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/user_footer',$data);
    }
    public function ml()
    {
        $data['title'] = 'Dashboard';
        $data['barang'] = $this->ModelBarang->tampilData()->result();
        $this->load->view('templates/user_header',$data);
        $this->load->view('kategori/ml');
        $this->load->view('templates/user_footer');
    }

    public function news1()
    {
        $data['title'] = 'News';
        $this->load->view('templates/user_header',$data);
        $this->load->view('news/news1');
        $this->load->view('templates/user_footer');
        
    }

    public function news2()
    {
        $data['title'] = 'News';
        $this->load->view('templates/user_header',$data);
        $this->load->view('news/news2');
        $this->load->view('templates/user_footer');
        
    }
}