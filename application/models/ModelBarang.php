<?php 

class ModelBarang extends CI_Model
{
    public function tampilData()
    {
        return $this->db->get('barang');
    }

    public function dataLimit($limit, $start)
    {
        return $this->db->get('barang',$limit,$start)->result();
    }
    public function countAll()
    {
        return $this->db->get('barang')->num_rows();
    }

    public function tambahBarang($data,$table)
    {
        $this->db->insert($table,$data);
    }
    public function editBarang($where,$table)
    {
        return $this->db->get_where($table,$where);
    }
    public function updateData($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function hapusData($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function find($id)
    {
        $result = $this->db->where('id',$id)->limit(1)->get('barang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
    public function detailBarang($id_barang)
    {
        $result = $this->db->where('id',$id_barang)->get('barang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
            $this->db->where($where);
        }
        $this->db->from('barang');
        return $this->db->get()->row($field);
    }
    public function totalPesanan($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
            $this->db->where($where);
        }
        $this->db->from('pesanan');
        return $this->db->get()->row($field);
    }
    public function totalPendapatan($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
            $this->db->where($where);
        }
        $this->db->from('harga');
        return $this->db->get()->row($field);
    }
}
?>