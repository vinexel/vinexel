<?php

/**
 * Vision Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Core\Modules\Config;

use App\RegisterProjects as URL;

class Projects
{
    public static function getProjectName($currentDomain)
    {
        if (array_key_exists($currentDomain, URL::getDomains())) {
            return URL::getDomains()[$currentDomain];
        } else {
            die("Invalid domain: $currentDomain");
        }
    }
}
