<?php
class users_model extends CI_Model
{
    public function getAllData()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function insertData($data)
    {
        $this->db->insert('users', $data);
    }
}
