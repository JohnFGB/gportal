<?php 
class DataBarang extends CI_Controller
{
    public function index()
    {
        $config['base_url'] = 'http://localhost:8000/gsite/admin/databarang/index';
        $config['total_rows'] = $this->ModelBarang->countAll();
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
        $data['barang'] = $this->ModelBarang->dataLimit($config['per_page'],$data['start']);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/databarang', $data);
        $this->load->view('templates/footer');
    }

    public function tambahAksi()
    {
        $nama_barang = $this->input->post('nama_barang');
        $deskripsi = $this->input->post('deskripsi');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
            
        } else {
            $config['upload_path'] = './img';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal di upload";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array(
            'nama_barang' => $nama_barang,
            'deskripsi' => $deskripsi,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok,
            'gambar' => $gambar,
        );
        $this->ModelBarang->tambahBarang($data, 'barang');
        redirect('admin/databarang/');
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['barang'] = $this->ModelBarang->editBarang($where,'barang')->result();
        $data['title'] = 'Edit Barang';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/editbarang', $data);
        $this->load->view('templates/footer');
    }
    
    public function update()
    {
        $id = $this->input->post('id');
        $config['upload_path'] = './img';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $nama_barang = $this->input->post('nama_barang');
        $deskripsi = $this->input->post('deskripsi');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $nama_barang = $this->input->post('nama_barang');
            $deskripsi = $this->input->post('deskripsi');
            $kategori = $this->input->post('kategori');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');

            $where = array(
                'id' => $id
            );
            $data = array(
                'nama_barang' => $nama_barang,
                'deskripsi' => $deskripsi,
                'kategori' => $kategori,
                'harga' => $harga,
                'stok' => $stok,
            );
            $this->ModelBarang->updateData($where,$data,'barang');
            redirect('admin/databarang/');
        } else {
            $gambar = $_FILES['gambar']['name'];
            $nama_barang = $this->input->post('nama_barang');
            $deskripsi = $this->input->post('deskripsi');
            $kategori = $this->input->post('kategori');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');
            $where = array(
                'id' => $id
            );
            $data = array(
                'nama_barang' => $nama_barang,
                'deskripsi' => $deskripsi,
                'kategori' => $kategori,
                'harga' => $harga,
                'stok' => $stok,
                'gambar' => $gambar,
            );
            $this->ModelBarang->updateData($where,$data,'barang');
            redirect('admin/databarang/');
        }

        $data = array(
            'nama_barang' => $nama_barang,
            'deskripsi' => $deskripsi,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok,
            'gambar' => $gambar,
        );
        $where = array(
            'id' => $id
        );
        $this->ModelBarang->updateData($where,$data,'barang');
        redirect('admin/databarang/');
    }

    public function delete($id)
    {
        $where = array(
            'id' => $id
        );
        $this->ModelBarang->hapusData($where,'barang');
        redirect('admin/databarang/');
    }
}


?>