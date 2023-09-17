<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{ 
    public function __construct()
    {
        Parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Profile';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');;
    }
    public function simpan()
    {
        $this->form_validation->set_rules('newpassword', 'New Password', 'required|alpha_numeric|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('confpassword', 'Confirm Password', 'required|alpha_numeric|min_length[6]|max_length[20]');
    
        if($this->form_validation->run()){
            $id = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $pass = $id['password'];
            $cur_password = $pass;
            $new_password = $this->input->post('newpassword');
            $conf_password = $this->input->post('confpassword');
            // $this->load->model('ModelUser');
            $userid = $id['id'];
            if($cur_password){
                if($new_password == $conf_password){
                    if($this->ModelUser->updatePassword($new_password, $userid)){
                        $this->session->set_flashdata("success","<div class='alert alert-primary' role='alert'>
                        Password Berhasil Diubah!
                      </div>");
                        redirect('admin/dashboard/profile');
                       
                    }
                    else{
                        echo 'Failed to update password';
                    }
                }
                else{
                    echo 'New password & Confirm password is not matching';
                }
            }
            else{
                echo'Sorry! Current password is not matching';
    
        }
    }
    else{
        echo validation_errors();
    }
    }
}

