<?php

namespace Iconic\Core\Modules\Commands\Helpers;

use Iconic\Core\Modules\Commands\Helpers\DB\Seeder;

class SeedCommand
{
    public function handle($arguments)
    {
        $projectName = $arguments[0] ?? null;
        $action = $arguments[1] ?? 'run'; // Default action is to run seeders

        if (!$projectName) {
            echo "\e[31mError: Project name is required.\n\e[0m";
            return;
        }

        $seeder = new Seeder();

        if ($action === 'rollback') {
            $seeder->rollbackSeeders($projectName);
        } else {
            $seeder->runSeeders($projectName);
        }
    }
}
