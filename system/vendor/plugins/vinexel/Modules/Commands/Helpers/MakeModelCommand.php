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

class MakeModelCommand
{
    public function handle($arguments)
    {
        $projectName = $arguments[0] ?? 'default_project';
        $modelName = $arguments[1] ?? 'Default';
        $make = new Make();
        $make->createModel($projectName, $modelName);
    }
}
