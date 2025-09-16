<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index(){
        $this->load->view('auth/login');
    }
    

    // AJAX login endpoint
    public function login_ajax()
    {
        $response = [];
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        if (empty($email) || empty($password)) {
            $response['status'] = 'error';
            $response['message'] = 'Email and password are required.';
            echo json_encode($response);
            return;
        }

        $user = $this->User_model->get_by_email($email);
        // print_r($user);
        if (!$user) {
            $response['status'] = 'error';
            $response['message'] = 'Invalid email or password.';
            echo json_encode($response);
            return;
        }

        if (!password_verify($password, $user->password)) {
            $response['status'] = 'error';
            $response['message'] = 'Invalid email or password.';
            echo json_encode($response);
            return;
        }
        $permissions = $this->User_model->get_user_permissions($user->role_id);
        // print_r($permissions);
        $sessionData = [
            'user_id'     => $user->id,
            'role_id'     => $user->role_id,
            'isLoggedIn'  => true,
            'last_activity' => time(),
            'permissions' => $permissions
        ];
        // print_r($sessionData);

        // Save user session
        $this->session->set_userdata($sessionData);

        $response['status']  = 'success';
        $response['message'] = 'Login successful. Redirecting...';
        $response['redirect_url'] = base_url('dashboard'); // you can make this dynamic if needed

        echo json_encode($response);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }

    
}
