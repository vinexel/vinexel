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

use Vinexel\Modules\Globals\Assets\AssetsManager;

class Assets
{
    public static function path(string $path): string
    {
        return AssetsManager::asset($path);
    }
}
