<?php
class Genre_model extends CI_Model
{

    public function get_genres()
    {
        $this->db->order_by('name');
        $query = $this->db->get('genres');
        return $query->result_array();
    }

    public function get_genres_count()
    {
        $this->db->order_by('name');
        $query = $this->db->get('genres_count');
        return $query->result_array();
    }

    public function get_genre($id)
    {
        $query = $this->db->get_where('genres', array('id' => $id));
        return $query->row_array();
    }

    public function add_genre()
    {
        $data = array(
            'name' => $this->input->post('name')
        );

        return $this->db->insert('genres', $data);
    }

    public function update_genre(){
        $data = [
            'name' => $this->input->post('name')
        ];

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('genres', $data);
    }

    public function delete_genre($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('genres');
        return true;
    }

    
}
