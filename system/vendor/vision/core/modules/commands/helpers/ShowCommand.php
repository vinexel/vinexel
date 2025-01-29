<?php

namespace Iconic\Core\Modules\Commands\Helpers;

class ShowCommand
{
    const COLOR_RESET = "\e[0m";
    const COLOR_GREEN = "\e[32m";
    const COLOR_YELLOW = "\e[33m"; // Kode warna kuning
    const COLOR_BLUE = "\e[34m";
    const COLOR_WHITE = "\e[97m";
    const COLOR_GRAY = "\e[90m";
    const COLOR_DARK_GRAY = "\e[1;30m";

    public function handle($arguments)
    {
        // Memeriksa apakah perintah spesifik untuk kategori 'make'
        if (isset($arguments[0]) && $arguments[0] === 'make') {
            $this->listMakeCommands();
            return;
        }

        // Memeriksa apakah perintah spesifik untuk migrasi
        if (isset($arguments[0]) && $arguments[0] === 'migrate') {
            $this->listMigrateCommands();
            return;
        }

        // Header utama
        echo self::COLOR_YELLOW . "Vision Framework Command Line Tool\n\n" . self::COLOR_RESET;

        // Menampilkan tabel perintah dan deskripsi dengan header yang rapi
        $this->displayTableHeader();

        // Daftar semua perintah
        $this->listAllCommands();
        echo str_repeat('-', 100) . "\n"; // Footer tabel
    }

    protected function displayTableHeader()
    {
        // Header tabel
        echo str_repeat('-', 100) . "\n";
        echo self::COLOR_BLUE . str_pad('Command', 18)
            . str_pad('Arguments', 40)
            . str_pad('Description', 50)
            . self::COLOR_RESET . "\n";
        echo str_repeat('-', 100) . "\n";
    }

    protected function listAllCommands()
    {
        // Perintah Serve
        $this->displayRow('serve', '', 'Run the local development server');
        echo self::COLOR_GRAY . str_repeat('-', 100) . "\n";
        // Perintah Migration
        $this->displayRow('migration', '[ProjectName]', 'Run the database migrations');
        echo self::COLOR_GRAY . str_repeat('-', 100) . "\n";
        // Perintah Seeder
        $this->displayRow('seeder', '[ProjectName]', 'Run the database seeders');
        echo self::COLOR_GRAY . str_repeat('-', 100) . "\n";
        // Perintah Rollback
        $this->displayRow('rollback', '[ProjectName]', 'Rollback the last database migration');
        echo self::COLOR_GRAY . str_repeat('-', 100) . "\n";
        // Perintah List
        $this->displayRow('list', '', 'Show all available commands');
        echo self::COLOR_GRAY . str_repeat('-', 100) . "\n";
        // Perintah Delete Project
        $this->displayRow('delete', '[ProjectName]', 'Delete an existing project and its domain entry');
        echo self::COLOR_GRAY . str_repeat('-', 100) . "\n";
        // Header Make Commands
        echo "\n" . self::COLOR_BLUE . str_pad('Make Commands', 18)
            . str_pad('', 40)
            . str_pad('Description', 50)
            . self::COLOR_RESET . "\n";
        echo str_repeat('-', 100) . "\n";

        // Perintah Make Controller
        $this->displayRow('make:controller', '[ProjectName] [ControllerName]', 'Create a new controller class');

        // Perintah Make Model
        $this->displayRow('make:model', '[ProjectName] [ModelName]', 'Create a new model class');

        // Perintah Make Migration
        $this->displayRow('make:migrate', '[ProjectName] [MigrationName]', 'Create a new migration file');

        // Perintah Make Seeder
        $this->displayRow('make:seed', '[ProjectName] [SeederName]', 'Create a new database seeder');

        // Perintah Make Project
        $this->displayRow('make:project', '[ProjectName]', 'Create a new project structure');
    }

    protected function displayRow($command, $arguments, $description)
    {
        // Menampilkan baris dengan padding untuk perintah, argumen, dan deskripsi
        $commandText = trim($command);
        $argumentsText = self::COLOR_YELLOW . trim($arguments) . self::COLOR_RESET; // Menambahkan warna kuning pada argumen
        echo self::COLOR_GREEN
            . str_pad($commandText, 18)
            . str_pad($argumentsText, 40)
            . self::COLOR_WHITE . str_pad(': ' . $description, 50)
            . self::COLOR_RESET . "\n";
    }

    protected function listMakeCommands()
    {
        // Header Make Commands
        echo self::COLOR_BLUE . str_pad('Make Commands', 18)
            . str_pad('', 40)
            . str_pad('Description', 50)
            . self::COLOR_RESET . "\n";
        echo str_repeat('-', 100) . "\n";

        // Perintah Make Controller
        $this->displayRow('make:controller', '[ProjectName] [ControllerName]', 'Create a new controller class');

        // Perintah Make Model
        $this->displayRow('make:model', '[ProjectName] [ModelName]', 'Create a new model class');

        // Perintah Make Migration
        $this->displayRow('make:migrate', '[ProjectName] [MigrationName]', 'Create a new migration file');

        // Perintah Make Seeder
        $this->displayRow('make:seed', '[ProjectName] [SeederName]', 'Create a new database seeder');

        // Perintah Make Project
        $this->displayRow('make:project', '[ProjectName]', 'Create a new project structure');
    }

    protected function listMigrateCommands()
    {
        // Header Migrate Commands
        echo self::COLOR_BLUE . str_pad('Migrate Commands', 18)
            . str_pad('', 40)
            . str_pad('Description', 50)
            . self::COLOR_RESET . "\n";
        echo str_repeat('-', 100) . "\n";

        // Perintah Migrate
        $this->displayRow('migrate', '', 'Run the database migrations');

        // Perintah Rollback
        $this->displayRow('rollback', '', 'Rollback the last database migration');
    }
}
