<?php

class Genres extends CI_Controller
{
    public function index(){
        $data['title'] = 'Genres';

        $data['genres'] = $this->genre_model->get_genres_count();

        $this->load->view('templates/header');
        $this->load->view('genres/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function songs($id){
        $data['genre'] = $this->genre_model->get_genre($id);
        $data['songs'] = $this->song_model->get_songs_of_genre($id);

        $data['title'] = $data['genre']['name'];

        $this->load->view('templates/header');
        $this->load->view('genres/songs', $data);
        $this->load->view('templates/footer');
    }

    public function add(){
        // Check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('genres');
        }

        $data['title'] = 'Add Genre';

        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('genres/add', $data);
            $this->load->view('templates/footer');
        }else{
            $this->genre_model->add_genre();

            // Set message
            $this->session->set_flashdata('genre_added', 'Genre has been added');

            redirect('genres');
        }
    }

    public function edit($id)
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('genres');
        }

        $data['genre'] = $this->genre_model->get_genre($id);

        if (empty($data['genre'])) {
            show_404();
        }

        $data['title'] = 'Edit Genre';

        $this->load->view('templates/header');
        $this->load->view('genres/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('artists');
        }

        $this->genre_model->update_genre();

        // Set message
        $this->session->set_flashdata('genre_updated', 'Genre has been updated');

        redirect('genres');
    }

    public function delete($id)
    {
        if($id == 1){
            redirect('genres');
        }

        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('genres');
        }

        $this->song_model->remove_genre_from_songs($id);
        $this->genre_model->delete_genre($id);

        // Set message
        $this->session->set_flashdata('genre_deleted', 'Genre has been deleted');

        redirect('genres');
    }
}
