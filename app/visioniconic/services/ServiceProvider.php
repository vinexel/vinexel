<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Visioniconic\Services;

use Vision\Modules\Container;
use Deeper\Libraries\Session;

class ServiceProvider
{
    /**
     * Mendaftarkan semua layanan internal atau API yang diperlukan spesific untuk proyek.
     */
    public static function register()
    {
        Container::singleton('session', function () {
            return new Session();
        });
    }
}
