<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


    public function __construct() {
        parent::__construct();
    }

    public function get_by_email($email)
    {
        return $this->db->get_where(DB_USERS . ' u', ['u.email' => $email])->row();
    }


    public function get_by_id($id) {
        return $this->db->where('u.id', (int)$id)->get(DB_USERS . ' u')->row();
    }

    // ✅ New method for RBAC
    public function get_user_permissions($role_id) {
        $query = $this->db->select('p.key_name')
                        ->from(DB_ROLE_PERMISSIONS . ' rp')
                        ->join(DB_PERMISSIONS . ' p', 'p.id = rp.permission_id')
                        ->where('rp.role_id', $role_id)
                        ->get(); // ✅ execute query
        // echo $this->db-  >last_query();  // <-- shows the last executed SQL
        return array_column($query->result_array(), 'key_name');
    }

    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert(DB_USERS, $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    // Get all users
    public function get_all_users() {
        $this->db->select('u.*, r.role_name');  // select all user fields + role_name
        $this->db->from(DB_USERS . ' u');
        $this->db->join(DB_ROLES . ' r', 'u.role_id = r.id', 'left'); // join roles
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * This function is used to soft delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($userId, $userInfo)
    {
        $this->db->where('u.id', $userId);
        $this->db->update(DB_USERS . ' u', $userInfo);
        //echo $this->db->last_query();
        return $this->db->affected_rows();
    }

    public function get_roles($status = null) {
        if ($status !== null) {
            $this->db->where('r.status', $status);
        }
        $query = $this->db->get(DB_ROLES . ' r');
        return $query->result();
    }
    
}
