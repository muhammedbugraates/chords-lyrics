<?php

class Artists extends CI_Controller
{
    public function index(){
        $data['title'] = 'Artists';

        $data['artists'] = $this->artist_model->get_artists_count();

        $this->load->view('templates/header');
        $this->load->view('artists/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function songs($id){
        $data['artist'] = $this->artist_model->get_artist($id);
        $data['songs'] = $this->song_model->get_all_songs_of_artist($id);

        $data['title'] = $data['artist']['name'];

        $this->load->view('templates/header');
        $this->load->view('artists/songs', $data);
        $this->load->view('templates/footer');
    }

    public function add(){
        // Check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('artists');
        }

        $data['title'] = 'Add Artist';

        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('artists/add', $data);
            $this->load->view('templates/footer');
        }else{
            $this->artist_model->add_artist();

            // Set message
            $this->session->set_flashdata('artist_added', 'Artist has been added');

            redirect('artists');
        }
    }

    public function edit($id)
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check user admin or owner
        if (!$this->user_model->check_user_admin()) {
            redirect('artists');
        }

        $data['artist'] = $this->artist_model->get_artist($id);

        if (empty($data['artist'])) {
            show_404();
        }

        $data['title'] = 'Edit Artist';

        $this->load->view('templates/header');
        $this->load->view('artists/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check user admin or owner
        if (!$this->user_model->check_user_admin()) {
            redirect('artists');
        }

        $this->artist_model->update_artist();

        // Set message
        $this->session->set_flashdata('artist_updated', 'Artist has been updated');

        redirect('artists');
    }

    public function delete($id)
    {
        // Default artist can not be deleted. (No artist)
        if($id == 1){
            redirect('artists');
        }

        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('artists');
        }

        $this->song_model->remove_artist_from_songs($id);
        $this->artist_model->delete_artist($id);

        // Set message
        $this->session->set_flashdata('artist_deleted', 'Artist has been deleted');

        redirect('artists');
    }
}
