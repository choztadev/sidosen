<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_fakultas extends CI_Model {

    public function selectdb()
    {
            $query = $this->db->get('tb_fakultas');
            return $query->result();
    }
    public function insertdb($data)
    {
            $this->db->insert('tb_fakultas', $data);
           
    }
    public function Delete($table, $where){
        $query = $this->db->delete($table, $where); // Kode ini digunakan untuk menghapus record yang sudah ada
        return $query;
    }
    function editdb($where,$table){		
		return $this->db->get_where($table,$where);
	}
    function updatedb($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}