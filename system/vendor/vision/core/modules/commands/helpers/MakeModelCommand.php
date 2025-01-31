<?php

namespace Iconic\Core\Modules\Commands\Helpers;

use Iconic\Core\Modules\Commands\Make;

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
