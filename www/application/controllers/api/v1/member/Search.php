<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH.'/controllers/api/v1/ApiController.php';

/**
 * Class Detail
 * @property Member_model $member_model
 */
class Search extends ApiController
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('api/v1/member_model');
    }
}