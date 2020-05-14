<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/controllers/api/v1/ApiController.php';

/**
 * Class Join
 * @property Member_model $member_model
 */
class Login extends ApiController
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('api/v1/member_model');
    }

    /**
     * @api {post} /member/login 로그인
     * @apiName Login
     * @apiGroup Member
     *
     * @apiParam email 회원 이메일
     * @apiParam password 비밀번호
     *
     * @apiSuccess {Object} Json 결과
     */
    public function index_post()
    {
        $parameter = $this->api_parameter('post', array('email', 'password'));

        $email = $parameter['email'];
        $password = $parameter['password'];

        // validate email with password
        $query_params = array('email' => $email);
        $member_info = $this->member_model->get_member_info($query_params);
        $response_data = array();

        if (isset($member_info) && count($member_info) > 0) {
            if (password_verify($password, $member_info[0]->password)) {
                // login success
                // set session or make auth key
                $code = 'E0000';
                $response_data = true;
            } else {
                $code = '202';
            }
        } else {
            $code = '202';
        }

        $this->api_response($response_data, $code);

    }
}