<?php 
class Guru_model extends CI_Model{
    public function getGuru($id = null) {
        if($id != ''){
            return $this->db->get_where('data', array('id' => $id))->result();
        }else{
            return $this->db->get('data')->result();
        }
    }

    public function tambahDataGuru($data){
        $this->db->insert('data', $data);
        return $this->db->affected_rows();
    }

    public function hapusDataGuru($id){
        $this->db->where("id = $id");
        return $this->db->delete('data');;
    }

    public function ubahDataGuru($data){
        $this->db->where("id = '$data[id]'");
        return $this->db->update('data', $data);
    }
    
}