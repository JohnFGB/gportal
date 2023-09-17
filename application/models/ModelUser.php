<?php 

class ModelUser extends CI_Model
{
    public function tampilData()
    {
        return $this->db->get('user');
    }

    public function dataLimit($limit, $start)
    {
        return $this->db->get('user',$limit,$start)->result();
    }
    public function countAll()
    {
        return $this->db->get('user')->num_rows();
    }

    public function tambahUser($data,$table)
    {
        $this->db->insert($table,$data);
    }
    public function editUser($where,$table)
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
        $result = $this->db->where('id',$id)->limit(1)->get('user');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
    public function detailUser($id_User)
    {
        $result = $this->db->where('id',$id_User)->get('user');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function getCurrPassword($userid){
        $query = $this->db->where(['id'=>$userid])
                          ->get('user');
          if($query->num_rows() > 0){
              return $query->row();
          } }

    public function updatePassword($new_password, $userid){
        $data = array(
            'password'=> password_hash($new_password, PASSWORD_BCRYPT)
            );
            return $this->db->where('id', $userid)
                            ->update('user', $data); }
}
?>