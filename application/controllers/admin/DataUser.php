<?php 
class DataUser extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

    public function index()
    {
        $config['base_url'] = 'http://localhost:8000/gsite/admin/datauser/index';
        $config['total_rows'] = $this->ModelUser->countAll();
        $config['per_page'] = 4;
        $config['full_tag_open'] = '<nav aria-label="Page navigation example">
        <ul class="pagination">';
        $config['full_tag_close'] = '</ul>
        </nav>';
        $config['first_link'] = 'first';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item disabled">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4);
        $data['users'] = $this->ModelUser->dataLimit($config['per_page'],$data['start']);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datauser', $data);
        $this->load->view('templates/footer');
    }

    public function tambahAksi()
    {
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'This email already use'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]',[
			'min_length' => 'Password to short'
		]);
        $this->form_validation->set_rules('pin', 'Pin', 'required|trim|max_length[6]',[
			'max_length' => 'Max PIN is 6'
		]);

		if ($this->form_validation->run() == false) {
			$data = [
				'title' => 'Data User'
			];
			$this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
			$this->load->view('admin/datauser', $data);
			$this->load->view('templates/footer');
		} else{
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'no_wa' => htmlspecialchars($this->input->post('no_wa', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				'pin' => password_hash($this->input->post('pin'), PASSWORD_BCRYPT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->ModelUser->tambahUser($data, 'user');
			$this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
			Registration Success,Please Login!
		  </div>');
			redirect('admin/datauser');
		}
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['users'] = $this->ModelUser->editUser($where,'user')->result();
        $data['title'] = 'Edit User';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/edituser', $data);
        $this->load->view('templates/footer');
    }
    
    public function update()
    {
        $id = $this->input->post('id');
        // $config['upload_path'] = './img';
        // $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $no_wa = $this->input->post('no_wa');
        $password = $this->input->post('password');
        $pin = $this->input->post('pin');
        // $gambar = $_FILES['gambar']['name'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $no_wa = $this->input->post('no_wa');
            $password = $this->input->post('password');
            $pin = $this->input->post('pin');
            // $kategori = $this->input->post('kategori');
            // $harga = $this->input->post('harga');
            // $stok = $this->input->post('stok');

            $where = array(
                'id' => $id
            );
            $data = array(
                'name' => $name,
                'email' => $email,
                'no_wa' => $no_wa,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'pin' => password_hash($pin, PASSWORD_BCRYPT),
                // 'kategori' => $kategori,
                // 'harga' => $harga,
                // 'stok' => $stok,
            );
            $this->ModelUser->updateData($where,$data,'user');
            $this->session->set_flashdata("success","<div class='alert alert-primary' role='alert'>
            Data Berhasil Diubah!
          </div>");
            redirect('admin/datauser/');
        } else {
            // $gambar = $_FILES['gambar']['name'];
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $no_wa = $this->input->post('no_wa');
            $password = $this->input->post('password');
            $pin = $this->input->post('pin');
            // $kategori = $this->input->post('kategori');
            // $harga = $this->input->post('harga');
            // $stok = $this->input->post('stok');
            $where = array(
                'id' => $id
            );
            $data = array(
                'name' => $name,
                'email' => $email,
                'no_wa' => $no_wa,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'pin' => password_hash($pin, PASSWORD_BCRYPT),
                // 'kategori' => $kategori,
                // 'harga' => $harga,
                // 'stok' => $stok,
                // 'gambar' => $gambar,
            );
            $this->modelUser->updateData($where,$data,'user');
            $this->session->set_flashdata("success","<div class='alert alert-primary' role='alert'>
                        Data Berhasil Diubah!
                      </div>");
            redirect('admin/datauser/');
        }

        $data = array(
            'name' => $name,
            'email' => $email,
            // 'kategori' => $kategori,
            // 'harga' => $harga,
            // 'stok' => $stok,
            // 'gambar' => $gambar,
        );
        $where = array(
            'id' => $id
        );
        $this->ModelUser->updateData($where,$data,'user');
        redirect('admin/datauser/');
    }

    public function delete($id)
    {
        $where = array(
            'id' => $id
        );
        $this->ModelUser->hapusData($where,'user');
        redirect('admin/datauser/');
    }

    public function detail($id_User)
    {
        $data['users'] = $this->ModelUser->detailUser($id_User);
        $data['title'] = 'Detail User';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/detailuser', $data);

    }  
}


?>