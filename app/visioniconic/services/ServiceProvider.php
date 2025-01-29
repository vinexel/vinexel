<?php

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
        // Registrasi session service ke container
        Container::singleton('session', function () {
            return new Session();
        });
    }
}
