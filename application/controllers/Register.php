<?php

class Register extends CI_Controller {
    public function saveData(){
        $data['first_name'] = $this->input->post('first_name');
        $data['last_name'] = $this->input->post('last_name');
        $data['email'] = $this->input->post('email');
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        
        $this->load->model('users_model', "um");
        $this->um->insertData($data);
        return redirect('users/index');
    }
}
