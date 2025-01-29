<?php
require "core.php";
head();

//Clean URL
function clean_url($site)
{
    $site = strtolower($site);
    $site = str_replace(array(
        'http://',
        'https://',
        'www.'
    ), '', $site);
    return $site;
}

$site = clean_url($settings['site_url']);
?>
<div class="content-wrapper">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div class="content-header">
				
				<div class="container-fluid">
				  <div class="row mb-2">
        		    <div class="col-sm-6">
        		      <h1 class="m-0"><i class="fas fa-info-circle"></i> System Information</h1>
        		    </div>
        		    <div class="col-sm-6">
        		      <ol class="breadcrumb float-sm-right">
        		        <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i> Admin Panel</a></li>
        		        <li class="breadcrumb-item active">System Information</li>
        		      </ol>
        		    </div>
        		  </div>
    			</div>
            </div>

				<!--Page content-->
				<!--===================================================-->
				<div class="content">
				<div class="container-fluid">

<?php
//Host Info Check
function host_info($site)
{
	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		$api_useragent = $_SERVER['HTTP_USER_AGENT'];
	} else {
		$api_useragent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118';
	}

    $ip  = getHostByName(getHostName());
    $url = 'https://ipapi.co/' . $ip . '/json/';
    $ch  = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
    curl_setopt($ch, CURLOPT_USERAGENT, $api_useragent);
    @curl_setopt($ch, CURLOPT_REFERER, "https://ipapi.co");
    @$ipcontent = curl_exec($ch);
    curl_close($ch);
    
    $ip_data = @json_decode($ipcontent);
    if ($ip_data && !isset($ip_data->{'error'})) {
        $country = $ip_data->{'country_name'};
        $isp     = $ip_data->{'org'};
    } else {
        $country = "Unknown";
        $isp     = "Unknown";
    }
    
    if ($country == '') {
        $country = "Unknown";
    }
    
    if ($isp == '') {
        $isp = "Unknown";
    }
    
    $data = $ip . "::" . $country . "::" . $isp . "::";
    return $data;
}

// Response time
$ch_resptime = curl_init($settings['site_url']);
curl_setopt($ch_resptime, CURLOPT_RETURNTRANSFER,1);
if(curl_exec($ch_resptime)) {
	
	$curl_resptime = curl_getinfo($ch_resptime);
	$response_time = $curl_resptime['total_time'];
} else {
	$response_time = 0.01;
}

//Host Info
$data         = host_info($site);
$data         = explode("::", $data);
$host_ip      = $data[0];
$serverip     = getHostByName(getHostName());
$host_country = $data[1];
$host_isp     = $data[2];

$inipath = php_ini_loaded_file();

if ($inipath) {
    $iniflp = $inipath;
} else {
    $iniflp = 'A php.ini file is not loaded';
}

$zend_version = zend_version();

$errorlog_path = ini_get('error_log');
?>
                    
                <div class="row">
				<div class="col-md-6">
                      <div class="card card-primary card-outline">
							<div class="card-header">
								<h3 class="card-title"><?php
echo $site;
?></h3>
							</div>
							<div class="card-body">
							<div class="table-responsive">
                                    <table class="table table-bordered">
												<thead class="<?php echo $thead; ?>">
													<tr>
														<th>Site Stats & Information</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Response Time</td>
														<td><h5><span class="badge badge-success"><?php
echo $response_time;
?> sec</span></h5></td>
													</tr>
													<tr>
														<td>PHP Configuration File (php.ini)</td>
														<td><h5><span class="badge badge-warning"><?php
echo $iniflp;
?></span></h5></td>
													</tr>
													<tr>
														<td>PHP Error Log</td>
														<td><h5><span class="badge badge-warning"><?php
echo $errorlog_path;
?></span></h5></td>
													</tr>
													<tr>
														<td>Zend Version</td>
														<td><h5><span class="badge badge-danger"><?php
echo $zend_version;
?></span></h5></td>
													</tr>
													<tr>
														<td>Default Timezone</td>
														<td><h5><span class="badge badge-primary"><?php
echo date_default_timezone_get();
?></span></h5></td>
													</tr>
												</tbody>
								     </table>
							</div>
							</div>
				      </div>
                    
<?php
$files   = 0;
$folders = 0;
$images  = 0;
$php     = 0;
$html    = 0;
$css     = 0;
$js      = 0;
$dir     = glob("../");
foreach ($dir as $obj) {
    if (is_dir($obj)) {
        $folders++;
        $scan = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($obj, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($scan as $file) {
            if (is_file($file)) {
                $files++;
                $exp = explode(".", $file);
                if (@array_search("png", $exp) || @array_search("jpg", $exp) || @array_search("svg", $exp) || @array_search("jpeg", $exp) || @array_search("gif", $exp)) {
                    $images++;
                } else if (@array_search("php", $exp)) {
                    $php++;
                } else if (@array_search("html", $exp) || @array_search("htm", $exp)) {
                    $html++;
                } else if (@array_search("css", $exp)) {
                    $css++;
                } else if (@array_search("js", $exp)) {
                    $js++;
                }
            } else {
                $folders++;
            }
        }
    } else {
        $files++;
    }
}
?>
                <div class="row">
                          <div class="col-md-6">
                           <div class="small-box bg-primary">
                              <div class="inner">
                                <h3><?php
echo $files;
?></h3>
                                <p>Files</p>
                              </div>
                              <div class="icon">
                                <i class="fas fa-file"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="small-box bg-info">
                               <div class="inner">
                                 <h3><?php
echo $folders;
?></h3>
                                 <p>Folders</p>
                               </div>
                               <div class="icon">
                                 <i class="fas fa-folder"></i>
                               </div>
                             </div>
                          </div>
                          <div class="col-md-6">
                            <div class="small-box bg-success">
                              <div class="inner">
                                <h3><?php
echo $images;
?></h3>
                                <p>Images</p>
                              </div>
                              <div class="icon">
                                <i class="fas fa-file-image"></i>
                              </div>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="small-box bg-danger">
                              <div class="inner">
                                <h3><?php
echo $php;
?></h3>
                                <p>PHP Files</p>
                              </div>
                              <div class="icon">
                                <i class="fab fa-php"></i>
                              </div>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="small-box bg-info">
                              <div class="inner">
                                <h3><?php
echo $html;
?></h3>
                                <p>HTML Files</p>
                              </div>
                              <div class="icon">
                                <i class="fas  fa-file-code"></i>
                              </div>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="small-box bg-success">
                              <div class="inner">
                                <h3><?php
echo $css;
?></h3>
                                <p>CSS Files</p>
                              </div>
                              <div class="icon">
                                <i class="fab fa-css3-alt"></i>
                              </div>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="small-box bg-warning">
                              <div class="inner">
                                <h3><?php
echo $js;
?></h3>
                                <p>JSS Files</p>
                              </div>
                              <div class="icon">
                                <i class="fab fa-js"></i>
                              </div>
                            </div>
                        </div>

						<div class="col-md-12">
                            <div class="info-box bg-info">
                                <span class="info-box-icon"><i class="fas fa-hdd"></i></span>

                                <div class="info-box-content">
									<span class="info-box-text">STORAGE</span>
<?php
if (!function_exists("view_size")) {
    function view_size($size)
    {
        if (!is_numeric($size)) {
            return FALSE;
        } else {
            if ($size >= 1073741824) {
                $size = round($size / 1073741824 * 100) / 100 . " GB";
            } elseif ($size >= 1048576) {
                $size = round($size / 1048576 * 100) / 100 . " MB";
            } elseif ($size >= 1024) {
                $size = round($size / 1024 * 100) / 100 . " KB";
            } else {
                $size = $size . " B";
            }
            return $size;
        }
    }
}

if (is_callable("disk_free_space") && is_callable("disk_total_space")) {
	$directory = '/';
	
    @$total = disk_total_space($directory);
	@$free = disk_free_space($directory);
	
    if ($total === FALSE || $total <= 0) {
        $total = 0;
    }
	if ($free === FALSE || $free < 0) {
        $free = 0;
    }
	
    @$used = $total - $free;
    @$free_percent = round(100 / ($total / $free), 2);
    @$used_percent = round(100 / ($total / $used), 2);
?>
                      
                                 <span class="info-box-number">Total: <?php
    echo view_size($total);
?></span>

                                 <div class="progress">
                                   <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: <?php
    echo $used_percent;
?>%"></div>
                                 </div>
                                     <span class="progress-description">
                                         Used: <span class="text-semibold"><?php
    echo view_size($used);
?> (<?php
    echo $used_percent;
?>%)</span>
                                     </span>
<?php
} else {
	echo '<i>This feature is not available on this host.</i>';	
}
?>
								</div>
							</div>
						</div>
					</div>
                   <br />
            </div>
				
				<div class="col-md-6">
<?php
$extensions = get_loaded_extensions();
$countext   = count($extensions);
?>
                <div class="card card-primary card-outline">
					<div class="card-header">
				         <h3 class="card-title">Loaded PHP Extensions - <span class="badge badge-primary"><?php
echo $countext;
?></span></h3>
					</div>
					<div class="card-body">
<pre class="bg-light"><ul>
<?php
foreach ($extensions as $extension) {
    echo "<li>" . $extension . "</li>";
}
?>
</ul></pre>
					</div>
				</div>
                    
				</div>
                
				<br /><br />
				
                <div class="col-md-12">
                    <h3 class="mt-none">Host Information</h3>
                    <p>System information about the web host.</p>
                    
					<div class="row">
                       <div class="col-md-3">
							<div class="card">
								<div class="card-body text-center">
									<p class="text-uppercase mar-btm text-sm" class="font20">Domain IP</p>
									<i class="fas fa-user fa-3x"></i>
									<hr />
									<p class="h4 text-thin"><?php
echo $serverip;
?></p>
								</div>
							</div>
                       </div>
                    
                       <div class="col-md-3">
							<div class="card">
								<div class="card-body text-center">
									<p class="text-uppercase mar-btm text-sm" class="font20">Country</p>
									<i class="fas fa-globe fa-3x"></i>
									<hr />
									<p class="h4 text-thin"><?php
echo $host_country;
?></p>
								</div>
							</div>
                       </div>

                       <div class="col-md-3">
							<div class="card">
								<div class="card-body text-center">
									<p class="text-uppercase mar-btm text-sm" class="font20">Server Software</p>
									<i class="fas fa-database fa-3x"></i>
									<hr />
									<p class="h4 text-thin">
<?php
@$version = explode("/", $_SERVER['SERVER_SOFTWARE']);
@$softNum = explode(" ", $version[1]);
@$soft = $version[0] . '/' . $softNum[0];
echo $soft;
?>
                                    </p>
								</div>
							</div>
                       </div>
                    
                       <div class="col-md-3">
							<div class="card">
								<div class="card-body text-center">
									<p class="text-uppercase mar-btm text-sm" class="font20">ISP</p>
									<i class="fas fa-tasks fa-3x"></i>
									<hr />
									<p class="h4 text-thin"><?php
echo $host_isp;
?></p>
								</div>
							</div>
                       </div>
					</div>
                    
					<div class="row">
                       <div class="col-md-3">
							<div class="card">
								<div class="card-body text-center">
									<p class="text-uppercase mar-btm text-sm" class="font20">Server OS</p>
									<i class="fas fa-desktop fa-3x"></i>
									<hr />
									<p class="h4 text-thin">
<?php
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    echo 'Windows';
} elseif (PHP_OS === 'Linux') {
    echo 'Linux';
} elseif (PHP_OS === 'FreeBSD') {
    echo 'FreeBSD';
} elseif (PHP_OS === 'OpenBSD') {
    echo 'OpenBSD';
} elseif (PHP_OS === 'NetBSD') {
    echo 'NetBSD';
} elseif (PHP_OS === 'SunOS') {
    echo 'SunOS';
} elseif (PHP_OS === 'Unix') {
    echo 'Unix';
} elseif (PHP_OS === 'Darwin') {
    echo 'Darwin';
} elseif (PHP_OS === 'HP-UX') {
    echo 'HP-UX';
} elseif (PHP_OS === 'IRIX64') {
    echo 'IRIX64';
} elseif (PHP_OS === 'CYGWIN_NT-5.1') {
    echo 'CYGWIN';
} elseif (PHP_OS === 'GNU') {
    echo 'GNU';
} elseif (PHP_OS === 'DragonFly') {
    echo 'DragonFly';
} elseif (PHP_OS === 'MSYS_NT-6.1') {
    echo 'MSYS';
} else {
    echo 'Unknown';
}
?>                                    
                                    </p>
								</div>
							</div>
                       </div>
                       
                       <div class="col-md-3">
							<div class="card">
								<div class="card-body text-center">
									<p class="text-uppercase mar-btm text-sm" class="font20">PHP Version</p>
									<i class="fas fa-file-code fa-3x"></i>
									<hr />
									<p class="h4 text-thin"><?php
echo phpversion();
?></p>
								</div>
							</div>
                       </div>
                    
                       <div class="col-md-3">
							<div class="card">
								<div class="card-body text-center">
									<p class="text-uppercase mar-btm text-sm" class="font20">MySQL Version</p>
									<i class="fas fa-list-alt fa-3x"></i>
									<hr />
									<p class="h4 text-thin"><?php
echo mysqli_get_server_info($mysqli);
?></p>
								</div>
							</div>
                       </div>
                    
                       <div class="col-md-3">
							<div class="card">
								<div class="card-body text-center">
									<p class="text-uppercase mar-btm text-sm" class="font20">Server Port</p>
									<i class="fas fa-plug fa-3x"></i>
									<hr />
									<p class="h4 text-thin"><?php
echo $_SERVER['SERVER_PORT'];
?></p>
								</div>
							</div>
                       </div>
                    </div>
                    
					<div class="row">
                       <div class="col-md-3">
							<div class="card">
								<div class="card-body text-center">
									<p class="text-uppercase mar-btm text-sm" class="font20">OpenSSL Version</p>
									<i class="fas fa-lock fa-3x"></i>
									<hr />
									<p class="h4 text-thin">
<?php
if (!extension_loaded('openssl')) {
    echo '<font style="color: red;">Deactivated</font>';
} else {
    echo str_replace("OpenSSL", "", OPENSSL_VERSION_TEXT);
}
?></p>
								</div>
							</div>
                       </div>
                    
                       <div class="col-md-3">
							<div class="card">
								<div class="card-body text-center">
									<p class="text-uppercase mar-btm text-sm" class="font20">cURL Extension</p>
									<i class="fas fa-link fa-3x"></i>
									<hr />
									<p class="h4 text-thin">
<?php
if (function_exists('curl_version')) {
    $values = curl_version();
    echo $values["version"];
} else {
    echo '<font style="color: red;">Disabled</font>';
}
?></p>
								</div>
							</div>
                       </div>
                      
                       <div class="col-md-3">
							<div class="card">
								<div class="card-body text-center">
									<p class="text-uppercase mar-btm text-sm" class="font20">HTTP Protocol</p>
									<i class="fas fa-hdd fa-3x"></i>
									<hr />
									<p class="h4 text-thin"><?php
echo $_SERVER['SERVER_PROTOCOL'];
?></p>
								</div>
							</div>
                       </div>
                     
                       <div class="col-md-3">
							<div class="card">
								<div class="card-body text-center">
									<p class="text-uppercase mar-btm text-sm" class="font20">Gateway Interface</p>
									<i class="fas fa-sitemap fa-3x"></i>
									<hr />
									<p class="h4 text-thin"><?php
echo @$_SERVER['GATEWAY_INTERFACE'];
?></p>
								</div>
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