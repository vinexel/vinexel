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

use Vinexel\Modules\Config\Requirements as IconicRequirements;

class Requirements
{
    /**
     * Checking PHP version
     */
    public static function MinVersion()
    {
        IconicRequirements::MinVersion();
    }

    /**
     * Get PHP
     *
     * @return string
     */
    public static function getPhp()
    {
        return IconicRequirements::Php();
    }

    /**
     * Get Rapid
     *
     * @return string
     */
    public static function getRapid()
    {
        return IconicRequirements::Rapid();
    }
}
