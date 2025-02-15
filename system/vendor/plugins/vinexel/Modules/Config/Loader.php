<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\Config;

use Deeper\Globals\Config\Src\SysCon as SC;

class Loader
{
    public static function ProjectLoader()
    {
        spl_autoload_register(function ($class) {
            $project = explode('\\', $class)[0];
            $base_dir =
                VISION_DIR
                . DIRECTORY_SEPARATOR
                . 'app'
                . DIRECTORY_SEPARATOR;
            $prefixes = [
                "$project\\" => $base_dir . "$project/",
            ];

            foreach ($prefixes as $prefix => $base_dir) {
                $len = strlen($prefix);
                if (strncmp($prefix, $class, $len) !== 0) {
                    continue;
                }

                $relative_class = substr($class, $len);
                $file = $base_dir . str_replace(
                    '\\',
                    DIRECTORY_SEPARATOR,
                    $relative_class
                )
                    . SC::get('T_D')
                    . SC::get('K_M')
                    . SC::get('S_M')
                    . SC::get('K_M');

                // Debugging if needed
                // echo "Trying to load: $file <br>";

                if (file_exists($file)) {
                    require $file;
                    return;
                } else {
                    die("File $file not found.");
                }
            }
        });
    }
}
