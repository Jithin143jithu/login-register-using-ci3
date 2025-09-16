<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    protected $table = 'users';

    public function __construct() {
        parent::__construct();
    }

    public function get_by_email($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row();
    }


    public function get_by_id($id) {
        return $this->db->where('id', (int)$id)->get($this->table)->row();
    }

    // public function create($data) {
    //     $this->db->insert($this->table, $data);
    //     return $this->db->insert_id();
    // }

    // public function update($id, $data) {
    //     return $this->db->where('id', $id)->update($this->table, $data);
    // }

    // Increment failed attempts and set last_failed_at
    // public function add_failed_attempt($user_id) {
    //     $this->db->set('failed_attempts', 'failed_attempts+1', FALSE)
    //              ->set('last_failed_at', date('Y-m-d H:i:s'))
    //              ->where('id', $user_id)
    //              ->update($this->table);
    // }

    // public function reset_failed_attempts($user_id) {
    //     $this->db->where('id', $user_id)->update($this->table, [
    //         'failed_attempts' => 0,
    //         'last_failed_at' => NULL
    //     ]);
    // }

    // Save password reset token & expiry
    // public function save_reset_token($user_id, $token, $expires_at) {
    //     return $this->db->where('id', $user_id)->update($this->table, [
    //         'reset_token' => $token,
    //         'reset_expires_at' => $expires_at
    //     ]);
    // }

    // public function get_by_reset_token($token) {
    //     return $this->db->where('reset_token', $token)
    //                     ->where('reset_expires_at >=', date('Y-m-d H:i:s'))
    //                     ->get($this->table)->row();
    // }

    // ✅ New method for RBAC
    public function get_user_permissions($role_id) {
        $query = $this->db->select('p.key_name')
                        ->from('role_permissions rp')
                        ->join('permissions p', 'p.id = rp.permission_id')
                        ->where('rp.role_id', $role_id)
                        ->get(); // ✅ execute query
        // echo $this->db-  >last_query();  // <-- shows the last executed SQL
        return array_column($query->result_array(), 'key_name');
    }
}
