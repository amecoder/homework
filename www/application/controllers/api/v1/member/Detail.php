<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/controllers/api/v1/ApiController.php';

/**
 * Class Detail
 * @property Member_model $member_model
 */
class Detail extends ApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/v1/member_model');
    }

    /**
     * @api {get} /member/join?:member_seq 회원 상세정보
     * @apiName Detail
     * @apiGroup Member
     *
     * @apiParam member_seq 회원 번호
     *
     * @apiSuccess {Object} Json 결과
     */
    public function info_get()
    {
        $parameter = $this->api_parameter('get', array('member_seq'));
        $member_seq = isset($parameter['member_seq']) ? $parameter['member_seq'] : '';

        $response_data = array();
        $query_params = array('member_seq' => $member_seq);
        $member_info = $this->member_model->get_member_info($query_params);

        if (isset($member_info) && count($member_info) > 0) {
            $response_data = $member_info[0];
            $code = '200';
        } else {
            $code = '202';
        }

        $this->api_response($response_data, $code);
    }
}