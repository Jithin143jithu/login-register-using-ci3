<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController {

    public function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('User_model');
    }

    public function index(){
        $data['user'] = $this->User_model->get_by_id($this->session->userdata('user_id'));
        $data = [];
        $this->global['pageTitle'] = 'Dashboard';
        $footerInfo = [];
        $this->loadViews("dashboard", $this->global, $data, $footerInfo);
    }

}
