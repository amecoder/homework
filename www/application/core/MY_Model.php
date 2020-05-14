<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    private $cache_config;
    private $app_cnofig;

    public function __construct() {
    
        $this->cache_config = $this->config->item('data_cache');
        $this->app_cnofig = $this->config->item('app_cnofig');
    }

    public function curl_request_post($data) {

        $url = '';
        $parameter = array();
        $option = array();
        $header = array();

        if (isset($data['url'])) {
            $url = $data['url'];
        }

        if (isset($data['parameter']) && is_array($data['parameter'])) {
            $parameter = $data['parameter'];
        }

        if (isset($data['option']) && is_array($data['option'])) {
            $option = $data['option'];
        }

        if (isset($data['header']) && is_array($data['header'])) {
            $header = $data['header'];
        }

        return $this->curl_handle_post($url, $parameter, $option, $header);
    }

    public function curl_request_get($data) {

        $url = '';
        $parameter = array();
        $option = array();
        $header = array();

        if (isset($data['url'])) {
            $url = $data['url'];
        }

        if (isset($data['parameter']) && is_array($data['parameter'])) {
            $parameter = $data['parameter'];
        }

        if (isset($data['option']) && is_array($data['option'])) {
            $option = $data['option'];
        }

        if (isset($data['header']) && is_array($data['header'])) {
            $header = $data['header'];
        }

        return $this->curl_handle_get($url, $parameter, $option, $header);
    }

    private function curl_handle_post($url, $parameter = array(), $option = array(), $header = array()) {

        try {
            $this->load->library('curl');
            $curl = new Curl();

            $curl->options['CURLOPT_ENCODING'] = 'gzip,deflate';
            $curl->options['CURLOPT_AUTOREFERER'] = true;
            $curl->options['CURLOPT_SSL_VERIFYHOST'] = false;
            $curl->options['CURLOPT_SSL_VERIFYPEER'] = false;

            if ($option && is_array($option)) {
                $curl->options = array_merge($curl->options, $option);
            }

            if ($header && is_array($header)) {
                $curl->headers = array_merge($curl->headers, $header);
            }

            $response = $curl->post($url, $parameter);
            
            if ($response) {

                if (isset($response->body) && isset($response->headers)) {

                    if ($response->headers['Status-Code'] == '200') {

                        return $response->body;
                    }
                }
            }
        } catch (Exception $e) {

            return false;
        }

        return false;
    }

    public function curl_handle_get($url, $parameter = array(), $option = array(), $header = array()) {

        try {
            $this->load->library('curl');
            $curl = new Curl();

            $curl->options['CURLOPT_ENCODING'] = 'gzip,deflate';
            $curl->options['CURLOPT_AUTOREFERER'] = true;
            $curl->options['CURLOPT_SSL_VERIFYHOST'] = false;
            $curl->options['CURLOPT_SSL_VERIFYPEER'] = false;

            if ($option && is_array($option)) {
                $curl->options = array_merge($curl->options, $option);
            }

            if ($header && is_array($header)) {
                $curl->headers = $header;
            }

            $response = $curl->get($url, $parameter);

            if ($response) {

                if (isset($response->body) && isset($response->headers)) {

                    if ($response->headers['Status-Code'] == '200') {

                        return $response->body;
                    }
                }
            }
        } catch (Exception $e) {

            return false;
        }

        return false;
    }

    public function curl_handle_put($url, $parameter = array(), $option = array(), $header = array()) {

        try {
            $this->load->library('curl');
            $curl = new Curl();

            $curl->options['CURLOPT_ENCODING'] = 'gzip,deflate';
            $curl->options['CURLOPT_AUTOREFERER'] = true;
            $curl->options['CURLOPT_SSL_VERIFYHOST'] = false;
            $curl->options['CURLOPT_SSL_VERIFYPEER'] = false;

            if ($option && is_array($option)) {
                $curl->options = array_merge($curl->options, $option);
            }

            if ($header && is_array($header)) {
                $curl->headers = array_merge($curl->headers, $header);
            }

            $response = $curl->put($url, $parameter);

            if ($response) {

                if (isset($response->body) && isset($response->headers)) {

                    if ($response->headers['Status-Code'] == '200') {

                        return $response->body;
                    }
                }
            }
        } catch (Exception $e) {

            return false;
        }

        return false;
    }

    public function curl_handle_delete($url, $parameter = array(), $option = array(), $header = array()) {

        try {
            $this->load->library('curl');
            $curl = new Curl();

            $curl->options['CURLOPT_ENCODING'] = 'gzip,deflate';
            $curl->options['CURLOPT_AUTOREFERER'] = true;
            $curl->options['CURLOPT_SSL_VERIFYHOST'] = false;
            $curl->options['CURLOPT_SSL_VERIFYPEER'] = false;

            $curl->options = array('CURLOPT_ENCODING' => 'gzip,deflate');

            if ($option && is_array($option)) {
                $curl->options = array_merge($curl->options, $option);
            }

            if ($header && is_array($header)) {
                $curl->headers = array_merge($curl->headers, $header);
            }

            $response = $curl->delete($url, $parameter);

            if ($response) {

                if (isset($response->body) && isset($response->headers)) {

                    if ($response->headers['Status-Code'] == '200') {

                        return $response->body;
                    }
                }
            }
        } catch (Exception $e) {

            return false;
        }

        return false;
    }

    public function async_curl_handle_post($url, array $post = NULL, array $options = array()) {

        $defaults = array(
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_HTTPHEADER => array('Expect:'),
            CURLOPT_ENCODING => 'gzip,deflate',
            CURLOPT_URL => $url,
            CURLOPT_FRESH_CONNECT => TRUE,
            CURLOPT_RETURNTRANSFER => FALSE,
            CURLOPT_NOSIGNAL => 1,
            CURLOPT_TIMEOUT_MS => 1,
            CURLOPT_POSTFIELDS => http_build_query($post),
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        curl_exec($ch);
        curl_close($ch);
    }

    public function async_curl_handle_get($url, array $post = NULL, array $options = array()) {

        $defaults = array(
            CURLOPT_POST => 0,
            CURLOPT_HEADER => 0,
            CURLOPT_HTTPHEADER => array('Expect:'),
            CURLOPT_ENCODING => 'gzip,deflate',
            CURLOPT_URL => $url,
            CURLOPT_FRESH_CONNECT => TRUE,
            CURLOPT_RETURNTRANSFER => FALSE,
            CURLOPT_NOSIGNAL => 1,
            CURLOPT_TIMEOUT_MS => 1,
            CURLOPT_POSTFIELDS => http_build_query($post),
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        curl_exec($ch);
        curl_close($ch);
    }

    private function data_cache_get($key, $type) {

        $value = false;
        if ($type == 'apcu') {

            $value = $this->apcu_cache_select($key);
        } elseif ($type == 'file') {

            $value = $this->file_cache_select($key);
        } elseif ($type == 'both') {

            $value = $this->apcu_cache_select($key);
            if (!$value) {
                $value = $this->file_cache_select($key);
            }
        }
        return $value;
    }

    private function data_cache_set($key, $value, $expire, $type) {

        if ($type == 'apcu' && $expire > 0) {

            return $this->apcu_cache_create($key, $value, $expire);
        } elseif ($type == 'file' && $expire > 0) {

            return $this->file_cache_create($key, $value, $expire);
        } elseif ($type == 'both' && $expire > 0) {

            $apcu = $this->apcu_cache_create($key, $value, $expire);
            $file = $this->file_cache_create($key, $value, $expire);

            return $apcu && $file;
        }

        return false;
    }

    private function data_cache_delete($key, $type) {

        if ($type == 'apcu') {

            return $this->apcu_cache_delete($key);
        } elseif ($type == 'file') {

            return $this->file_cache_delete($key);
        } elseif ($type == 'both') {

            $apcu = $this->apcu_cache_delete($key);
            $file = $this->file_cache_delete($key);

            return $apcu && $file;
        }

        return false;
    }

    private function make_key($key) {

        return md5($key);
    }

    private function apcu_cache_create($key, $data, $expire) {

        return $this->cache->apcu->save($key, $data, $expire);
    }

    private function apcu_cache_select($key) {

        return $this->cache->apcu->get($key);
    }

    private function apcu_cache_delete($key) {

        return $this->cache->apcu->delete($key);
    }

    private function file_cache_create($key, $data, $expire) {

        return $this->cache->file->save($key, $data, $expire);
    }

    private function file_cache_select($key) {

        return $this->cache->file->get($key);
    }

    private function file_cache_delete($key) {

        return $this->cache->file->delete($key);
    }

}
