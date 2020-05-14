<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config['data_cache'] = array(
    'default' => array(
        'type' => 'apcu', // apcu | file | both
        'expire' => 60 * 10, // second unit
        'use' => 'off' // on | off
    ),
    'short' => array(
        'type' => 'apcu',
        'expire' => 60 * 1,
        'use' => 'off'
    ),
    'middle' => array(
        'type' => 'apcu',
        'expire' => 60 * 10,
        'use' => 'off'
    ),
    'long' => array(
        'type' => 'apcu',
        'expire' => 60 * 60,
        'use' => 'off'
    ),
    'day' => array(
        'type' => 'apcu',
        'expire' => 60 * 60 * 24,
        'use' => 'off'
    ),
    'week' => array(
        'type' => 'apcu',
        'expire' => 60 * 60 * 24 * 7,
        'use' => 'off'
    ),
    'unlimite' => array(
        'type' => 'both',
        'expire' => 60 * 60 * 24 * 365,
        'use' => 'off'
    )
);
