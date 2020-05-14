<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/controllers/api/v1/ApiController.php';

/**
 * Class Join
 * @property Member_model $member_model
 */
class Join extends ApiController {

    public function __construct() {

        parent::__construct();
        $this->load->model('api/v1/member_model');
    }


    /**
     * @api {post} /member/join 회원가입
     * @apiName Join
     * @apiGroup Member
     *
     * @apiParam email 회원 이메일
     * @apiParam name 이름
     * @apiParam nick 별명
     * @apiParam password 비밀번호
     * @apiParam phone 전화번호
     * @apiParam gender 성별
     *
     * @apiSuccess {Object} Json 결과
     */
    public function save_post() {

        $parameter = $this->api_parameter('post', array('name', 'nick', 'password', 'phone', 'email'));
        $parameter['gender'] = $this->input->post('gender', true);


        $name = isset($parameter['name']) ? $parameter['name'] : '';
        $nick = isset($parameter['nick']) ? $parameter['nick'] : '';
        $password = isset($parameter['password']) ? $parameter['password'] : '';
        $hp_no = isset($parameter['phone']) ? $parameter['phone'] : '';
        $email = isset($parameter['email']) ? $parameter['email'] : '';
        $gender = isset($parameter['gender']) ? $parameter['gender'] : '';

        $query_params = array();
        $query_params['name'] = $name;
        $query_params['nick'] = $nick;
        $query_params['password'] = password_hash($password, PASSWORD_BCRYPT);
        $query_params['phone'] = $hp_no;
        $query_params['email'] = $email;
        $query_params['gender'] = $gender;

        $result_data = $this->member_model->insert_member_info($query_params);

        $response_data = array();
        if (isset($result_data)) {
            $response_data = $result_data;
            $code = '200';
        } else {
            $code = '202';
        }

        $this->api_response($response_data, $code);
    }

}
