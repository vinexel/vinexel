<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\Commands\Helpers;

use Vinexel\Modules\Commands\Make;

class MakeSeedCommand
{
    public function handle($arguments)
    {
        $projectName = $arguments[0] ?? 'default_project';
        $seedName = $arguments[1] ?? 'DefaultSeed';

        $make = new Make();
        $make->createSeed($projectName, $seedName);
    }
}
