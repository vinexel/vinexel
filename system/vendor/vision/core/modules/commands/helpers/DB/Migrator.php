<?php

namespace Iconic\Core\Modules\Commands\Helpers\DB;

use PDO;

class Migrator
{
    public function runMigrations($projectName)
    {
        $migrationPath = __DIR__ . "/../../../../app/{$projectName}/database/migrations/";
        echo "Migration path: $migrationPath\n"; // Debugging

        if (!file_exists($migrationPath)) {
            echo "\e[31mError: Migration path not found for project {$projectName}.\n\e[0m";
            return;
        }

        // Load the .env file for the specific project
        $envFilePath = __DIR__ . "/../../../../app/{$projectName}/.env";
        if (!$this->loadEnv($envFilePath)) {
            echo "\e[31mError: Could not load .env file at {$envFilePath}.\n\e[0m";
            return;
        }

        $dbHost = getenv('DB_HOST') ?: 'localhost';
        $dbName = getenv('DB_NAME') ?: 'database';
        $dbUser = getenv('DB_USER') ?: 'root';
        $dbPass = getenv('DB_PASS') ?: '';

        // Create PDO connection
        try {
            $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Debugging: Menampilkan semua file migrasi
            foreach (glob($migrationPath . "*.php") as $migrationFile) {
                echo "Loading migration file: $migrationFile\n"; // Debugging
                require_once $migrationFile;

                // Dapatkan nama file tanpa ekstensi
                $classNameWithTimestamp = basename($migrationFile, '.php');

                // Pisahkan timestamp dari nama kelas yang sebenarnya
                // Asumsi format nama file adalah YYYY_MM_DD_timestamp_ClassName
                $parts = explode('_', $classNameWithTimestamp);
                $className = end($parts); // Ambil bagian terakhir setelah underscore sebagai nama kelas

                // Sertakan namespace yang benar
                $fullyQualifiedClassName = "$projectName\\Database\\Migrations\\{$className}";

                // Debugging: Tampilkan nama kelas yang sedang dicari
                echo "Trying to find class: {$fullyQualifiedClassName}\n";

                if (class_exists($fullyQualifiedClassName)) {
                    $migration = new $fullyQualifiedClassName();
                    $migration->up($pdo);
                    echo "\e[32mMigration {$className} ran successfully.\n\e[0m";
                } else {
                    echo "\e[31mError: Migration class {$fullyQualifiedClassName} not found.\n\e[0m";
                }
            }
        } catch (\PDOException $e) {
            echo "\e[31mDatabase connection failed: " . $e->getMessage() . "\n\e[0m";
        }
    }

    public function rollbackMigrations($projectName)
    {
        $migrationPath = __DIR__ . "/../../../../app/{$projectName}/database/migrations/";

        if (!file_exists($migrationPath)) {
            echo "\e[31mError: Migration path not found for project {$projectName}.\n\e[0m";
            return;
        }

        // Load the .env file for the specific project
        $envFilePath = __DIR__ . "/../../../../app/{$projectName}/.env";
        if (!$this->loadEnv($envFilePath)) {
            echo "\e[31mError: Could not load .env file at {$envFilePath}.\n\e[0m";
            return;
        }

        $dbHost = getenv('DB_HOST') ?: 'localhost';
        $dbName = getenv('DB_NAME') ?: 'database';
        $dbUser = getenv('DB_USER') ?: 'root';
        $dbPass = getenv('DB_PASS') ?: '';

        // Create PDO connection
        try {
            $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Reverse the migration files order for rollback
            foreach (array_reverse(glob($migrationPath . "*.php")) as $migrationFile) {
                require_once $migrationFile;

                // Dapatkan nama file tanpa ekstensi
                $classNameWithTimestamp = basename($migrationFile, '.php');

                // Pisahkan timestamp dari nama kelas yang sebenarnya
                $parts = explode('_', $classNameWithTimestamp);
                $className = end($parts); // Ambil bagian terakhir sebagai nama kelas

                // Sertakan namespace yang benar
                $fullyQualifiedClassName = "$projectName\\Database\\Migrations\\{$className}";

                echo "Trying to rollback class: {$fullyQualifiedClassName}\n";

                if (class_exists($fullyQualifiedClassName)) {
                    $migration = new $fullyQualifiedClassName();
                    $migration->down($pdo);
                    echo "\e[32mMigration {$className} rolled back successfully.\n\e[0m";
                } else {
                    echo "\e[31mError: Migration class {$fullyQualifiedClassName} not found.\n\e[0m";
                }
            }
        } catch (\PDOException $e) {
            echo "\e[31mDatabase connection failed: " . $e->getMessage() . "\n\e[0m";
        }
    }


    private function loadEnv($path)
    {
        if (!file_exists($path)) {
            return false;
        }

        // Load .env file
        $lines = file($path);
        foreach ($lines as $line) {
            // Skip comments and empty lines
            if (strpos(trim($line), '#') === 0 || trim($line) === '') {
                continue;
            }

            // Parse variable
            list($key, $value) = explode('=', trim($line), 2);
            putenv("$key=$value");
        }

        return true;
    }
}
