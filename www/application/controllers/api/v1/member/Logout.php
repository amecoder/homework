<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/controllers/api/v1/ApiController.php';

/**
 * Class Join
 * @property Member_model $member_model
 */
class Logout extends ApiController
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('api/v1/member_model');
    }

    /**
     * @api {get} /member/logout 로그아웃
     * @apiName Logout
     * @apiGroup Member
     *
     * @apiSuccess {Object} Json 결과
     */
    public function index_get()
    {
        // if auth key exists
        // get auth key
        // log out

        // release session or auth key
    }
}