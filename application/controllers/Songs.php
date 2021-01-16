<?php

class Songs extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Songs';

        $data['songs'] = $this->song_model->get_songs();

        $this->load->view('templates/header');
        $this->load->view('songs/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id)
    {
        $data['song'] = $this->song_model->get_song($id);

        if (empty($data['song'])) {
            show_404();
        }

        $data['repertories'] = $this->repertory_model->get_my_repertories_for_song($id);

        $data['title'] = $data['song']['name'];

        $this->load->view('templates/header');
        $this->load->view('songs/view', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('songs');
        }

        $data['song'] = $this->song_model->get_song($id);

        if (empty($data['song'])) {
            show_404();
        }

        $data['title'] = 'Edit Song';

        $data['artists'] = $this->artist_model->get_artists();
        $data['genres'] = $this->genre_model->get_genres();

        $this->load->view('templates/header');
        $this->load->view('songs/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update(){
        // Check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('songs');
        }

        $this->song_model->update_song();

        // Set message
        $this->session->set_flashdata('song_updated', 'Song has been updated');

        redirect('songs');
    }

    public function add()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('songs');
        }

        $data['title'] = 'Add Song';

        $data['artists'] = $this->artist_model->get_artists();
        $data['genres'] = $this->genre_model->get_genres();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('lyrics', 'Lyrics', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('songs/add', $data);
            $this->load->view('templates/footer');
        } else {
            $this->song_model->add_song();

            // Set message
            $this->session->set_flashdata('song_added', 'Song has been added');

            redirect('songs');
        }
    }

    public function delete($id)
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('songs');
        }

        $this->song_model->delete_song($id);
        $this->repertory_model->remove_song_from_all_repertories($id);

        // Set message
        $this->session->set_flashdata('song_deleted', 'Song has been deleted');

        redirect('songs');
    }
}
