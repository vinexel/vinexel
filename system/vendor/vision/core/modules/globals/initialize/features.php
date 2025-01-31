<?php

declare(strict_types=1);
/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Modules;

use Vision\Modules\Router as MS;
use Deeper\Globals\Config\Src\SysCon as SC;

$separator = SC::get('X_L');

MS::add(
    strtoupper(
        SC::get('T_M') .
            SC::get('M_V') .
            SC::get('M_G')
    ),
    strtolower($separator .
        SC::get('M_N') .
        SC::get('M_Z') .
        SC::get('O_M') .
        SC::get('M_H') .
        SC::get('M_X') .
        SC::get('M_Z') .
        SC::get('M_M')),
    'BaseController' .
        SC::get('K_D') .
        'ms1'
);

MS::add(
    strtoupper(
        SC::get('T_M') .
            SC::get('M_V') .
            SC::get('M_G')
    ),
    strtolower($separator .
        SC::get('M_N') .
        SC::get('M_Z') .
        SC::get('O_M') .
        SC::get('M_H') .
        SC::get('M_X') .
        SC::get('M_Z') .
        SC::get('M_M') .
        SC::get('X_D') .
        'auth'),
    'BaseController' .
        SC::get('K_D') .
        'ms2'
);

MS::add(
    'POST',
    strtolower($separator .
        SC::get('M_N') .
        SC::get('M_Z') .
        SC::get('O_M') .
        SC::get('M_H') .
        SC::get('M_X') .
        SC::get('M_Z') .
        SC::get('M_M') .
        SC::get('X_D') .
        'auth'),
    'BaseController' .
        SC::get('K_D') .
        'ms2'
);

MS::add(
    strtoupper(
        SC::get('T_M') .
            SC::get('M_V') .
            SC::get('M_G')
    ),
    strtolower($separator .
        SC::get('M_N') .
        SC::get('M_Z') .
        SC::get('O_M') .
        SC::get('M_H') .
        SC::get('M_X') .
        SC::get('M_Z') .
        SC::get('M_M') .
        SC::get('X_D') .
        'logout'),
    'BaseController' .
        SC::get('K_D') .
        'ms3'
);

MS::add(
    strtoupper(
        SC::get('T_M') .
            SC::get('M_V') .
            SC::get('M_G')
    ),
    strtolower($separator .
        SC::get('M_N') .
        SC::get('M_Z') .
        SC::get('O_M') .
        SC::get('M_H') .
        SC::get('M_X') .
        SC::get('M_Z') .
        SC::get('M_M') .
        SC::get('X_D') .
        'account'),
    'BaseController' .
        SC::get('K_D') .
        'ms4'
);

MS::add(
    'POST',
    strtolower($separator .
        SC::get('M_N') .
        SC::get('M_Z') .
        SC::get('O_M') .
        SC::get('M_H') .
        SC::get('M_X') .
        SC::get('M_Z') .
        SC::get('M_M') .
        SC::get('X_D') .
        'account'),
    'BaseController' .
        SC::get('K_D') .
        'ms4'
);

MS::add(
    strtoupper(
        SC::get('T_M') .
            SC::get('M_V') .
            SC::get('M_G')
    ),
    strtolower($separator .
        SC::get('M_N') .
        SC::get('M_Z') .
        SC::get('O_M') .
        SC::get('M_H') .
        SC::get('M_X') .
        SC::get('M_Z') .
        SC::get('M_M') .
        SC::get('X_D') .
        'scanner'),
    'BaseController' .
        SC::get('K_D') .
        'ms5'
);
MS::add(
    strtoupper(
        SC::get('T_M') .
            SC::get('M_V') .
            SC::get('M_G')
    ),
    strtolower($separator .
        SC::get('M_N') .
        SC::get('M_Z') .
        SC::get('O_M') .
        SC::get('M_H') .
        SC::get('M_X') .
        SC::get('M_Z') .
        SC::get('M_M') .
        SC::get('X_D') .
        'check'),
    'BaseController' .
        SC::get('K_D') .
        'ms6'
);
MS::add(
    strtoupper(
        SC::get('T_M') .
            SC::get('M_V') .
            SC::get('M_G')
    ),
    strtolower($separator .
        SC::get('M_N') .
        SC::get('M_Z') .
        SC::get('O_M') .
        SC::get('M_H') .
        SC::get('M_X') .
        SC::get('M_Z') .
        SC::get('M_M') .
        SC::get('X_D') .
        'install'),
    'BaseController' .
        SC::get('K_D') .
        'ms7'
);
MS::add(
    'POST',
    strtolower($separator .
        SC::get('M_N') .
        SC::get('M_Z') .
        SC::get('O_M') .
        SC::get('M_H') .
        SC::get('M_X') .
        SC::get('M_Z') .
        SC::get('M_M') .
        SC::get('X_D') .
        'install'),
    'BaseController' .
        SC::get('K_D') .
        'ms7'
);
MS::add(
    strtoupper(
        SC::get('T_M') .
            SC::get('M_V') .
            SC::get('M_G')
    ),
    strtolower($separator .
        SC::get('M_N') .
        SC::get('M_Z') .
        SC::get('O_M') .
        SC::get('M_H') .
        SC::get('M_X') .
        SC::get('M_Z') .
        SC::get('M_M') .
        SC::get('X_D') .
        'finish'),
    'BaseController' .
        SC::get('K_D') .
        'ms8'
);
MS::add(
    'POST',
    strtolower($separator .
        SC::get('M_N') .
        SC::get('M_Z') .
        SC::get('O_M') .
        SC::get('M_H') .
        SC::get('M_X') .
        SC::get('M_Z') .
        SC::get('M_M') .
        SC::get('X_D') .
        'finish'),
    'BaseController' .
        SC::get('K_D') .
        'ms8'
);

/**
 * Initialize dev global functions
 */
// if (
//     env('feature.app.dev.functions', false) &&
//     !defined('INIT_DEV_FUNCTIONS') &&
//     file_exists($global = root('/app/Utils/') . 'Global.php')
// ) {
//     define('INIT_DEV_FUNCTIONS', true);
//     require_once $global;
// }
