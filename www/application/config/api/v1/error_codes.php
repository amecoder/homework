<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$config['error_codes'] = array(
    'E0000' => array(
        'result_code' => 'E0000',
        'result_message' => 'Bypass Data'
    ),
    '200' => array(
        'result_code' => '200',
        'result_message' => 'Success'
    ),
    '201' => array(
        'result_code' => '201',
        'result_message' => 'Required parameters'
    ),
    '202' => array(
        'result_code' => '202',
        'result_message' => 'No Data'
    ),
    '203' => array(
        'result_code' => '203',
        'result_message' => 'Update Fail'
    ),
    '204' => array(
        'result_code' => '204',
        'result_message' => 'Internal Error'
    ),
    '205' => array(
        'result_code' => '205',
        'result_message' => 'ETC Error'
    )
);