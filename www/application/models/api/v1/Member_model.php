<?php
/**
 * @see https://codeigniter.com/userguide3/general/models.html
 * @see https://codeigniter.com/userguide3/database/query_builder.html
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Member_model
 * @property  $db
 */
class Member_model extends MY_Model {

    public $name;
    public $nick;
    public $password;
    public $phone;
    public $email;
    public $gender;
    // public create_time;
    // public update_time;

    public function __construct() {

        parent::__construct();
    }

    public function get_member_info($query_params = array()){
        $query = $this->db->get_where('member', $query_params);
        return $query->result();
    }

    public function insert_member_info($query_params)
    {
        $this->name = $query_params['name'];
        $this->nick = $query_params['nick'];
        $this->phone = $query_params['phone'];
        $this->password = $query_params['password'];
        $this->email = $query_params['email'];
        $this->gender = $query_params['gender'];
//        $this->create_time = time();
//        $this->update_time = time();

        return $this->db->insert('member', $this);
    }
}
