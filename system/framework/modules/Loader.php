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

use Iconic\Core\Modules\Config\Loader as VisionLoader;

class Loader
{
    /**
     * Memanggil Loader dari Vision namespace untuk memuat project
     */
    public static function ProjectLoader()
    {
        // Panggil Loader dari Vision\Core\Modules\Loader
        VisionLoader::ProjectLoader();
    }
}
