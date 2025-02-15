<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\Commands;

use Vinexel\Modules\Commands\Handler\Registry as CMD;

class Command
{
    public function runCommand()
    {
        global $argv;

        if (isset($argv[1])) {
            $commandName = $argv[1];
            $arguments = array_slice($argv, 2);
            $commands = CMD::getCommands();

            if (array_key_exists($commandName, $commands)) {
                $commandClass = $commands[$commandName];
                $commandInstance = new $commandClass();
                $commandInstance->handle($arguments);
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
