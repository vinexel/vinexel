<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Core\Modules\Debug;

use Vision\Modules\Config;

class Debugger
{
    const LOG_LEVELS = ['INFO', 'WARNING', 'ERROR', 'DEBUG'];
    const MODES = ['development', 'testing', 'production'];
    private static $mode;

    public static function init($mode)
    {
        self::$mode = $mode;
        switch (self::$mode) {
            case 'development':
                ini_set('display_errors', '1');
                ini_set('display_startup_errors', '1');
                error_reporting(E_ALL);
                break;
            case 'testing':
                ini_set('display_errors', '1');
                ini_set('display_startup_errors', '0');
                error_reporting(E_ALL);
                break;
            case 'production':
                ini_set('display_errors', '0');
                ini_set('log_errors', '1');
                error_reporting(0);
                break;
        }
    }

    public static function log($message, $level = 'INFO')
    {
        if (!in_array($level, self::LOG_LEVELS)) {
            $level = 'INFO';
        }
        $logFile = VISION_DIR
            . DIRECTORY_SEPARATOR
            . 'system'
            . DIRECTORY_SEPARATOR
            . 'framework'
            . DIRECTORY_SEPARATOR
            . 'writeable'
            . DIRECTORY_SEPARATOR
            . 'logging'
            . DIRECTORY_SEPARATOR
            . PROJECT_NAME
            . DIRECTORY_SEPARATOR
            . PROJECT_NAME
            . '.log';

        if (!file_exists(dirname($logFile))) {
            mkdir(dirname($logFile), 0777, true);
        }
        $formattedMessage = sprintf("[%s] [%s]: %s\n", date('Y-m-d H:i:s'), $level, $message);
        file_put_contents($logFile, $formattedMessage, FILE_APPEND);
    }

    public static function logError(\Throwable $throwable)
    {
        self::log(self::formatError($throwable), 'ERROR');
    }

    public static function formatError(\Throwable $throwable)
    {
        return sprintf(
            "Error: %s\nFile: %s on line %d\nTrace:\n%s\n",
            $throwable->getMessage(),
            $throwable->getFile(),
            $throwable->getLine(),
            $throwable->getTraceAsString()
        );
    }

    public static function renderError(\Throwable $exception)
    {
        $filePath = realpath($exception->getFile());

        if (!$filePath) {
            echo "Invalid file path: " . $exception->getFile();
            exit;
        }

        $fileDirectory = dirname($filePath);  // Direktori file error

        // Ambil lokasi folder framework
        // $frameworkPath = realpath(__DIR__ . '/../../../../../..'); // Sesuaikan dengan lokasi folder framework Anda
        $frameworkPath = realpath(dirname(__DIR__, 6));
        $relativePath = str_replace($frameworkPath . DIRECTORY_SEPARATOR, '', $fileDirectory);

        // Pisahkan path menjadi elemen array untuk di-render sebagai file tree
        $pathElements = explode(DIRECTORY_SEPARATOR, $relativePath);

        // Nama folder project diambil dari elemen pertama path relatif
        $projectFolder = isset($pathElements[0]) ? $pathElements[0] : 'Unknown Project';

        // Deklarasikan fungsi ini sekali saja, bukan di dalam fungsi renderError
        if (!function_exists('Iconic\Core\Modules\Debug\getNamespaceAndClassFromFile')) {
            function getNamespaceAndClassFromFile($filePath)
            {
                $namespace = null;
                $class = null;
                $lines = file($filePath); // Membaca seluruh baris dari file
                foreach ($lines as $line) {
                    // Cari baris yang mendefinisikan namespace
                    if (strpos($line, 'namespace ') === 0) {
                        $namespace = trim(str_replace(['namespace', ';'], '', $line));
                    }

                    // Cari baris yang mendefinisikan class, trait, atau interface
                    if (preg_match('/\b(class|trait|interface)\s+(\w+)/', $line, $matches)) {
                        $class = $matches[2];
                        break;  // Ditemukan class, tidak perlu melanjutkan
                    }
                }

                // Gabungkan namespace dan class jika keduanya ditemukan
                return $namespace && $class ? $namespace . '\\' . $class : $class;
            }
        }

        // Ambil namespace dan class dari file yang mengalami error
        $namespaceClass = getNamespaceAndClassFromFile($filePath);

        // Dapatkan beberapa baris kode sebelum dan sesudah error terjadi untuk menunjukkan konteks
        function getCodeContext($filePath, $errorLine, $contextRange = 5)
        {
            $lines = file($filePath); // Membaca semua baris dari file
            $startLine = max(0, $errorLine - $contextRange - 1); // Baris mulai
            $endLine = min(count($lines), $errorLine + $contextRange); // Baris akhir

            return array_slice($lines, $startLine, $endLine - $startLine, true);
        }

        // Menyimpan detail request untuk menampilkan seperti Laravel
        $requestDetails = [
            'url'       => $_SERVER['REQUEST_URI'] ?? '',
            'method'    => $_SERVER['REQUEST_METHOD'] ?? '',
            'headers'   => getallheaders(),
            'input'     => $_REQUEST,
            'server'    => $_SERVER,
        ];

        // Detail session jika ada
        $sessionDetails = $_SESSION ?? [];

        // Kode konteks di sekitar error
        $codeContext = getCodeContext($filePath, $exception->getLine());

        // Hitung waktu eksekusi (dari awal aplikasi berjalan hingga error)
        $executionStartTime = $_SERVER["REQUEST_TIME_FLOAT"] ?? microtime(true); // Waktu awal request
        $executionEndTime = microtime(true); // Waktu saat error terjadi
        $executionTime = $executionEndTime - $executionStartTime; // Durasi waktu eksekusi

        // Hitung penggunaan memori saat error terjadi
        $memoryUsage = memory_get_usage(true); // Memori yang digunakan dalam byte

        $errorDetails = [
            'message'       => $exception->getMessage(),
            'file'          => basename($filePath),   // Menampilkan hanya nama file
            'namespace'     => $namespaceClass,       // Tambahkan namespace dan class
            'project'       => $projectFolder,        // Tambahkan nama folder project
            'directory'     => $fileDirectory,
            'line'          => $exception->getLine(),
            'trace'         => $exception->getTrace(), // Menggunakan trace array, bukan string
            'file_tree'     => $pathElements, // Simpan struktur direktori
            'request'       => $requestDetails, // Detail request HTTP
            'session'       => $sessionDetails, // Detail session aktif
            'context'       => $codeContext, // Beberapa baris kode di sekitar error
            'php_version'   => phpversion(),
            'framework_version' => VISION_VERSION, // Versi framework, bisa diganti sesuai kebutuhan
            'execution_time' => $executionTime, // Waktu eksekusi
            'memory_usage'  => $memoryUsage // Penggunaan memori
        ];

        // Pilih template error sesuai mode
        if (self::$mode === 'development' || self::$mode === 'testing') {
            // Sertakan detail error untuk mode development dan testing
            include VISION_DIR . '/system/vendor/vision/fragment/resources/view/error_template.rapid';
        } elseif (self::$mode === 'production') {
            // Tampilkan pesan sederhana untuk mode production
            include VISION_DIR . '/system/vendor/vision/fragment/resources/view/404.rapid';
        }
    }

    public static function isDebugMode()
    {
        return self::$mode === 'development';
    }
}
