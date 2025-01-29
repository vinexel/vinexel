<?php

namespace Iconic\Core\Modules\Commands\Handler;

use Iconic\Core\Modules\Commands\Helpers\ServeCommand;
use Iconic\Core\Modules\Commands\Helpers\MakeControllerCommand;
use Iconic\Core\Modules\Commands\Helpers\MakeModelCommand;
use Iconic\Core\Modules\Commands\Helpers\MakeMigrateCommand;
use Iconic\Core\Modules\Commands\Helpers\MakeSeedCommand;
use Iconic\Core\Modules\Commands\Helpers\MigrateCommand;
use Iconic\Core\Modules\Commands\Helpers\SeedCommand;
use Iconic\Core\Modules\Commands\Helpers\RollbackCommand;
use Iconic\Core\Modules\Commands\Helpers\ShowCommand;
use Iconic\Core\Modules\Commands\Helpers\MakeProjectCommand;
use Iconic\Core\Modules\Commands\Helpers\DeleteProjectCommand;

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
