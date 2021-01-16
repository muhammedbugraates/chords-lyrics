<?php
class user_model extends CI_Model
{
    public function getAllData()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function getUser()
    {
        $query = $this->db->get_where('users', array('id' => $this->session->userdata('user_id')));
        return $query->row_array();
    }

    public function register($enc_password)
    {
        // User data array
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password
        );

        // Insert user
        return $this->db->insert('users', $data);
    }

    public function update_user()
    {
        // User data array
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'username' => $this->input->post('username')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('users', $data);
    }

    public function delete($enc_password)
    {
        // Validate
        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->where('password', $enc_password);
        $result = $this->db->get('users');

        if ($result->num_rows() == 1) {
            $this->db->where('id', $this->session->userdata('user_id'));
            $this->db->where('password', $enc_password);
            $this->db->delete('users');
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    public function delete_with_admin($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return true;
    }

    public function changepassword($enc_password)
    {
        // User data array
        $data = array(
            'password' => $enc_password
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('users', $data);
    }

    // Check username exists
    public function check_username_exists($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    // Check email exists
    public function check_email_exists($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    // Log user in
    public function login($username, $password)
    {
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('users');

        if ($result->num_rows() == 1) {
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    public function check_user_admin()
    {
        // Validate
        $this->db->where('id', $this->session->userdata('user_id'));
        $result = $this->db->get('admins');

        if ($result->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_id_admin($id)
    {
        // Validate
        $this->db->where('id', $id);
        $result = $this->db->get('admins');

        if ($result->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function make_admin($id)
    {
        // User data array
        $data = array(
            'id' => $id
        );

        // Insert user
        return $this->db->insert('admins', $data);
    }


    public function number_of_admin()
    {
        $result = $this->db->get('admins');
        return $result->num_rows();
    }

    public function delete_admin($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admins');
        return true;
    }
}
