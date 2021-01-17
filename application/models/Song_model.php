<?php
class Song_model extends CI_Model
{
    // Get all songs
    public function get_songs()
    {
        $this->db->order_by('name');
        $query = $this->db->get('songs');
        return $query->result_array();
    }

    public function get_songs_search($key)
    {
        $this->db->order_by('name');
        $this->db->like('name', $key);
        $query = $this->db->get('songs');
        return $query->result_array();
    }

    // Get all songs
    public function get_all_songs_of_artist($id)
    {
        $this->db->order_by('name');
        $query = $this->db->get_where('songs', array('artist_id' => $id));
        return $query->result_array();
    }

    // Get all songs
    public function get_songs_of_genre($id)
    {
        $this->db->order_by('name');
        $query = $this->db->get_where('songs', array('genre_id' => $id));
        return $query->result_array();
    }

    // Get one song with id
    public function get_song($id)
    {
        $query = $this->db->get_where('songs', array('id' => $id));
        return $query->row_array();
    }

    public function add_song()
    {
        $data = [
            'name' => $this->input->post('name'),
            'lyrics' => $this->input->post('lyrics'),
            'genre_id' => $this->input->post('genre_id'),
            'artist_id' => $this->input->post('artist_id')
        ];

        return $this->db->insert('songs', $data);
    }

    public function update_song()
    {

        $data = [
            'name' => $this->input->post('name'),
            'lyrics' => $this->input->post('lyrics'),
            'genre_id' => $this->input->post('genre_id'),
            'artist_id' => $this->input->post('artist_id')
        ];

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('songs', $data);
    }

    public function delete_song($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('songs');
        return true;
    }

    public function remove_artist_from_songs($id)
    {
        $data = [
            'artist_id' => 1
        ];

        $this->db->where('artist_id', $id);
        return $this->db->update('songs', $data);
    }

    public function remove_genre_from_songs($id)
    {
        $data = [
            'genre_id' => 1
        ];

        $this->db->where('genre_id', $id);
        return $this->db->update('songs', $data);
    }
}
