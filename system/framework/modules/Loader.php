<?php

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
