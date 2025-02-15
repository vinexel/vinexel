<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\Debug;

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
            . 'storage'
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

        $fileDirectory = dirname($filePath);

        $frameworkPath = realpath(dirname(__DIR__, 6));
        $relativePath = str_replace($frameworkPath . DIRECTORY_SEPARATOR, '', $fileDirectory);

        $pathElements = explode(DIRECTORY_SEPARATOR, $relativePath);

        $projectFolder = isset($pathElements[0]) ? $pathElements[0] : 'Unknown Project';

        if (!function_exists('Vinexel\Modules\Debug\getNamespaceAndClassFromFile')) {
            function getNamespaceAndClassFromFile($filePath)
            {
                $namespace = null;
                $class = null;
                $lines = file($filePath);
                foreach ($lines as $line) {

                    if (strpos($line, 'namespace ') === 0) {
                        $namespace = trim(str_replace(['namespace', ';'], '', $line));
                    }

                    if (preg_match('/\b(class|trait|interface)\s+(\w+)/', $line, $matches)) {
                        $class = $matches[2];
                        break;
                    }
                }
                return $namespace && $class ? $namespace . '\\' . $class : $class;
            }
        }

        $namespaceClass = getNamespaceAndClassFromFile($filePath);

        function getCodeContext($filePath, $errorLine, $contextRange = 5)
        {
            $lines = file($filePath);
            $startLine = max(0, $errorLine - $contextRange - 1);
            $endLine = min(count($lines), $errorLine + $contextRange);

            return array_slice($lines, $startLine, $endLine - $startLine, true);
        }

        $requestDetails = [
            'url'       => $_SERVER['REQUEST_URI'] ?? '',
            'method'    => $_SERVER['REQUEST_METHOD'] ?? '',
            'headers'   => getallheaders(),
            'input'     => $_REQUEST,
            'server'    => $_SERVER,
        ];

        $sessionDetails = $_SESSION ?? [];

        $codeContext = getCodeContext($filePath, $exception->getLine());

        $executionStartTime = $_SERVER["REQUEST_TIME_FLOAT"] ?? microtime(true);
        $executionEndTime = microtime(true);
        $executionTime = $executionEndTime - $executionStartTime;
        $memoryUsage = memory_get_usage(true);

        $errorDetails = [
            'message'       => $exception->getMessage(),
            'file'          => basename($filePath),
            'namespace'     => $namespaceClass,
            'project'       => $projectFolder,
            'directory'     => $fileDirectory,
            'line'          => $exception->getLine(),
            'trace'         => $exception->getTrace(),
            'file_tree'     => $pathElements,
            'request'       => $requestDetails,
            'session'       => $sessionDetails,
            'context'       => $codeContext,
            'php_version'   => phpversion(),
            'framework_version' => VINEXEL_VERSION,
            'execution_time' => $executionTime,
            'memory_usage'  => $memoryUsage
        ];

        if (self::$mode === 'development' || self::$mode === 'testing') {
            include VISION_DIR . '/system/vendor/plugins/vinexel/' . ucfirst('fragments') . '/' . ucfirst('resources') . '/view/error_template.rapid';
        } elseif (self::$mode === 'production') {
            include VISION_DIR . '/system/vendor/plugins/vinexel/' . ucfirst('fragments') . '/' . ucfirst('resources') . '/view/404.rapid';
        }
    }

    public static function isDebugMode()
    {
        return self::$mode === 'development';
    }
}
