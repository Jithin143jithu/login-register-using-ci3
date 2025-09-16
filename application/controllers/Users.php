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
        $headerInfo = [
            'title' => 'Dashboard'
        ];
        $footerInfo = [];
        $this->loadViews("users/view", $headerInfo, $data, $footerInfo);
    }

    public function add(){
        $data = [];
        $headerInfo = [
            'title' => 'Add New Users'
        ];
        $footerInfo = [];
        $this->loadViews("users/add", $headerInfo, $data, $footerInfo);

    }


}
