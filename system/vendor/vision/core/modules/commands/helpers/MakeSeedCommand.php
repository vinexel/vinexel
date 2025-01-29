<?php

namespace Iconic\Core\Modules\Commands\Helpers;

use Iconic\Core\Modules\Commands\Make;

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
