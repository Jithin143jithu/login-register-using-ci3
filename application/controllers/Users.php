<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Users extends BaseController {

    public function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('User_model');
    }

    public function index(){
        $data = [];
        // $data['roles'] = $this->User_model->get_roles(1);
        $headerInfo = [
            'pageTitle' => 'Users List | Admin Panel',
            'styles' => [
            'assets/datatables/css/dataTables.bootstrap.min.css'
        ]
        ];
        $footerInfo = [
            'scripts' => [                
                'assets/datatables/js/jquery.dataTables.min.js',
                'assets/datatables/js/dataTables.bootstrap.min.js',
                'assets/js/common.js',
                'assets/js/viewUser.js',
                ] // page-specific JS
        ];
        $data['users'] = $this->User_model->get_all_users();
        $this->loadViews("users/view", $headerInfo, $data, $footerInfo);
    }

    public function add(){
        $data['roles'] = $this->User_model->get_roles(1);
        $headerInfo = [
            'pageTitle' => 'Add New Users | Admin Panel'
        ];
        $footerInfo = [
            'scripts' => ['assets/js/addUser.js'] // page-specific JS
        ];
        $this->loadViews("users/add", $headerInfo, $data, $footerInfo);

    }

    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {

        $this->form_validation->set_rules('email','Email ','trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password ','trim|required|min_length[6]');
        $this->form_validation->set_rules('first_name','First Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('last_name','Last Name ','trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile','Mobile','trim|required|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('role_id','Role','trim|required|integer');

        
        if($this->form_validation->run() == FALSE)
        {

            echo json_encode([
                'status' => 'error',
                'errors' => $this->form_validation->error_array()
            ]);
            return;
        }
        else
        {
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $mobile = $this->input->post('mobile');
            $role_id = $this->input->post('role_id');
            $userInfo = array(
                'email' => $this->security->xss_clean($email),
                'password' => $this->security->xss_clean($password),
                'first_name' => $this->security->xss_clean($first_name),
                'last_name' => $this->security->xss_clean($last_name),
                'mobile' => $this->security->xss_clean($mobile),
                'role_id' => $this->security->xss_clean($role_id),
                'createdDtm'=> date('Y-m-d H:i:s')
            );
            // print_r($userInfo);
            
            $result = $this->User_model->addNewUser($userInfo);
            
            if($result){
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'errors' => ['db' => 'Database insert failed']]);
            }
            
        }
    }

    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
            $userId = $this->input->post('userId');
            $userInfo = array('status'=> '0', 'isDeleted'=> 1, 'updatedBy'=> $this->session->userdata('user_id'), 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->User_model->deleteUser($userId, $userInfo);
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
    }

    


}
