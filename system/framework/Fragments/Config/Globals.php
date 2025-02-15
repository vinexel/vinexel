<?php

/**
 * Vinexel Framework.
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
        strtolower(
            SC::get('M_Z') .
                SC::get('K_M') .
                SC::get('K_M')
        ) .
        DIRECTORY_SEPARATOR
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
