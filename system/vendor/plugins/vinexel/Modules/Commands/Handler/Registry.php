<?php

namespace Vinexel\Modules\Commands\Handler;

use Vinexel\Modules\Commands\Helpers\ServeCommand;
use Vinexel\Modules\Commands\Helpers\MakeControllerCommand;
use Vinexel\Modules\Commands\Helpers\MakeModelCommand;
use Vinexel\Modules\Commands\Helpers\MakeMigrateCommand;
use Vinexel\Modules\Commands\Helpers\MakeSeedCommand;
use Vinexel\Modules\Commands\Helpers\MigrateCommand;
use Vinexel\Modules\Commands\Helpers\SeedCommand;
use Vinexel\Modules\Commands\Helpers\RollbackCommand;
use Vinexel\Modules\Commands\Helpers\ShowCommand;
use Vinexel\Modules\Commands\Helpers\MakeProjectCommand;
use Vinexel\Modules\Commands\Helpers\DeleteProjectCommand;

class Registry
{
    public static function getCommands()
    {
        return [
            'serve' => ServeCommand::class,
            'make:controller' => MakeControllerCommand::class,
            'make:model' => MakeModelCommand::class,
            'make:migrate' => MakeMigrateCommand::class,
            'make:seed' => MakeSeedCommand::class,
            'migration' => MigrateCommand::class,
            'seeder' => SeedCommand::class,
            'rollback' => RollbackCommand::class,
            'list' => ShowCommand::class,
            'make:project' => MakeProjectCommand::class,
            'delete' => DeleteProjectCommand::class,
        ];
    }
}
