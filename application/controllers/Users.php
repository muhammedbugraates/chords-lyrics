<?php

class Users extends CI_Controller {

	public function index(){
		$this->load->model('users_model');
        $data['users'] = $this->users_model->getAllData();

        $this->load->view('templates/header');
        $this->load->view('users/users', $data);
        $this->load->view('templates/footer');
    }
    

    public function register(){
        $data['title'] = 'Sign Up';

        $this->load->view('templates/header');
        $this->load->view('users/register', $data);
        $this->load->view('templates/footer');
    }
}
