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

use \Vinexel\Modules\Config\Loader as VisionLoader;

class Loader
{
    /**
     * Calls the Vision namespace loader to initialize and load the project.
     *
     * This method delegates the project loading process to the
     * `VisionLoader::ProjectLoader()` which handles configuration
     * and initialization for the current application environment.
     *
     * @return void
     */
    public static function ProjectLoader()
    {
        VisionLoader::ProjectLoader();
    }
}
