<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vision\Modules;

use Vision\Modules\Container;
use Vision\Modules\Database;
use Deeper\Libraries\Session;

class ServiceProvider
{
    /**
     * Mendaftarkan semua layanan yang diperlukan.
     */
    public static function register()
    {
        // Registrasi session service ke container
        Container::singleton('session', function () {
            return new Session();
        });

        // Registrasi database service ke container
        Container::singleton('database', function () {
            return new Database();
        });

        // Additional function
        Container::singleton('metrix', function () {
            $execTime = microtime(true) - VISION_START;
            $execTimeInS = $execTime / 1;
            if ($execTimeInS < 1) {
                $execTimeInMS = $execTimeInS * 1000;
                return sprintf(
                    "0.%.0f milliseconds",
                    $execTimeInMS
                );
            } else {
                return sprintf(
                    "%.2f seconds",
                    $execTimeInS
                );
            }
        });
    }
}
