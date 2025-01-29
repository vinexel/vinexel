<?php

/**
 * Vision Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vision\Modules;

use Iconic\Core\Modules\Config\Requirements as IconicRequirements;

class Requirements
{
    /**
     * Memeriksa apakah versi PHP memenuhi persyaratan minimum
     */
    public static function MinVersion()
    {
        IconicRequirements::MinVersion();
    }

    /**
     * Mendapatkan ekstensi PHP
     *
     * @return string
     */
    public static function getPhp()
    {
        return IconicRequirements::Php();
    }

    /**
     * Mendapatkan ekstensi Rapid
     *
     * @return string
     */
    public static function getRapid()
    {
        return IconicRequirements::Rapid();
    }
}
