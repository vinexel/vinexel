<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license Envato License
 */

namespace Vision\Modules;

use \Vision\Modules\Config;
use \Vinexel\Modules\Request\VendorHandler;

class Initialize
{
    /**
     * Memanggil Loader dari Vision namespace untuk memuat project
     */
    public static function vendorLoader()
    {
        $vendorMode = Config::get('APP_VENDOR', 'false');

        if ($vendorMode === '1' || $vendorMode === 'true') {

            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            function setCorsHeaders()
            {
                $headers = [
                    "X-Frame-Options: DENY",
                    "X-XSS-Protection: 1; mode=block",
                    "Access-Control-Allow-Origin: *",
                    "Access-Control-Allow-Methods: GET, POST, OPTIONS",
                    "Access-Control-Allow-Headers: Content-Type, Authorization"
                ];

                foreach ($headers as $header) {
                    header($header);
                }

                if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
                    http_response_code(200);
                    exit();
                }
            }

            setCorsHeaders();
            $requestHandler = new VendorHandler();
            $requestHandler->handleRequest();
        }
    }
}
