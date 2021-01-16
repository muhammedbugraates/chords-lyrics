<?php

class Users extends CI_Controller
{

    public function index()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        }

        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('');
        }

        // $this->load->model('user_model');
        $data['users'] = $this->user_model->getAllData();

        $this->load->view('templates/header');
        $this->load->view('users/users', $data);
        $this->load->view('templates/footer');
    }

    public function register()
    {
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->user_model->register($enc_password);

            // Set message
            $this->session->set_flashdata('user_registered', 'You are now registered can log in');

            redirect('users/login');
        }
    }

    
    // Log in user
    public function login()
    {
        $data['title'] = 'Sign in';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {
            // Get username
            $username = $this->input->post('username');
            // Get and encrypt the password
            $password = md5($this->input->post('password'));

            //Login user
            $user_id = $this->user_model->login($username, $password);

            if ($user_id) {
                // Create session
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                // Set message
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');

                redirect('');
            } else {
                // Set message
                $this->session->set_flashdata('login_failed', 'Login is invalid');

                redirect('users/login');
            }
        }
    }

    // Log user out
    public function logout()
    {
        // Unset user_data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');

        redirect('users/login');
    }

    public function settings()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['title'] = 'Account Settings';

        $this->load->view('templates/header');
        $this->load->view('users/settings', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['user'] = $this->user_model->getUser();

        $data['title'] = 'Edit User';

        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists_if_different');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->user_model->update_user();
            $this->session->set_userdata('username', $this->input->post('username'));

            // Set message
            $this->session->set_flashdata('user_updated', 'Your account information has been updated');

            redirect('');
        }
    }

    public function delete()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        // The last admin
        if ($this->user_model->check_user_admin() && $this->user_model->number_of_admin() == 1) {
            $this->session->set_flashdata('last_admin_cannot_be_deleted', 'The last admin cannot be deleted');
            redirect('users/settings');
        }

        $data['title'] = 'Delete Account';

        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/delete', $data);
            $this->load->view('templates/footer');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $user_id = $this->user_model->delete($enc_password);

            if ($user_id) {
                $this->repertory_model->delete_user_repertories($this->session->userdata('user_id'));

                // Unset user_data
                $this->session->unset_userdata('logged_in');
                $this->session->unset_userdata('user_id');
                $this->session->unset_userdata('username');

                // Set message
                $this->session->set_flashdata('user_deleted', 'Your account has been deleted');

                redirect('');
            } else {
                // Set message
                $this->session->set_flashdata('delete_failed', 'Password is invalid');

                redirect('users/delete');
            }
        }
    }

    public function changepassword()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['user'] = $this->user_model->getUser();

        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('oldpassword', 'Old Password', 'required|callback_check_old_password');
        $this->form_validation->set_rules('password', 'New Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm New Password', 'matches[password]|differs[oldpassword]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->user_model->changepassword($enc_password);
            $this->session->set_userdata('username', $this->input->post('username'));

            // Set message
            $this->session->set_flashdata('password_changed', 'Your password has been changed');

            redirect('');
        }
    }

    public function delete_with_admin($id)
    {
        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('');
        }

        // Check user to delete is admin
        if ($this->user_model->check_id_admin($id)) {
            $this->session->set_flashdata('table_delete_admin_failed', 'Admin accounts cannot be deleted from users table');
            redirect('users');
        }

        $this->repertory_model->delete_user_repertories($id);
        $this->user_model->delete_with_admin($id);

        // Set message
        $this->session->set_flashdata('table_user_deleted', 'Account has been deleted');

        redirect('users');
    }

    public function make_admin($id)
    {
        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('');
        }

        // Check user to delete is admin
        if ($this->user_model->check_id_admin($id)) {
            redirect('users');
        }

        $this->user_model->make_admin($id);

        // Set message
        $this->session->set_flashdata('make_admin', 'Account made as admin');

        redirect('users');
    }

    public function delete_admin($id)
    {
        // Check user admin
        if (!$this->user_model->check_user_admin()) {
            redirect('');
        }

        // Check user to delete is admin
        if (!$this->user_model->check_id_admin($id)) {
            redirect('users');
        }

        // The last admin
        if($this->user_model->number_of_admin() == 1){
            redirect('users');
        }

        $this->user_model->delete_admin($id);

        // Set message
        $this->session->set_flashdata('remove_admin', 'Account made as normal user');

        redirect('users');
    }
    
    // To change password
    // Check if current password and user input match
    public function check_old_password($oldpassword)
    {
        $user = $this->user_model->getUser();
        $this->form_validation->set_message('check_old_password', 'You entered your current password incorrectly');
        if (md5($oldpassword) == $user['password']) {
            return true;
        } else {
            return false;
        }
    }

    // Check if username exists if different
    public function check_username_exists_if_different($username)
    {
        $this->form_validation->set_message('check_username_exists_if_different', 'That username is taken. Please choose a different one');
        if ($username == $this->session->userdata('username') || $this->user_model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }

    // Check if username exists
    public function check_username_exists($username)
    {
        $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
        if ($this->user_model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }

    // Check if email exists
    public function check_email_exists($email)
    {
        $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
        if ($this->user_model->check_email_exists($email)) {
            return true;
        } else {
            return false;
        }
    }
}
