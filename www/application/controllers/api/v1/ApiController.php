<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header('Access-Control-Allow-Origin: *');

require APPPATH.'/libraries/REST_Controller.php';

class ApiController extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
    }

    public function api_response($data, $code)
    {

        $error_codes = $this->config->item('error_codes');

        if (array_key_exists($code, $error_codes)) {

            if ($code == 'E0000') {
                $response = $data;
            } else {
                $response = is_array($data) ? array_merge($error_codes[$code], $data) : $error_codes[$code];
            }
        } else {

            $response = $error_codes['205'];
        }

        $this->response($response);
    }

    public function api_parameter($method, $require_parameters = array())
    {

        $parameters_data = array();

        if ($method == 'post_get') {

            if ($this->input->post(null, true)) {
                $parameters_data = $this->input->post(null, true);
            } elseif ($this->input->get(null, true)) {
                $parameters_data = $this->input->get(null, true);
            }
        } elseif ($method == 'post') {

            $parameters_data = $this->input->post(null, true);
        } elseif ($method == 'get') {

            $parameters_data = $this->input->get(null, true);
        }

        if ($require_parameters) {
            $this->check_parameter($parameters_data, $require_parameters);
        }

        return $parameters_data;
    }

    private function check_parameter($params_data, $params_key)
    {

        foreach ($params_key as $value) {

            if (!array_key_exists($value, $params_data)) {

                $this->api_response('', '201');
            }
        }
    }

    public function http_response($code, $aler = '')
    {
        $result = array();

        if ($code == 404) {
            $result = array(
                'result' => (string) $code,
                'result_msg' => $this->http_response_msg($code),
                'result_alert' => $aler,
                'server_datetime' => date('YmdHis')
            );
        }

        return $result;
    }

    public function http_response_msg($code)
    {
        $http_code = $this->config->item('http_code');
        return $http_code[$code]['msg'];
    }

}
