<?php

/**
 * Vision Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

use Deeper\Globals\Config\Src\SysCon as SC;

define(
    'PROJECT_PATH',
    VISION_DIR .
        DIRECTORY_SEPARATOR .
        SC::get('M_Z') .
        SC::get('K_M') .
        SC::get('K_M') .
        DIRECTORY_SEPARATOR
);

define(
    'VISION_VERSION',
    SC::get('W_I') .
        SC::get('T_D') .
        SC::get('J_W') .
        SC::get('T_D') .
        SC::get('J_W')
);

define(
    'F_R',
    SC::get('T_D') .
        SC::get('I_M') .
        SC::get('M_Z') .
        SC::get('K_M') .
        SC::get('M_R') .
        SC::get('W_M') .
        SC::get('T_D') .
        SC::get('K_M') .
        SC::get('S_M') .
        SC::get('K_M')
);

define(
    'F_P',
    SC::get('K_M') .
        SC::get('S_M') .
        SC::get('K_M')
);

define(
    'PORT_DEFAULT',
    SC::get('B_W') .
        SC::get('J_W') .
        SC::get('J_W') .
        SC::get('J_W')
);

define(
    'VI',
    'MalScan by &rsaquo; VisionIconic'
);

define(
    'MS0',
    'title'
);

define(
    'MS1',
    SC::get('W_M') .
        'ashboar' .
        SC::get('W_M')
);

define(
    'MS2',
    'index'
);

define(
    'RESTRICTION',
    '<script>' .
        file_get_contents(
            VISION_DIR
                . DIRECTORY_SEPARATOR
                . 'system'
                . DIRECTORY_SEPARATOR
                . 'vendor'
                . DIRECTORY_SEPARATOR
                . 'vision'
                . DIRECTORY_SEPARATOR
                . 'fragment'
                . DIRECTORY_SEPARATOR
                . 'resources'
                . DIRECTORY_SEPARATOR
                . 'js'
                . DIRECTORY_SEPARATOR
                . 'Restrict.js'
        )
        . '</script>'
);
