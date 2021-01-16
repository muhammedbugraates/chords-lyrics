<?php

class Repertories extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'All Repertories';

        $data['repertories'] = $this->repertory_model->get_repertories_count();
        $data['my_repertories'] = $this->repertory_model->get_my_repertories_count();

        $this->load->view('templates/header');
        $this->load->view('repertories/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id)
    {
        $data['repertory'] = $this->repertory_model->get_repertory($id);

        if (empty($data['repertory'])) {
            show_404();
        }
        
        // Check for private repertories
        if ($data['repertory']['privacy'] == 1) {
            // Check login
            if (!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            // Check user admin or owner
            if (!$this->user_model->check_user_admin() && !$this->repertory_model->check_user_owner_repertory($data['repertory']['id'])) {
                redirect('repertories');
            }
        }

        $data['title'] = $data['repertory']['name'];
        $data['songs'] = $this->repertory_model->get_repertory_songs($id);


        $this->load->view('templates/header');
        $this->load->view('repertories/view', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check user admin or owner
        if (!$this->user_model->check_user_admin() && !$this->repertory_model->check_user_owner_repertory($id)) {
            redirect('repertories');
        }

        $data['repertory'] = $this->repertory_model->get_repertory($id);

        if (empty($data['repertory'])) {
            show_404();
        }

        $data['title'] = 'Edit Repertory';


        $this->load->view('templates/header');
        $this->load->view('repertories/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check user admin or owner
        if (!$this->user_model->check_user_admin() && !$this->repertory_model->check_user_owner_repertory($this->input->post('id'))) {
            redirect('repertories');
        }

        $this->repertory_model->update_repertory();

        // Set message
        $this->session->set_flashdata('repertory_updated', 'Repertory has been updated');

        redirect('repertories');
    }

    public function add()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['title'] = 'Add Repertory';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('privacy', 'privacy', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('repertories/add', $data);
            $this->load->view('templates/footer');
        } else {
            $this->repertory_model->add_repertory();

            // Set message
            $this->session->set_flashdata('repertory_added', 'Repertory has been added');

            redirect('repertories');
        }
    }
    public function delete($id)
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check user admin or owner
        if (!$this->user_model->check_user_admin() && !$this->repertory_model->check_user_owner_repertory($id)) {
            redirect('repertories');
        }

        $this->repertory_model->remove_all_songs_from_repertory($id);
        $this->repertory_model->delete_repertory($id);
        
        // Set message
        $this->session->set_flashdata('repertory_deleted', 'Repertory has been deleted');

        redirect('repertories');
    }

    public function add_song_to_repertory()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check user admin or owner
        if (!$this->user_model->check_user_admin() && !$this->repertory_model->check_user_owner_repertory($this->input->post('repertory_id'))) {
            redirect('repertories');
        }

        $this->repertory_model->add_song_to_repertory();

        // Set message
        $this->session->set_flashdata('song_added_to_repertory', 'Song has been added to repertory');

        redirect('repertories/' . $this->input->post('repertory_id'));
    }

    public function remove_song_from_repertory()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // Check repertory owner
        if (!$this->user_model->check_user_admin() && !$this->repertory_model->check_user_owner_repertory($this->input->post('repertory_id'))) {
            redirect('repertories');
        }

        $this->repertory_model->remove_song_from_repertory();

        // Set message
        $this->session->set_flashdata('song_removed_from_repertory', 'Song has been removed from repertory');

        redirect('repertories/' . $this->input->post('repertory_id'));
    }
}
