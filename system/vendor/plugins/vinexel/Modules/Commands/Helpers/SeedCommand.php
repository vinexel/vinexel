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

use Vinexel\Modules\Commands\Helpers\DB\Seeder;

class SeedCommand
{
    public function handle($arguments)
    {
        $projectName = $arguments[0] ?? null;
        $action = $arguments[1] ?? 'run';

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
