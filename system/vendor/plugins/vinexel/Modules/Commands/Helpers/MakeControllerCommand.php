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

class MakeControllerCommand
{
    public function handle($arguments)
    {
        $projectName = $arguments[0] ?? 'default_project';
        $controllerName = $arguments[1] ?? 'Default';
        $make = new Make();
        $make->createController($projectName, $controllerName);
    }
}
