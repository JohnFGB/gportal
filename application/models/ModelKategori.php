<?php 

class ModelKategori extends CI_Model
{
    public function mobileLegend()
    {
        return $this->db->get_where('barang',array('
        kategori' => 'Diamond'
    ));
    }
    public function pubg()
    {
        return $this->db->get_where('barang',array('
        kategori' => 'UC'
    ));
    }
    public function freeFire()
    {
        return $this->db->get_where('barang',array('
        kategori' => 'Diamond FF'
    ));
    }
}

?>