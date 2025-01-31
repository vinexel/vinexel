<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace App;

class RegisterProjects
{
    /**
     * 
     * Mendapatkan daftar domain yang terdaftar
     * Get registered domain is already register
     * 
     * @return array
     */
    public static function getDomains(): array
    {
        /**
         * 
         * Exampale in production server: 'yourdomain.com' => 'yourdomain', based on project folder name.
         * 
         */
        return [
            // '127.0.0.1:RANDOM PORT' => 'PROJECT FOLDER NAME',
            '127.0.0.1:8000' => 'visioniconic',
        ];
    }
}
