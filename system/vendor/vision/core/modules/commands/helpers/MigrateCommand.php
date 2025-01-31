<?php

namespace Iconic\Core\Modules\Commands\Helpers;

use Iconic\Core\Modules\Commands\Helpers\DB\Migrator;

class MigrateCommand
{
    public function handle($arguments)
    {
        $projectName = $arguments[0] ?? null;
        if (!$projectName) {
            echo "\e[31mError: Project name is required.\n\e[0m";
            return;
        }

        $migrator = new Migrator();
        $migrator->runMigrations($projectName);
    }
}
