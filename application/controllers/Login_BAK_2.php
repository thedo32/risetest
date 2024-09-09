<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mlogin');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Load index page
    function index() {
        $this->load->view('view_header');
        $this->load->view('vlogin');
        $this->load->view('view_footer');
    }

    // Handle web login action
    public function actionlogin() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Fetch user from database
        $user = $this->Mlogin->get_user_by_username($username);

        if ($user && password_verify($password, $user->password)) {
            // Set session data
            $data_session = array(
                'id' => $user->id,
                'name' => $user->name,
                'username' => $username,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);

            // Update user's session_id in the database
            $this->db->where('id', $user->id);
            $this->db->update('users', array('session_id' => session_id()));

            // Redirect to home page
            redirect(base_url('home'));

        } else {
            // Invalid credentials
            $this->session->set_tempdata('error_login', 'Invalid username or password, Login again or register');
            $this->session->sess_destroy();
            redirect(base_url('login'));
        }
    }

    // Handle API login action
    public function apilogin() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Fetch user from database
        $user = $this->Mlogin->get_user_by_username($username);

        if ($user && password_verify($password, $user->password)) {
            // Set session data
            $data_session = array(
                'id' => $user->id,
                'name' => $user->name,
                'username' => $username,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);

            // Update user's session_id in the database
            $this->db->where('id', $user->id);
            $this->db->update('users', array('session_id' => session_id()));

            $response = array(
                'status' => 'success',
                'message' => 'Login successful',
                'data' => array(
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $username,
                    'session_id' => session_id()
                )
            );

            // Send JSON response
            echo json_encode($response);
            exit();

        } else {
            // Handle login failure
            if (/* condition indicating web login is necessary */ false) {
                $response = array(
                    'status' => 'web_login',
                    'message' => 'Please log in through the website.',
                    'redirect_url' => base_url('login')
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Invalid username or password'
                );
            }

            echo json_encode($response);
            exit();
        }
    }

    function logout() {
        // Fetch user ID from session
        $user_id = $this->session->userdata('id');

        if ($user_id) {
            // Clear session data in database
            $this->db->where('id', $user_id);
            $this->db->update('users', array('session_id' => NULL));

            // Destroy the session
            $this->session->sess_destroy();
        }

        // Redirect to login page
        redirect(base_url('login'));
    }
}
