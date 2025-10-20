<?php

namespace App;

class RegisterProjects
{
    /**
     * Get a list of registered domains and their associated project names.
     * This function is used to register multiple domains and map them to the
     * corresponding project names in your system.
     *
     * @return array Associative array of domain names mapped to project names.
     */
    public static function getDomains(): array
    {
        /**
         * Example format for non-hybrid:
         * In a production server, you could have domain mappings like:
         * 'yourdomain.com' => 'yourdomain', which is based on the domain name.
         */

        return [
            /**
             * Vinexel Projects.
             * This is the main platform for web agencies (optional).
             */
            '127.0.0.1:8000' => ucfirst('elwira'),
            '127.0.0.1:8001' => ucfirst('flymetrade'),
            '127.0.0.1:8002' => ucfirst('visioniconic'),
            '127.0.0.1:8003' => ucfirst('dashkit'),
            // '127.0.0.1:8001' => ucfirst('yourclientproject1'),
            // '127.0.0.1:8002' => ucfirst('yourclientproject2'),
            // Add more your projects here.
        ];
    }
}
