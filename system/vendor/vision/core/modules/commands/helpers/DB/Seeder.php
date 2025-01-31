<?php

namespace Iconic\Core\Modules\Commands\Helpers\DB;

use PDO;
use Vision\Core\Modules\Config;

class Seeder
{
    public function runSeeders($projectName)
    {
        $seederPath = __DIR__ . "/../../../../app/{$projectName}/database/seeds/";

        if (!file_exists($seederPath)) {
            echo "\e[31mError: Seeder path not found for project {$projectName}.\n\e[0m";
            return;
        }

        // Load the .env file for the specific project
        $envFilePath = __DIR__ . "/../../../../app/{$projectName}/.env";
        Config::loadEnv($envFilePath);

        $dbHost = Config::get('DB_HOST');
        $dbName = Config::get('DB_NAME');
        $dbUser = Config::get('DB_USER');
        $dbPass = Config::get('DB_PASS');

        // Create PDO connection
        try {
            $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            foreach (glob($seederPath . "*.php") as $seederFile) {
                require_once $seederFile;

                // Dapatkan nama file tanpa ekstensi
                $classNameWithTimestamp = basename($seederFile, '.php');

                // Pisahkan timestamp dari nama kelas yang sebenarnya
                $parts = explode('_', $classNameWithTimestamp);
                $className = end($parts); // Ambil bagian terakhir sebagai nama kelas

                // Sertakan namespace yang benar
                $fullyQualifiedClassName = "$projectName\\Database\\Seeds\\{$className}";

                echo "Trying to run seeder: {$fullyQualifiedClassName}\n";

                if (class_exists($fullyQualifiedClassName)) {
                    $seeder = new $fullyQualifiedClassName();
                    $seeder->run($pdo);
                    echo "\e[32mSeeder {$className} ran successfully.\n\e[0m";
                } else {
                    echo "\e[31mError: Seeder class {$fullyQualifiedClassName} not found.\n\e[0m";
                }
            }
        } catch (\PDOException $e) {
            echo "\e[31mDatabase connection failed: " . $e->getMessage() . "\n\e[0m";
        }
    }

    public function rollbackSeeders($projectName)
    {
        $seederPath = __DIR__ . "/../../../../app/{$projectName}/database/seeds/";

        if (!file_exists($seederPath)) {
            echo "\e[31mError: Seeder path not found for project {$projectName}.\n\e[0m";
            return;
        }

        // Load the .env file for the specific project
        $envFilePath = __DIR__ . "/../../../../app/{$projectName}/.env";
        Config::loadEnv($envFilePath);

        $dbHost = Config::get('DB_HOST', 'localhost');
        $dbName = Config::get('DB_NAME', 'database');
        $dbUser = Config::get('DB_USER', 'root');
        $dbPass = Config::get('DB_PASS', '');

        // Create PDO connection
        try {
            $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Reverse order for rollback
            foreach (array_reverse(glob($seederPath . "*.php")) as $seederFile) {
                require_once $seederFile;

                // Dapatkan nama file tanpa ekstensi
                $classNameWithTimestamp = basename($seederFile, '.php');

                // Pisahkan timestamp dari nama kelas yang sebenarnya
                $parts = explode('_', $classNameWithTimestamp);
                $className = end($parts); // Ambil bagian terakhir sebagai nama kelas

                // Sertakan namespace yang benar
                $fullyQualifiedClassName = "$projectName\\Database\\Seeds\\{$className}";

                echo "Trying to rollback seeder: {$fullyQualifiedClassName}\n";

                if (class_exists($fullyQualifiedClassName)) {
                    $seeder = new $fullyQualifiedClassName();
                    $seeder->rollback($pdo);
                    echo "\e[32mSeeder {$className} rolled back successfully.\n\e[0m";
                } else {
                    echo "\e[31mError: Seeder class {$fullyQualifiedClassName} not found.\n\e[0m";
                }
            }
        } catch (\PDOException $e) {
            echo "\e[31mDatabase connection failed: " . $e->getMessage() . "\n\e[0m";
        }
    }
}
