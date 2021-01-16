<?php
class Artist_model extends CI_Model
{
    // public function __construct(){
    // 	$this->load->database();
    // }

    public function get_artists()
    {
        $this->db->order_by('name');
        $query = $this->db->get('artists');
        return $query->result_array();
    }

    public function get_artists_count()
    {
        $this->db->order_by('name');
        $query = $this->db->get('artists_count');
        return $query->result_array();
    }

    public function get_artist($id)
    {
        $query = $this->db->get_where('artists', array('id' => $id));
        return $query->row_array();
    }

    public function add_artist()
    {
        $data = array(
            'name' => $this->input->post('name')
        );

        return $this->db->insert('artists', $data);
    }

    public function update_artist(){
        $data = [
            'name' => $this->input->post('name')
        ];

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('artists', $data);
    }

    public function delete_artist($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('artists');
        return true;
    }

    
}
