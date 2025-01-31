<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Core\Modules\Commands\Helpers;

class ShowCommand
{
    const COLOR_RESET = "\e[0m";
    const COLOR_GREEN = "\e[32m";
    const COLOR_YELLOW = "\e[33m";
    const COLOR_BLUE = "\e[34m";
    const COLOR_WHITE = "\e[97m";
    const COLOR_GRAY = "\e[90m";
    const COLOR_DARK_GRAY = "\e[1;30m";

    public function handle($arguments)
    {
        if (isset($arguments[0]) && $arguments[0] === 'make') {
            $this->listMakeCommands();
            return;
        }

        if (isset($arguments[0]) && $arguments[0] === 'migrate') {
            $this->listMigrateCommands();
            return;
        }

        echo self::COLOR_YELLOW . "Vision Framework Command Line Tool\n\n" . self::COLOR_RESET;

        $this->displayTableHeader();

        $this->listAllCommands();
        echo str_repeat('-', 100) . "\n";
    }

    protected function displayTableHeader()
    {
        echo str_repeat('-', 100) . "\n";
        echo self::COLOR_BLUE . str_pad('Command', 18)
            . str_pad('Arguments', 40)
            . str_pad('Description', 50)
            . self::COLOR_RESET . "\n";
        echo str_repeat('-', 100) . "\n";
    }

    protected function listAllCommands()
    {
        $this->displayRow('serve', '', 'Run the local development server');
        echo self::COLOR_GRAY . str_repeat('-', 100) . "\n";

        $this->displayRow('migration', '[ProjectName]', 'Run the database migrations');
        echo self::COLOR_GRAY . str_repeat('-', 100) . "\n";

        $this->displayRow('seeder', '[ProjectName]', 'Run the database seeders');
        echo self::COLOR_GRAY . str_repeat('-', 100) . "\n";

        $this->displayRow('rollback', '[ProjectName]', 'Rollback the last database migration');
        echo self::COLOR_GRAY . str_repeat('-', 100) . "\n";

        $this->displayRow('list', '', 'Show all available commands');
        echo self::COLOR_GRAY . str_repeat('-', 100) . "\n";

        $this->displayRow('delete', '[ProjectName]', 'Delete an existing project and its domain entry');
        echo self::COLOR_GRAY . str_repeat('-', 100) . "\n";

        echo "\n" . self::COLOR_BLUE . str_pad('Make Commands', 18)
            . str_pad('', 40)
            . str_pad('Description', 50)
            . self::COLOR_RESET . "\n";
        echo str_repeat('-', 100) . "\n";

        $this->displayRow('make:controller', '[ProjectName] [ControllerName]', 'Create a new controller class');

        $this->displayRow('make:model', '[ProjectName] [ModelName]', 'Create a new model class');

        $this->displayRow('make:migrate', '[ProjectName] [MigrationName]', 'Create a new migration file');

        $this->displayRow('make:seed', '[ProjectName] [SeederName]', 'Create a new database seeder');

        $this->displayRow('make:project', '[ProjectName]', 'Create a new project structure');
    }

    protected function displayRow($command, $arguments, $description)
    {
        $commandText = trim($command);
        $argumentsText = self::COLOR_YELLOW . trim($arguments) . self::COLOR_RESET;
        echo self::COLOR_GREEN
            . str_pad($commandText, 18)
            . str_pad($argumentsText, 40)
            . self::COLOR_WHITE . str_pad(': ' . $description, 50)
            . self::COLOR_RESET . "\n";
    }

    protected function listMakeCommands()
    {
        echo self::COLOR_BLUE . str_pad('Make Commands', 18)
            . str_pad('', 40)
            . str_pad('Description', 50)
            . self::COLOR_RESET . "\n";
        echo str_repeat('-', 100) . "\n";

        $this->displayRow('make:controller', '[ProjectName] [ControllerName]', 'Create a new controller class');

        $this->displayRow('make:model', '[ProjectName] [ModelName]', 'Create a new model class');

        $this->displayRow('make:migrate', '[ProjectName] [MigrationName]', 'Create a new migration file');

        $this->displayRow('make:seed', '[ProjectName] [SeederName]', 'Create a new database seeder');

        $this->displayRow('make:project', '[ProjectName]', 'Create a new project structure');
    }

    protected function listMigrateCommands()
    {
        echo self::COLOR_BLUE . str_pad('Migrate Commands', 18)
            . str_pad('', 40)
            . str_pad('Description', 50)
            . self::COLOR_RESET . "\n";
        echo str_repeat('-', 100) . "\n";

        $this->displayRow('migrate', '', 'Run the database migrations');

        $this->displayRow('rollback', '', 'Rollback the last database migration');
    }
}
