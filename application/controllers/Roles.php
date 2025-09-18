<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Roles extends BaseController {

    public function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('Role_model');
    }

    public function index(){
        $data = [];
        $headerInfo = [
            'pageTitle' => 'Role List | Admin Panel',
            'styles' => [
            'assets/datatables/css/dataTables.bootstrap.min.css'
        ]
        ];
        $footerInfo = [
            'scripts' => [                
                'assets/datatables/js/jquery.dataTables.min.js',
                'assets/datatables/js/dataTables.bootstrap.min.js',
                //'assets/js/common.js',
                //'assets/js/viewUser.js',
                ] // page-specific JS
        ];
        $data['roles'] = $this->Role_model->get_all_user_roles();
        $this->loadViews("roles/view", $headerInfo, $data, $footerInfo);
    }



}