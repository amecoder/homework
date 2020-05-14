<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Common {

    public function array_searched($items, $search = array()) {

        $return_item = null;

        if (!empty($items)) {
            foreach ($items as $item) {

                if (is_object($item)) {
                    $item = get_object_vars($item);
                }

                $result = array_diff_assoc($search, $item);
                //echo count($result);
                //echo '<br />';
                if (count($result) == 0) {
                    $return_item = $item;
                }
            }
        }
        return $return_item;
    }

    public function array_searched_list($items, $search = array()) {

        $return_item = array();

        if (!empty($items)) {
            foreach ($items as $item) {

                if (is_object($item)) {
                    $item = get_object_vars($item);
                }

                $result = array_diff_assoc($search, $item);
//                echo count($result);exit;
                //echo '<br />';
                if (count($result) == 0) {
                    $return_item[] = $item;
                }
            }
        }
        return $return_item;
    }

    public function array_multi_key_exists(array $arrNeedles, array $arrHaystack, $blnMatchAll = true) {
        $blnFound = array_key_exists(array_shift($arrNeedles), $arrHaystack);

        if ($blnFound && (count($arrNeedles) == 0 || !$blnMatchAll))
            return true;

        if (!$blnFound && count($arrNeedles) == 0 || $blnMatchAll)
            return false;

        return $this->array_multi_key_exists($arrNeedles, $arrHaystack, $blnMatchAll);
    }

    public function secondsTotimeFormat($seconds) {
        $hours = floor($seconds / 3600);
        $mins = floor(($seconds - $hours * 3600) / 60);
        $s = $seconds - ($hours * 3600 + $mins * 60);

        $mins = ($mins < 10 ? "0" . $mins : "" . $mins);
        $s = ($s < 10 ? "0" . $s : "" . $s);

        $time = ($hours > 0 ? $hours . ":" : "") . $mins . ":" . $s;

        return $time;
    }

}
