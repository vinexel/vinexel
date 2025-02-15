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

use Vinexel\Modules\Commands\Helpers\DB\Migrator;

class RollbackCommand
{
    public function handle($arguments)
    {
        $projectName = $arguments[0] ?? null;
        if (!$projectName) {
            echo "\e[31mError: Project name is required.\n\e[0m";
            return;
        }

        $migrator = new Migrator();
        $migrator->rollbackMigrations($projectName);
    }
}
