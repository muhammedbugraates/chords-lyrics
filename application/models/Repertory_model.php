<?php
class Repertory_model extends CI_Model
{
    // Get all repertories
    public function get_repertories()
    {
        $this->db->order_by('name');
        $query = $this->db->get('repertories');
        return $query->result_array();
    }

    public function get_repertories_count()
    {
        $this->db->order_by('name');
        $query = $this->db->get('repertories_count');
        return $query->result_array();
    }

    // Get all repertories that belongs to a user to add song
    public function get_my_repertories_for_song($id)
    {
        // Get all repertory ids that has no song which comes as parameter (id)
        $this->db->select('repertory_id');
        $query = $this->db->get_where('repertory_song', array('song_id' => $id));
        $my_temp_array = $query->result_array();

        // Convert array for where_not_in function
        $arr = [''];
        foreach ($my_temp_array as $element) {
            array_push($arr, $element['repertory_id']);
        }
        // $arr = array_map (function($value){
        //     return $value['repertory_id'];
        // } , $my_temp_array);

        $this->db->order_by('name');
        $this->db->where_not_in('id', $arr);
        // If song added, not add
        $query = $this->db->get_where('repertories', array('user_id' => $this->session->userdata('user_id')));
        return $query->result_array();
    }

    // Get all repertories that belongs to a user to add song
    public function get_my_repertories()
    {
        $this->db->order_by('name');
        $query = $this->db->get_where('repertories', array('user_id' => $this->session->userdata('user_id')));
        return $query->result_array();
    }

    public function get_my_repertories_count()
    {
        $this->db->order_by('name');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $query = $this->db->get('repertories_count');
        return $query->result_array();
    }

    // Get one repertory with id
    public function get_repertory($id)
    {
        $query = $this->db->get_where('repertories', array('id' => $id));
        return $query->row_array();
    }

    // Get all songs of a repertory
    public function get_repertory_songs($id)
    {
        $this->db->select('songs.*');
        $this->db->join('songs', 'songs.id = repertory_song.song_id');
        $this->db->order_by('songs.name');
        $query = $this->db->get_where('repertory_song', array('repertory_song.repertory_id' => $id));
        return $query->result_array();
    }

    public function add_repertory()
    {
        $data = [
            'name' => $this->input->post('name'),
            'privacy' => $this->input->post('privacy'),
            'user_id' => $this->input->post('user_id')
        ];

        return $this->db->insert('repertories', $data);
    }

    public function update_repertory()
    {

        $data = [
            'name' => $this->input->post('name'),
            'privacy' => $this->input->post('privacy')
        ];

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('repertories', $data);
    }

    public function delete_repertory($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('repertories');
        return true;
    }

    public function delete_user_repertories($id)
    {
        // Get all repertory ids belongs to the user with id that comes as parameter
        $this->db->select('id');
        $query = $this->db->get_where('repertories', array('user_id' => $id));
        $my_temp_array = $query->result_array();

        foreach ($my_temp_array as $element) {
            // Empty repertory
            $this->db->where('repertory_id', $element['id']);
            $this->db->delete('repertory_song');
            // Delete repertory
            $this->db->where('id', $element['id']);
            $this->db->delete('repertories');
        }

        return true;
    }

    public function remove_all_songs_from_repertory($id)
    {
        $this->db->where('repertory_id', $id);
        $this->db->delete('repertory_song');

        return true;
    }

    public function remove_song_from_all_repertories($id)
    {
        $this->db->where('song_id', $id);
        $this->db->delete('repertory_song');

        return true;
    }

    public function add_song_to_repertory()
    {
        $data = [
            'song_id' => $this->input->post('song_id'),
            'repertory_id' => $this->input->post('repertory_id')
        ];

        return $this->db->insert('repertory_song', $data);
    }

    public function remove_song_from_repertory()
    {
        $this->db->where('song_id', $this->input->post('song_id'));
        $this->db->where('repertory_id', $this->input->post('repertory_id'));
        $this->db->delete('repertory_song');

        return true;
    }

    public function check_user_owner_repertory($id)
    {
        // Validate
        $this->db->where('id', $id);
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $result = $this->db->get('repertories');

        if ($result->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
