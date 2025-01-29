<?php
require "core.php";
head();

session_name("WebsiteID");
?>
<div class="content-wrapper">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div class="content-header">
				
				<div class="container-fluid">
				  <div class="row mb-2">
        		    <div class="col-sm-6">
        		      <h1 class="m-0 "><i class="fab fa-php"></i> PHP Configuration Checker</h1>
        		    </div>
        		    <div class="col-sm-6">
        		      <ol class="breadcrumb float-sm-right">
        		        <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i> Admin Panel</a></li>
        		        <li class="breadcrumb-item active">PHP Configuration Checker</li>
        		      </ol>
        		    </div>
        		  </div>
    			</div>
            </div>

				<!--Page content-->
				<!--===================================================-->
				<div class="content">
				<div class="container-fluid">

                <div class="row">
				<div class="col-md-12">
				
				<div class="card card-primary card-outline collapsed-card">
						<div class="card-header" data-card-widget="collapse">
							<h3 class="card-title">PHP Information</h3>
							<div class="card-tools">
                			  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                			    <i class="fa fa-plus"></i>
                			  </button>
                            </div>
						</div>
						<div class="card-body">
						    <div class="table table-bordered table-responsive table-hover">
<?php
ob_start();
phpinfo();
$pinfo = ob_get_contents();
ob_end_clean();

$pinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $pinfo);
echo $pinfo;
?>
                            </div>
						</div>
			    </div>
                    
                <div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="card-title">PHP Configuration Checker</h3>
						</div>
						<div class="card-body">
<?php
// Test result codes
define("TEST_Critical", "Critical"); // Critical problem found.
define("TEST_High", "High"); // High problem found.
define("TEST_Medium", "Medium"); // Medium. This may be a problem.
define("TEST_Low", "Low"); // Low. Boring problem found.
define("TEST_Maybe", "Maybe"); // Potential security risk. Please check manually.
define("TEST_Advice", "Advice"); // Odd, but still worth mentioning.
define("TEST_Okay", "Okay"); // Everything is fine.
define("TEST_Skipped", "Skipped"); // Probably not applicable here.

$all_result_codes = array(
    TEST_Critical,
    TEST_High,
    TEST_Medium,
    TEST_Low,
    TEST_Maybe,
    TEST_Advice,
    TEST_Okay,
    TEST_Skipped
);
$trbs = array(); // Test result by severity, e.g. $trbs[TEST_Okay][...]
foreach ($all_result_codes as $v) {
    $trbs[$v] = array();
}

// Detect OS
$cfg['is_win'] = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';

// Detect CGI
$cfg['is_cgi'] = (substr(php_sapi_name(), 0, 3) === 'cgi');


// Functions
function tdesc($name, $desc = NULL)
{
    return array(
        "name" => $name,
        "desc" => $desc,
        "result" => NULL,
        "reason" => NULL,
        "recommendation" => NULL
    );
}

function tres($meta, $result, $reason = NULL, $recommendation = NULL)
{
    global $trbs;
    $res             = array_merge($meta, array(
        "result" => $result,
        "reason" => $reason,
        "recommendation" => $recommendation
    ));
    $trbs[$result][] = $res;
}

function ini_atol($val)
{
    $ret = intval($val);
    $val = strtoLower($val);
    switch (substr($val, -1)) {
        case 'g':
            $ret *= 1024;
        case 'm':
            $ret *= 1024;
        case 'k':
            $ret *= 1024;
    }
    return $ret;
}

function ini_list($val)
{
    if ($val == "") {
        return NULL;
    }
    $ret = preg_split('/[, ]+/', $val);
    if (count($ret) == 1 && $ret[0] == "") {
        return NULL;
    }
    return $ret;
}

function is_writable_or_chmodable($fn)
{
    if (!extension_loaded("posix")) {
        return is_writable($fn);
    }
    $stat = @stat($fn);
    if (!$stat) {
        return false;
    }
    $myuid  = posix_getuid();
    $mygids = posix_getgroups();
    if ($myuid == 0 || $myuid == $stat['uid'] || in_array($stat['gid'], $mygids) && $stat['mode'] & 0020 || $stat['mode'] & 0002) {
        return true;
    }
    return false;
}

function is_on($value)
{
    if ($value == "0" || $value === "" || strtoLower($value) == "off") {
        return 0;
    }
    return 1;
}


function test_all_ini_entries()
{
    global $cfg;
    $helptext = array(
        "display_errors" => "Error messages can divulge information about the inner workings of an application and may include private information such as Session-ID, personal data, database structures, source code exerpts. It is recommended to log errors, but not to display them on live systems.",
        'log_errors' => "While it may be a good idea to avoid logging altogether from a privacy point of view, monitoring the error log of an application can lead to detecting attacks, programming and configuration errors.",
        'expose_php' => "Knowing the exact PHP version - sometimes including patchlevel and operating system - is a good start for automated attack tools. Best not to share this information.",
        'max_execution_time' => "In order to prevent denial-of-service attacks where an attacker tries to keep your server's CPU busy, this value should be set to the lowest possible value, e.g. 30 (seconds).",
        'max_input_time' => "It may be useful to limit the time a script is allowed to parse input. This should be decided on a per application basis.",
        'max_input_nesting_level' => "Deep input nesting is only required in rare cases and may trigger unexpected ressource limits.",
        'memory_limit' => "A high memory limit may easily lead to resource exhaustion and thus make your application vulnerable to denial-of-service attacks. This value should be set approximately 20% above an empirically gathered maximum memory requirement.",
        'post_max_size' => "Setting the maximum allowed POST size to a high value may lead to denial-of-service from memory exhaustion. If your application does not need huge file uploads, consider setting this option to a lower value. Note: File uploads have to be covered by this setting as well.",
        'post_max_size>memory_limit' => "post_max_size must be lower than memory_limit. Otherwise, a simple POST request will let PHP reach the configured memory limit and stop execution. Apart from denial-of-service an attacker may try to split a transaction, e.g. let PHP execute only a part of a program.",
        'upload_max_filesize' => "This value should match the file size actually required.",
        'max_file_uploads' => "This value should match the maximum number of simultaneous file uploads. (Lower is better)",
        'allow_url_fopen' => "Deactivate, if possible. Allowing URLs in fopen() can be a suprising side-effect for unexperienced developers. Even if deactivated, it is still possible to receive content from URLs, e.g. with curl.",
        'allow_url_include' => "This flag should remain deactivated for security reasons.",
        'magic_quotes' => "This option should be deactivated. Instead, user input should be escaped properly and handled in a secure way when building database queries. The use of magic quotes or similar behaviour is highly discouraged. Current PHP versions do not support this feature anymore.",
        'enable_dl' => "Deactivate this option to prevent arbitrary code to be loaded during runtime (see dl()).",
        'disable_functions' => "Potentially dangerous and unused functions should be deactivated, e.g. system().",
        'request_order' => "It is recommended to use GP to register GET and POST with REQUEST.",
        'variables_order' => "Changing this setting is usually not necessary; however, the ENV variables are rarely used.",
        'auto_globals_jit' => "Unless access to these variables is done through variable variables this option can remain activated.",
        'register_globals' => "This relic from the past is not available in current PHP versions. If it is there anyway, keep it deactivated.",
        'file_uploads' => "If an application does not require HTTP file uploads, this setting should be deactivated.",
        'filter.default' => "This should only be set if the application is specifically designed to handle filtered values. Usually it is considered bad practice to filter all user input in one place. Instead, each user input should be validated and then escaped/encoded according to its context.",
        'open_basedir' => "Usually it is a good idea to restrict file system access to directories related to the application, e.g. the document root.",
        'session.save_path' => "This path should be set to a directory unique to your application, but outside the document root, e.g. /opt/php_sessions/application_1. If this application is the only application on your server, or a custom storage mechanism for sessions has been implemented, or you don't need sessions at all, then the default should be fine.",
        'session.cookie_httponly' => "This option controls if cookies are tagged with httpOnly which makes them accessible by HTTP only and not by the JavaScript. httpOnly cookies are supported by all major browser vendors and therefore can be instrumental in minimising the danger of session hijacking. It should either be activated here or in your application with session_set_cookie_params().",
        'session.cookie_secure' => "This option controls if cookies are tagged as secure and should therefore be sent over SSL encrypted connections only. It should either be activated here or in your application with session_set_coOkie_params().",
        'session.cookie_lifetime' => "Not limiting the cookie lifetime increases the chance for an attacker to be able to steal the session cookie. Depending on your application, this should be set to a reasonable value here or with session_set_cookie_params().",
        'session.cookie_samesite' => "Set SameSite to `Lax` or `Strict` to better protect against CSRF.",
		'session.referer_check' => "PHP can invalidate a session ID if the submitted HTTP Referer does not contain a configured substring. The Referer can be set by a custom client/browser or plugins (e.g. Flash, Java). However it may prevent some cases of CSRF attacks, where the attacker can not control the client's Referer.",
        'session.use_strict_mode' => "If activated, PHP will regenerate unknown session IDs. This effectively counteracts session fixation attacks.",
        'session.use_cookies' => "If activated, PHP will store the session ID in a cookie on the client side. This is recommended.",
        'session.use_only_cookies' => "PHP will send the session ID only via cookie to the client, not e.g. in the URL. Please activate.",
        'session.name' => "Your session name is the default. Why not change it to something more suitable for your application?",
        'session.use_trans_sid' => "Allowing the user to choose to store the session ID within the URL makes session hijacking a realistic security risk. URLs are logged in logfiles and can easily be copied by the user or by scripts. This option must be disabled.",
        'always_populate_raw_post_data' => "In a shared hosting environment it should not be the default to let the unexperienced user parse raw POST data themselves. Otherwise, this option should only be used, if accessing the raw POST data is actually required.",
        'arg_separator' => "The usual argument separator for parsing a query string is '&'. Standard libraries handling URLs will possibly not be compatible with custom separators, which may lead to unexpected behaviour. Also, additional parsers - such as a WAF or logfile analyzers - have to be configured accordingly.",
        'assert.active' => "assert() evaluates code just like eval(). Unless it is actually required in a live environment, which is almost certainly not the case, this feature should be deactivated.",
        'assert.callback' => "Failed assertions call a user function. This can be useful for test environments, but most certainly should not be used in production. An attacker may try to override this value to call a different function. If possible, deactivate assert altogether.",
        'zend.assertions' => "assert() is able to evaluate code. Please deactivate this feature for production environments by setting zend.assertions=-1.",
        'auto_append_file' => "PHP is automatically executing an extra script for each request. An attacker may have planted it there. If this is unexpected, deactivate.",
        'cli.pager' => "PHP executes an extra script to process CLI output. An attacker may have planted it there. If this is unexpected, deactivate.",
        'cli.prompt' => "An overlong CLI prompt may indicate incorrect configuration. Please check manually.",
        'docref_*' => "This setting may reveal internal ressources, e.g. internal server names. Setting docref_root or docref_ext implies HTML output of error messages, which is bad practice for live environments and may reveal useful information to an attacker as well.",
        'default_charset=empty' => "Not setting the default charset can make your application vulnerable to injection attacks based on incorrect interpretation of your data's character encoding. If unsure, set this to 'UTF-8'. HTML output should contain the same value, e.g. <meta charset=\"utf-8\"/>. Also, your webserver can be configured accordingly, e.g. 'AddDefaultCharset UTF-8' for Apache2.",
        'default_charset=typo' => "Change this to 'UTF-8' immediately.",
        'default_charset=iso-8859' => "There is nothing wrong with ISO8859 charsets. However, the way to deliver content tries not to discriminate and allows multibyte characters, e.g. Klingon unicode characters, too. Some browsers may even be so bold as to use a multibyte encoding anyway, regardless of this setting.",
        'default_charset=custom' => "A custom charset is perfectly fine as long as your entire chain of character encoding knows about this. E.g. the application, database connections, PHP, the webserver, ... all have the same encoding or know how to convert appropriately. In particular calls to escaping functions such as htmlentities() and htmlspecialchars() must be called with the correct encoding.",
        'default_mimetype' => "Please set a default mime type, e.g. 'text/html' or 'text/plain'. The mime type should always reflect the actual content. But it is a good idea to define a fallback here anyway. An incorrectly stated mime type can lead to injection attacks, e.g. using 'text/html' with JSON data may lead to XSS.",
        'default_socket_timeout' => "By delaying the process to establish a socket connection, an attacker may be able to do a denial-of-service (DoS) attack. Please set this value to a reasonably small value for your environment, e.g. 10.",
        'doc_root=empty' => "The PHP documentation strongly recommends to set this value when using CGI and cgi.force_redirect is off.",
        'error_append_string' => "PHP adds additional output to error messages. If planted by an attacker, this string may contain script content and lead to XSS. Please check.",
        'error_reporting' => "PHP error reporting can provide useful information about misconfiguration and programming errors, as well as possible attacks. Please consider setting this value.",
        'exit_on_timeout' => "In Apache 1 mod_php may run into an 'inconsistent state', which is always bad. If possible, turn this feature on.",
        'filter.default' => "Using a default filter or sanitizer for all PHP input is generally not considered good practice. Instead, each input should be handled by the application individually, e.g. validated, sanitized, filtered, then escaped or encoded. The default value is 'unsafe_raw'.",
        'highlight.*' => "Your color value is suspicious. An attacker may have managed to inject something here. Please check manually.",
        'iconv.internal_encoding!=empty' => "Starting with PHP 5.6 this value is derived from 'default_charset' and can safely be left empty.",
        'asp_tags' => "ASP-Style tags are quite uncommon for PHP. If you don't actually require your PHP-code to start with <%, this option should be deactivated.",
        'ldap.max_links' => "In order to prevent denial-of-service attacks this option should be set to the lowest number possible. If LDAP is not needed at all, the LDAP extension should not be loaded in the first place.",
        'log_errors_max_len' => "An attacker may try to exhaust ressources such as disk space and RAM. If possible, limit this value to a reasonable minimum, e.g. 1024.",
        'mail.add_x_header' => "Information Disclosure: When sending e-mails, a header 'X-PHP-Originating-Script' contains the filename of the originating script. In production this feature should be disabled.",
        'intl.use_exceptions' => "If unhandled, exceptions may have unexpected side-effects. Please make sure potential exceptions are handled correctly when calling intl-functions.",
        'last_modified' => "The Last-Modified header will be sent for PHP scripts. This is a minor information disclosure.",
        'zend.multibyte' => "This is highly unusual. If possible, try to avoid multibyte encodings in source files - like SJIS, BIG5 - and use UTF-8 instead. Most XSS and other injection protections are not aware of multibyte encodings or can easily be confused. In order to use UTF-8, this option can safely be deactivated.",
        'max_input_vars' => "This setting may be incorrect. Unless your application actually needs an incredible number of input variables, please set this to a reasonable value, e.g. 1000.",
		'phar.readonly' => "The creation and modification of phar files should be disabled in production.",
		'phar.require_hash' => "Signature validation for phar archives should be enforced. In particular having OpenSSL-type Phar signatures can significantly increase security.",
		'ffi.enable' => "From the PHP documentation: 'FFI is dangerous, since it allows to interface with the system on a very low level. The FFI extension should only be used by developers having a working knowledge of C and the used C APIs.'. Also, this extension is EXPERIMENTAL.",
		'runkit.internal_override' => "Runkit can modify/rename/remove internal functions. As most security features rely on internal functions, activating this setting renders all security features useless. In fact, it is best to remove the runkit extension altogether."
	);
    
    // php.ini checks
    foreach (ini_get_all() as $k => $v) {
        $value = $v["local_value"]; // For compatibility with PHP <5.3.0 ini_get_all() is not called with the second 'detail' parameter.
        
        $meta           = tdesc("php.ini -> $k");
        $result         = NULL;
        $reason         = NULL;
        $recommendation = NULL;
        if (isset($helptext[$k])) {
            $recommendation = $helptext[$k];
        }
        $ignore = 0;
        
        switch ($k) {
            case 'display_errors':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "display_errors is on."
                    );
                }
                break;
            case 'display_startup_errors':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "display_startup_errors is on."
                    );
                    $recommendation = $helptext['display_errors'];
                }
                break;
            case 'log_errors':
                if (!is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Low,
                        "You are not logging errors."
                    );
                }
                break;
            case 'expose_php':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Low,
                        "PHP is exposed by HTTP headers."
                    );
                }
                break;
            case 'max_execution_time':
                if (intval($value) == 0) {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "Execution time is not limited."
                    );
                } elseif (intval($value) >= 300) {
                    list($result, $reason) = array(
                        TEST_Low,
                        "Execution time limit is rather high."
                    );
                }
                break;
            case 'max_input_time':
                if ($value == "-1") {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "Input parsing time not limited."
                    );
                }
                break;
            case 'max_input_nesting_level':
                if (intval($value) > 128) {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "Input nesting level extremely high."
                    );
                } elseif (intval($value) > 64) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "Input nesting level is higher than usual."
                    );
                }
                break;
            case 'max_input_vars':
                if (intval($value) > 5000) {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "Extremely high number."
                    );
                } elseif (intval($value) > 1000) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "Higher number than usual."
                    );
                }
                break;
            case 'memory_limit':
                $value = ini_atol($value);
                if ($value < 0) {
                    list($result, $reason) = array(
                        TEST_High,
                        "Memory limit deactivated."
                    );
                } elseif (ini_atol($value) >= 256 * 1024 * 1024) { // default value
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "Memory limit is 256MB or more."
                    );
                }
                break;
            case 'post_max_size':
                $tmp = ini_atol(ini_get('memory_limit'));
                $value   = ini_atol($value);
                if ($tmp < 0) {
                    if ($value >= ini_atol('2G')) {
                        list($result, $reason) = array(
                            TEST_Maybe,
                            "post_max_size is >= 2GB."
                        );
                    }
                    break;
                }
                if ($value > $tmp) {
                    list($result, $reason) = array(
                        TEST_High,
                        "post_max_size is greater than memory_limit."
                    );
                    $recommendation = $helptext['post_max_size>memory_limit'];
                }
                break;
            case 'upload_max_filesize':
                if ($value === "2M") {
                    list($result, $reason) = array(
                        TEST_Advice,
                        "Default value."
                    );
                } elseif (ini_atol($value) >= ini_atol("2G")) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "Value is rather high."
                    );
                }
                break;
            case 'max_file_uploads':
                if (intval($value) > 30) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "Value is rather high."
                    );
                }
                break;
            case 'alLow_url_fopen':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_High,
                        "fopen() is allowed to open URLs."
                    );
                }
                break;
            case 'allow_url_include':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_High,
                        "include/require() can include URLs."
                    );
                }
                break;
            case 'magic_quotes_gpc':
                if (get_magic_quotes_gpc()) {
                    list($result, $reason) = array(
                        TEST_High,
                        "Magic quotes activated."
                    );
                    $recommendation = $helptext['magic_quotes'];
                }
                break;
            case 'magic_quotes_runtime':
                if (get_magic_quotes_runtime()) {
                    list($result, $reason) = array(
                        TEST_High,
                        "Magic quotes activated."
                    );
                    $recommendation = $helptext['magic_quotes'];
                }
                break;
            case 'magic_quotes_sybase':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_High,
                        "Magic quotes activated."
                    );
                    $recommendation = $helptext['magic_quotes'];
                }
                break;
            case 'enable_dl':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_High,
                        "PHP can load extensions during runtime."
                    );
                }
                break;
            case 'disable_functions':
                $value = ini_list($value);
                if (!$v) {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "No functions disabled."
                    );
                }
                break;
            case 'request_order':
                $value = strtoupper($value ?? '');
                if ($value === "GP") {
                    break;
                } // Ok
                if (strstr($value, 'C') !== FALSE) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "Cookie values in $_REQUEST."
                    );
                }
                break;
            case 'variables_order':
                if ($value === "GPCS") {
                    break;
                }
                if ($value !== "EGPCS") {
                    list($result, $reason) = array(
                        TEST_Advice,
                        "Custom variables_order."
                    );
                } else {
                    $result = TEST_Okay; // result set includes default helptext
                }
                break;
            case 'auto_globals_jit':
                $result = TEST_Okay;
                break;
            case 'register_globals':
                if ($value !== "" && $value !== "0") {
                    list($result, $reason) = array(
                        TEST_Critical,
                        "register_globals is on."
                    );
                }
                break;
            case 'file_uploads':
                if ($value == "1") {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "File uploads are allowed."
                    );
                }
                break;
            case 'filter.default':
                if ($value !== "unsafe_raw") {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "Default input filter set."
                    );
                }
                break;
            case 'open_basedir':
                if ($value == "") {
                    list($result, $reason) = array(
                        TEST_Low,
                        "open_basedir not set."
                    );
                }
                break;
            case 'session.save_path':
                if ($value == "") {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "Session save path not set."
                    );
                }
                break;
            case 'session.cookie_httponly':
                if (!is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "No implicit httpOnly-flag for session cookie."
                    );
                }
                break;
            case 'session.cookie_secure':
                if (!is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "No implicit secure-flag for session cookie."
                    );
                }
                break;
            case 'session.cookie_lifetime':
                if (!is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "No implicit lifetime for session cookie."
                    );
                }
                break;
			case 'session.cookie_samesite':
				if ($value == "") {
					list($result, $reason) = array(
						TEST_Maybe, 
						"SameSite is unset."
					);
				} elseif ($value !== "Strict") {
					list($result, $reason) = array(
						TEST_Advice, 
						"SameSite is not set to `Strict`. If cross-site GET requests to your site are unlikely, this should be set to `Strict`."
					);
				}
			break;
            case 'session.referer_check':
                if ($value === "") {
                    list($result, $reason) = array(
                        TEST_Advice,
                        "Referer check not activated."
                    );
                }
                break;
            case 'session.use_strict_mode':
                if (!is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "Session strict mode not activated."
                    );
                }
                break;
            case 'session.use_cookies':
                if (!is_on($value)) {
                    list($result, $reason) = array(
                        TEST_High,
                        "Session ID not stored in cookie."
                    );
                }
                break;
            case 'session.use_only_cookies':
                if (!is_on($value)) {
                    list($result, $reason) = array(
                        TEST_High,
                        "Session ID not limited to cookie."
                    );
                }
                break;
            case 'session.name':
                if ($value == "PHPSESSID") {
                    list($result, $reason) = array(
                        TEST_Advice,
                        "Default session name."
                    );
                }
                break;
            case 'session.use_trans_sid':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_High,
                        "Transparent SID is active."
                    );
                }
                break;
            case 'always_populate_raw_post_data':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Advice,
                        "HTTP_RAW_POST_DATA is available."
                    );
                }
                break;
            case 'arg_separator.input':
            case 'arg_separator.output':
                if ($value !== "&") {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "Unusual arg separator."
                    );
                    $recommendation = $helptext['arg_separator'];
                }
                break;
            case 'assert.active':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "assert is active."
                    );
                }
                break;
            case 'assert.callback':
                if (ini_get('assert.active') && $value !== "" && $value !== null) {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "assert callback set."
                    );
                }
                break;
            case 'zend.assertions':
                if (intval($value) > 0) {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "assert is active."
                    );
                }
                break;
            case 'auto_append_file':
            case 'auto_prepend_file':
                if ($value !== NULL && $value !== "") {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "$k is set."
                    );
                    $recommendation = $helptext['auto_append_file'];
                }
                break;
            case 'cli.pager':
                if ($value !== NULL && $value !== "") {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "CLI pager set."
                    );
                }
                break;
            case 'cli.prompt':
                if ($value !== NULL && strlen($value) > 32) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "CLI prompt is rather long (>32)."
                    );
                }
                break;
            case 'docref_root':
            case 'docref_ext':
                if ($value !== NULL && $value !== "") {
                    list($result, $reason) = array(
                        TEST_Low,
                        "docref is set."
                    );
                    $recommendation = $helptext['docref_*'];
                }
                break;
            case 'default_charset':
                if ($value == "") {
                    list($result, $reason) = array(
                        TEST_High,
                        "Default charset not explicitly set."
                    );
                    $recommendation = $helptext['default_charset=empty'];
                } elseif (stripos($value, "iso-8859") === 0) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "Charset without multibyte support."
                    );
                    $recommendation = $helptext['default_charset=iso-8859'];
                } elseif (strtoLower($value) == "utf8") {
                    list($result, $reason) = array(
                        TEST_High,
                        "'UTF-8' misspelled (without dash)."
                    );
                    $recommendation = $helptext['default_charset=typo'];
                } elseif (strtoLower($value) == "utf-8") {
                    // Okay.
                } else {
                    list($result, $reason) = array(
                        TEST_Advice,
                        "Custom charset."
                    );
                    $recommendation = $helptext['default_charset=custom'];
                }
                break;
            case 'default_mimetype':
                if ($value == "") {
                    list($result, $reason) = array(
                        TEST_High,
                        "Default mimetype not set."
                    );
                }
                break;
            case 'default_socket_timeout':
                if (intval($value) > 60) {
                    list($result, $reason) = array(
                        TEST_Low,
                        "Default socket timeout rather big."
                    );
                }
                break;
            case 'doc_root':
                if (!$cfg['is_cgi']) {
                    list($result, $reason) = array(
                        TEST_Skipped,
                        "No CGI environment."
                    );
                    break;
                }
                if (ini_get('cgi.force_redirect')) {
                    list($result, $reason) = array(
                        TEST_Skipped,
                        "cgi.force_redirect is on instead."
                    );
                    break;
                }
                if ($value == "") {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "doc_root not set."
                    );
                    $recommendation = $helptext['doc_root=empty'];
                }
                break;
            case 'error_prepend_string':
            case 'error_append_string':
                if ($value !== NULL && $value !== "") {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "$k is set."
                    );
                    $recommendation = $helptext['error_append_string'];
                }
                break;
            case 'error_reporting':
                if (error_reporting() == 0) {
                    list($result, $reason) = array(
                        TEST_Low,
                        "Error reporting is off."
                    );
                }
                break;
            case 'exit_on_timeout':
                if (!isset($_SERVER["SERVER_SOFTWARE"]) || strncmp($_SERVER["SERVER_SOFTWARE"], "Apache/1", strlen("Apache/1")) !== 0) {
                    list($result, $reason) = array(
                        TEST_Skipped,
                        "Only relevant for Apache 1."
                    );
                } elseif (!is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Low,
                        "Not enabled."
                    );
                }
                break;
            case 'filter.default':
                if ($value !== "unsafe_raw") {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "Global input filter is set."
                    );
                }
                break;
            case 'highlight.bg':
            case 'highlight.comment':
            case 'highlight.default':
            case 'highlight.html':
            case 'highlight.keyword':
            case 'highlight.string':
                if (extension_loaded('pcre') && preg_match('/[^#a-z0-9]/i', $value) || strlen($value) > 7 || strpos($value, '"') !== FALSE) {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "Suspicious color value."
                    );
                    $recommendation = $helptext['highlight.*'];
                }
                break;
            case 'iconv.internal_encoding':
            case 'iconv.input_encoding':
            case 'iconv.output_encoding':
                if (PHP_MAJOR_VERSION > 5 || (PHP_MAJOR_VERSION == 5 && PHP_MINOR_VERSION >= 6)) {
                    if ($value !== "") {
                        list($result, $reason) = array(
                            TEST_Advice,
                            "Not empty."
                        );
                        $recommendation = $helptext['iconv.internal_encoding!=empty'];
                    }
                } else {
                    list($result, $reason) = array(
                        TEST_Skipped,
                        "PHP version older than 5.6"
                    );
                }
                break;
            case 'asp_tags':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "ASP-style tags enabled."
                    );
                }
                break;
            case 'ldap.max_links':
                if (intval($value) == -1) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "Number of LDAP connections not limited."
                    );
                } else if (intval($value) > 5) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "More than 5 LDAP connections allowed."
                    );
                }
                break;
            case 'log_errors_max_len':
                $value = ini_atol($value);
                if ($value == 0 || $value > 4096) {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "Value rather big or not limited."
                    );
                }
                break;
            case 'mail.add_x_header':
                if ($value) {
                    list($result, $reason) = array(
                        TEST_Medium,
                        "Filename exposed."
                    );
                }
                break;
            case 'mail.force_extra_parameters':
                if ($value) {
                    list($result, $reason) = array(
                        TEST_Advice,
                        "Not empty."
                    );
                    $recommendation = "just FYI.";
                }
                break;
            case 'intl.use_exceptions':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Maybe,
                        "intl functions throw exceptions."
                    );
                }
                break;
            case 'last_modified':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_Low,
                        "Is set."
                    );
                }
                break;
            case 'zend.multibyte':
                if (is_on($value)) {
                    list($result, $reason) = array(
                        TEST_High,
                        "Multibyte encodings are active."
                    );
                }
                break;
			case 'runkit.internal_override':
				if (is_on($value)) {
					list($result, $reason) = array(
						TEST_Critical, 
						"Internal functions override is enabled"
					);
				}
				break;
			case 'phar.readonly':
				if (!is_on($value)) {
					list($result, $reason) = array(
						TEST_Low, 
						"Phar files aren't readonly."
					);
				}
				break;
			case 'phar.require_hash':
				if (!is_on($value)) {
					list($result, $reason) = array(
						TEST_Low, 
						"Signature check for phar is disabled."
					);
				}
				break;
			case 'ffi.enable':
				if (is_on($value)){
					list($result, $reason) = array(
						TEST_High, 
						"FFI is enabled."
					);
				}

			}
        
			if ($ignore) {
				continue;
			}
			
			if ($result === TEST_Skipped) {
				tres($meta, $result, $reason, $recommendation);
			} else {
				tres($meta, $result, $reason, $recommendation);
			}
	}
}
test_all_ini_entries();

// --- Other checks ---


// Old php version?
function test_old_php_version()
{
	$meta = tdesc("PHP Version", "Checks whether your PHP version is unsupported");
	if (version_compare(PHP_VERSION, '8.1') >= 0) {
		tres($meta, TEST_Okay, "PHP Version = " . PHP_MAJOR_VERSION . "." . PHP_MINOR_VERSION);
	} elseif (version_compare(PHP_VERSION, '8.0') >= 0) {
		tres($meta, TEST_High, "PHP version is older than 8.1",
			"PHP versions older than 8.1 reached end of life. " .
			"While your PHP version is not officially supported by the PHP group anymore, it may still be possible that some distributors maintain security backports. Please make sure your version receives security patches from other sources or upgrade PHP as soon as possible.");
	} else {
		tres($meta, TEST_Critical, "PHP version is older than 8.0",
			"Please upgrade PHP as soon as possible. " .
			"Old versions of PHP are not maintained anymore and may contain security flaws.");
	}
}
test_old_php_version();

// snuffleupagus installed?
function test_snuffleupagus_installed()
{
	$meta = tdesc("Snuffleupagus", "Checks whether the Snuffleupagus extension is loaded");
	if (extension_loaded("snuffleupagus")) {
		tres($meta, TEST_Okay);
	} else if (PHP_MAJOR_VERSION < 7) {
		tres($meta, TEST_Skipped, "Snuffleupagus isn't available for PHP < 7");
	} else if (defined('HHVM_VERSION')) {
		tres($meta, TEST_Skipped, "Snuffleupagus is not available for HHVM.");
	} else {
		tres($meta, TEST_Maybe, "The Snuffleupagus extension is not loaded", "Snuffleupagus is an advanced protection system for PHP7+. It is designed to protect servers and users from known and unknown flaws in PHP applications and the PHP core. For more information see https://snuffleupagus.rtfd.io");
	}
}
test_snuffleupagus_installed();

// Is debug build?
function test_debug_build()
{
    $meta = tdesc("Debug build", "Checks if PHP was built with --enable-debug");
    if (constant('PHP_DEBUG') || constant('ZEND_DEBUG_BUILD')) {
        tres($meta, TEST_Medium, "Debug build.", "Using a debug build of PHP makes it possible to enable debugging features in PHP, which can be useful for attackers, e.g. to get more accurate error messages or to simplify DoS attacks. Also, debugging may impact overall performance. This is probably not what you want in a production environment. Please recompile PHP without debugging.");
    } else {
        tres($meta, TEST_Okay, "Not a debug build.");
    }
}
test_debug_build();

// Got root?
function test_godmode()
{
    global $cfg;
    $meta = tdesc("Test for root access on non-Windows systems");
    if ($cfg['is_win']) {
        tres($meta, TEST_Skipped, "OS is Windows."); // Maybe check for admin access. but how?
        return;
    }
    if (!extension_loaded("posix")) {
        tres($meta, TEST_Skipped, "Posix extension not available");
        return;
    }
    if (posix_getuid() == 0) {
        tres($meta, TEST_Critical, "You are with root access!", "Executing PHP as root is hardly ever necessary.");
    } else {
        tres($meta, TEST_Okay, "Not root");
    }
}
test_godmode();

// Test for xdebug extension
function test_xdebug()
{
    $meta = tdesc("xdebug", "Test for loaded xdebug extension");
    if (extension_loaded('xdebug')) {
        tres($meta, TEST_High, "xDebug extension loaded.", "The xdebug extension can reveal code and data to an attacker and may have an impact on application performance, too. Please deactivate this extension in a production deployment.");
    } else {
        tres($meta, TEST_Okay, "Not loaded.");
    }
}
test_xdebug();

// test for vld extension
function test_vld()
{
	$meta = tdesc("vld", "Test for loaded vld extension");
	if (extension_loaded('vld')) {
		if (is_on(ini_get('vld.active'))) {
			tres($meta, TEST_Critical, "vld extension loaded and active.", "The vld extension can reveal code and data to an attacker and may have an impact on application performance, too. Please unload this extension in a production deployment.");
		}
		tres($meta, TEST_High, "vld extension loaded.", "The vld extension can reveal code and data to an attacker and may have an impact on application performance, too. Please unload this extension in a production deployment.");
	} else {
		tres($meta, TEST_Okay, "Not loaded.");
	}
}
test_vld();

// Output
function e($str)
{
    return htmlentities($str ?? '', ENT_QUOTES);
}
?>

	<table id="dt-basicphpconf" class="table table-bordered" width="100%">
	<thead class="<?php echo $thead; ?>">
	<tr>
		<th>Risk</th>
		<th>Name / Description</th>
		<th>Reason</th>
		<th>Recommendation</th>
	</tr>
	</thead>
	<tbody>
	<?php
foreach ($all_result_codes as $sev) {
    foreach ($trbs[$sev] as $res):
?>
		<tr>
			<td class="text-center">
			<h5><span class="badge
<?php
        if ($res['result'] == TEST_Critical) {
            echo 'badge-dark';
        }
        if ($res['result'] == TEST_High) {
            echo 'badge-danger';
        }
        if ($res['result'] == TEST_Medium) {
            echo 'badge-warning';
        }
        if ($res['result'] == TEST_Low) {
            echo 'badge-primary';
        }
        if ($res['result'] == TEST_Maybe) {
            echo 'badge-info';
        }
        if ($res['result'] == TEST_Advice) {
            echo 'badge-light';
        }
        if ($res['result'] == TEST_Okay) {
            echo 'badge-success';
        }
        if ($res['result'] == TEST_Skipped) {
            echo 'badge-secondary';
        }
?>
">
			<?php
        echo $res['result'];
?></span></h5></td>
			<td><?php
        echo e($res['name']);
?><?php
        if ($res['desc'] !== NULL) {
            echo "<br/>" . e($res['desc']);
        }
?></td>
			<td><?php
        echo e($res['reason']);
?></td>
			<td><?php
        echo e($res['recommendation']);
?></td>
		</tr>
		<?php
    endforeach;
}
?>
	</tbody>
	</table>
	
	<br />
	<h4 class="card-title">Result Statistics</h4>
	
<div class="table-responsive">
	<table class="table table-bordered">
	<thead class="<?php echo $thead; ?>">
	<tr>
	<?php
foreach ($all_result_codes as $sev) {
?>
		<td class="<?php
    echo $sev;
?>"><?php
    echo $sev;
?>:
<h5><span class="badge  
<?php
    if ($sev == TEST_Critical) {
        echo 'badge-dark';
    }
    if ($sev == TEST_High) {
        echo 'badge-danger';
    }
    if ($sev == TEST_Medium) {
        echo 'badge-warning';
    }
    if ($sev == TEST_Low) {
        echo 'badge-primary';
    }
    if ($sev == TEST_Maybe) {
        echo 'badge-info';
    }
    if ($sev == TEST_Advice) {
        echo 'badge-light';
    }
    if ($sev == TEST_Okay) {
        echo 'badge-success';
    }
    if ($sev == TEST_Skipped) {
        echo 'badge-secondary';
    }
?>
">
<?php
    echo count($trbs[$sev]);
?></span></h5></td>
	<?php
}
?></tr>
</thead>
</table>
</div>
                        </div>
                     </div>
                    
				</div>
                    
				</div>
				</div>
				<!--===================================================-->
				<!--End page content-->

			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->
</div>
<?php
footer();
?>