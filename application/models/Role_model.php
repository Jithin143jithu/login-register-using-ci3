<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model {


    public function __construct() {
        parent::__construct();
    }

    public function get_all_user_roles() {
        $query = $this->db->select('id, role_name,status')
                        ->from(DB_ROLES . ' r')          // or use constant: DB_ROLES
                        ->where('r.status', 1)     // only active roles
                        ->get();
        return $query->result(); // array of objects
    }


}