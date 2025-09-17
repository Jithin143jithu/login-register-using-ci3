<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Load a view inside the master layout
 * 
 * @param string $view     The main content view
 * @param array  $data     Data for the view
 * @param string $template The layout file
 */

class BaseController extends CI_Controller{

    protected $currentUser;
    protected $userPermissions = [];
    protected $timeout = 30*60; // idle timeout in seconds

    public function __construct() {
        parent::__construct();

        // Load User model
        $this->load->model('User_model');

         // Skip auth check for AJAX requests (handled separately in controllers)
        if ($this->input->is_ajax_request()) {
            return; // 🚀 stop here, don’t do global checks
        }
        
        // print_r($this->session->userdata());
        $user_id  = $this->session->userdata('user_id');
        if (!$user_id ) {
            redirect('auth');
        }

        //Load logged-in user info
        $this->currentUser = $this->User_model->get_by_id($user_id);

        if (!$this->currentUser) {
            $this->session->sess_destroy();
            redirect('auth');
        }

        // Fetch role permissions once
        $this->userPermissions = $this->User_model->get_user_permissions($this->currentUser->role_id);
        // print_r($this->userPermissions);
        $controller = strtolower($this->router->fetch_class());
        $method     = strtolower($this->router->fetch_method());

        $permission = $controller . '_' . $method;
        // echo $permission;echo "<br>";
        $this->checkGlobalPermission($permission);
    }

    /**
	 * This function used to check the user is logged in or not
	 */
	protected  function isLoggedIn()
    {
        $CI =& get_instance();
        $currentController = strtolower($CI->router->fetch_class());
        $isLoggedIn   = $CI->session->userdata('isLoggedIn');
        $lastActivity = $CI->session->userdata('last_activity');
        if (!$isLoggedIn || (isset($lastActivity) && (time() - $lastActivity > $this->timeout))) {
            $CI->session->sess_destroy();
            redirect('auth');
        }

        $CI->session->set_userdata('last_activity', time());

    }
    
    /**
     * Global permission check
    */
    private function checkGlobalPermission($permission) {
        if (!in_array($permission, $this->userPermissions)) {
            $this->showForbidden();
        }
    }

    /**
     * Show 403 Forbidden
    */
    private function showForbidden() {
        $this->output->set_status_header(403);
        $this->load->view('errors/html/error_403');
        echo $this->output->get_output();
        exit;
    }
    
    /**
     * This function used to load views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     */
    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){
        $this->load->view('includes/header', $headerInfo);
        $this->load->view('includes/sidebar');
        $this->load->view($viewName, $pageInfo);
        $this->load->view('includes/footer', $footerInfo);
    }


    


    
}
