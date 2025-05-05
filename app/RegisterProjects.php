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
         * Example format:
         * In a production server, you could have domain mappings like:
         * 'yourdomain.com' => 'yourdomain', which is based on the domain name.
         */

        return [
            /**
             * Dashkit Starterkit.
             * This is the main platform for web agencies (optional).
             */
            '127.0.0.1:8000' => ucfirst('dashkit'),
            // '127.0.0.1:8001' => ucfirst('yourclientproject1'),
            // '127.0.0.1:8001' => ucfirst('yourclientproject2'),
            // Add more of your unlimited projects here.
        ];
    }
}
