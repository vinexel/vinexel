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

use \Vision\Modules\Config;
use \Vinexel\Modules\Request\VendorHandler;

class Initialize
{
    /**
     * Calls the Vision namespace loader to initialize the project when vendor mode is enabled.
     *
     * This method checks the configuration key `APP_VENDOR` to determine
     * if the application is running in vendor mode. If enabled, it:
     *  - Enables full error reporting.
     *  - Sets secure and CORS headers.
     *  - Handles vendor-specific HTTP requests via the VendorHandler.
     *
     * @return void
     */
    public static function vendorLoader()
    {
        $vendorMode = Config::get('APP_VENDOR', 'false');

        if ($vendorMode === '1' || $vendorMode === 'true') {

            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            /**
             * Set security and CORS headers for vendor requests.
             *
             * This ensures that cross-origin requests and basic
             * browser security policies are properly configured.
             *
             * @return void
             */
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
