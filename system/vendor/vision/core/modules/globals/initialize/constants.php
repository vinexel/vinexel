<?php

declare(strict_types=1);
/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

/**
 * @var string TRIM_DS pattern to trim directory separator.
 */
defined('TRIM_DS') || define('TRIM_DS', '/\\');

/**
 * @var string APP_ROOT system root 2 levels back.
 */
defined('APP_ROOT') || define('APP_ROOT', dirname(__DIR__, 2) . DIRECTORY_SEPARATOR);

/**
 * Define our public application front controller of not defined 
 * 
 * @var string FRONT_CONTROLLER
 */
defined('FRONT_CONTROLLER') || define('FRONT_CONTROLLER', APP_ROOT . 'public' . DIRECTORY_SEPARATOR);

/**
 * @var string DOCUMENT_ROOT document root directory path 
 */
defined('DOCUMENT_ROOT') || define('DOCUMENT_ROOT', realpath(FRONT_CONTROLLER . 'public') . DIRECTORY_SEPARATOR);

/**
 * @var int STATUS_OK success status code
 */
defined('STATUS_SUCCESS') || define('STATUS_SUCCESS', 0);

/**
 * @var int STATUS_ERROR error status code
 */
defined('STATUS_ERROR') || define('STATUS_ERROR', 1);

/**
 * @var int STATUS_SILENT Finish controller method without error or success status.
 */
defined('STATUS_SILENT') || define('STATUS_SILENT', 2);

/**
 * @var string URL_SCHEME get request url scheme http or https 
 */
defined('URL_SCHEME') || define('URL_SCHEME', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http'));

/**
 * @var bool NOVAKIT_ENV NovaKit executable command
 */
defined('NOVAKIT_ENV') || define('NOVAKIT_ENV', ($_SERVER['NOVAKIT_EXECUTION_ENV'] ?? null));

/**
 * @var bool PROJECT_ID Get the project ID, 
 * This is based on directory your project is located as product id or empty on php server.
 */
defined('PROJECT_ID') || define('PROJECT_ID', trim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), TRIM_DS));

/**
 * @var int FETCH_ASSOC Fetch as an associative array
 */
defined('FETCH_ASSOC') || define('FETCH_ASSOC', 0);

/**
 * @var int FETCH_NUM Fetch as an array integer index
 */
defined('FETCH_NUM') || define('FETCH_NUM', 1);

/**
 * @var int FETCH_BOTH Fetch as an array integer index and associative
 */
defined('FETCH_BOTH') || define('FETCH_BOTH', 2);

/**
 * @var int FETCH_OBJ Fetch as an object
 */
defined('FETCH_OBJ') || define('FETCH_OBJ', 3);

/**
 * @var int FETCH_COLUMN Fetch as an array columns integer index
 */
defined('FETCH_COLUMN') || define('FETCH_COLUMN', 4);

/**
 * @var int FETCH_NUM_OBJ Fetch as an object with string integer property names
 */
defined('FETCH_NUM_OBJ') || define('FETCH_NUM_OBJ', 5);

/**
 * @var int FETCH_ALL Fetch all as an associative array
 */
defined('FETCH_ALL') || define('FETCH_ALL', 6);

/**
 * @var int FETCH_COLUMN_ASSOC Fetch all as an associative array
 */
defined('FETCH_COLUMN_ASSOC') || define('FETCH_COLUMN_ASSOC', 7);

/**
 * @var int RETURN_NEXT Fetch next or single record.
 */
defined('RETURN_NEXT') || define('RETURN_NEXT', 0);

/**
 * @var int RETURN_2D_NUM Fetch all as 2d array integers
 */
defined('RETURN_2D_NUM') || define('RETURN_2D_NUM', 1);

/**
 * @var int RETURN_ID Fetch last inserted id
 */
defined('RETURN_ID') || define('RETURN_ID', 2);

/**
 * @var int RETURN_INT Fetch count of records
 */
defined('RETURN_INT') || define('RETURN_INT', 3);

/**
 * @var int RETURN_COUNT Fetch number if affected rows.
 */
defined('RETURN_COUNT') || define('RETURN_COUNT', 4);

/**
 * @var int RETURN_COLUMN Fetch all result columns
 */
defined('RETURN_COLUMN') || define('RETURN_COLUMN', 5);

/**
 * @var int RETURN_ALL Fetch all as results
 */
defined('RETURN_ALL') || define('RETURN_ALL', 6);

/**
 * @var int RETURN_STMT Return prepared statement.
 */
defined('RETURN_STMT') || define('RETURN_STMT', 7);
