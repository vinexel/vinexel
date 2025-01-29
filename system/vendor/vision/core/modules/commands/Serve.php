<?php

/**
 * Vision Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Core\Modules\Commands;

use System\Projects;

class Serve
{
    const COLOR_RESET = "\e[0m";
    const COLOR_GREEN = "\e[32m";
    const COLOR_YELLOW = "\e[33m";

    public function start($port = PORT_DEFAULT)
    {
        $this->showStartMessage('127.0.0.1', $port);

        // Run server built-in PHP server
        $host = '127.0.0.1';

        // Mencari folder public secara otomatis
        $publicDir = $this->getPublicDirectory();

        // Cek apakah folder public ada
        if (!is_dir($publicDir)) {
            $this->showError("Directory $publicDir does not exist.");
            exit;
        }

        // Mulai server PHP built-in
        // Tentukan perintah berdasarkan sistem operasi
        $command = sprintf("php -S %s:%d -t %s", $host, $port, escapeshellarg($publicDir));

        // Sembunyikan output untuk Unix/Linux/Mac dan Windows
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Windows
            $command .= ' > NUL 2>&1';
        } else {
            // Unix/Linux/Mac
            $command .= ' > /dev/null 2>&1';
        }

        // Eksekusi perintah
        exec($command);
    }

    private function showStartMessage($host, $port)
    {
        $currentDomain = "$host:$port"; // Membangun domain saat ini
        $projects = new Projects(); // Buat instance dari Projects
        $projectName = $projects->getProjectName($currentDomain); // Ambil nama proyek

        echo self::COLOR_RESET . "\nPreparing...";
        echo "\n\n";
        echo self::COLOR_GREEN . "  _____   _____     ____     _    _   _____   _____\n";
        echo self::COLOR_GREEN . " |_   _| / ____|   / __ \   | \  | | |_   _| / ____|\n";
        echo self::COLOR_GREEN . "   | |   | |      | |  | |  |  \ | |   | |   | |\n";
        echo self::COLOR_GREEN . "  _| |_  | |___   | |__| |  | | \  |  _| |_  | |____\n";
        echo self::COLOR_GREEN . " |_____| \_____|   \____/   |_|  \_| |_____| \_____|\n";
        echo self::COLOR_RESET . "\n\n Starting " . strtoupper($projectName) . " 🚀🚀🚀\n Application running on http://$host:$port\n\n";
        echo self::COLOR_RESET . "Press " . self::COLOR_YELLOW . "Ctrl + C" . self::COLOR_RESET . " to stop the development server.\n\n";
    }

    private function getPublicDirectory()
    {
        $rootDir = dirname(__DIR__, 6);
        return $rootDir . '/public'; // Path to public folder
    }

    private function showError($message)
    {
        echo self::COLOR_YELLOW . $message . "\n" . self::COLOR_RESET;
    }
}
