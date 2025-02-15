<?php

namespace App;

class RegisterProjects
{
    /**
     * Get registered domain is already register
     * @return array
     */
    public static function getDomains(): array
    {
        /**
         * Example in production server: 'yourdomain.com' => 'yourdomain', based on domain name.
         */
        return [
            '127.0.0.1:8000' => ucfirst('elwira'),
        ];
    }
}
