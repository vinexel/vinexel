<?php

namespace Iconic\Core\Modules\Commands\Helpers;

use Iconic\Core\Modules\Commands\Make;

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
