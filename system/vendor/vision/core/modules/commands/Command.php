<?php

namespace Iconic\Core\Modules\Commands;

use Iconic\Core\Modules\Commands\Handler\Registry as CMD;

class Command
{
    public function runCommand()
    {
        global $argv; // Ambil $argv dari ruang lingkup global

        if (isset($argv[1])) {
            $commandName = $argv[1];
            $arguments = array_slice($argv, 2); // Ambil argumen lainnya setelah perintah

            // Ambil daftar command dari registry
            $commands = CMD::getCommands();

            if (array_key_exists($commandName, $commands)) {
                $commandClass = $commands[$commandName];
                $commandInstance = new $commandClass();
                $commandInstance->handle($arguments); // Memanggil metode handle dengan argumen
            } else {
                echo "\e[33mCommand not found!\n";
                echo "Available commands:\n";
                foreach ($commands as $name => $class) {
                    echo "  - $name\n";
                }
                echo "\e[0m";
            }
        } else {
            echo "\e[33mUsage: php vision [command] [arguments]\n\e[0m";
        }
    }
}
