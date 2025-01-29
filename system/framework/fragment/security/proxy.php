<?php
require "core.php";
head();

if (isset($_GET['api'])) {
    
    $apid = (int) $_GET['api'];
    
    if ($apid == 0 || $apid == 1 || $apid == 2 || $apid == 3) {
        
        $settings['proxy_protection'] = $apid;

		file_put_contents('config_settings.php', '<?php $settings = ' . var_export($settings, true) . '; ?>');

		$files = glob('modules/cache/proxy/*'); // Get all cache file names
		foreach($files as $file){ // Iterate cache files
			if(is_file($file)) {
				unlink($file); // Delete cache file
			}
		}
    }
}

if (isset($_POST['save2'])) {

    $apiks = 'proxy_api' . $settings['proxy_protection'];
    
    if (isset($_POST['protection2'])) {
        $settings['proxy_protection2'] = 1;
    } else {
        $settings['proxy_protection2'] = 0;
    }
    
    if ($settings['proxy_protection'] > 0) {
		
		$api_key = $_POST['apikey'];
		
		$settings[$apiks] = $api_key;
		
		$files = glob('modules/cache/proxy/*'); // Get all cache file names
		foreach($files as $file){ // Iterate cache files
			if(is_file($file)) {
				unlink($file); // Delete cache file
			}
		}
	}
	
	file_put_contents('config_settings.php', '<?php $settings = ' . var_export($settings, true) . '; ?>');
}

if (isset($_POST['save'])) {

    if (isset($_POST['logging'])) {
        $settings['proxy_logging'] = 1;
    } else {
        $settings['proxy_logging'] = 0;
    }
    
    if (isset($_POST['mail'])) {
        $settings['proxy_mail'] = 1;
    } else {
        $settings['proxy_mail'] = 0;
    }
    
    $settings['proxy_redirect'] = $_POST['redirect'];
    
    file_put_contents('config_settings.php', '<?php $settings = ' . var_export($settings, true) . '; ?>');
}
?>
<div class="content-wrapper">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div class="content-header">
				
				<div class="container-fluid">
				  <div class="row mb-2">
        		    <div class="col-sm-6">
        		      <h1 class="m-0 "><i class="fas fa-code"></i> Protection Module</h1>
        		    </div>
        		    <div class="col-sm-6">
        		      <ol class="breadcrumb float-sm-right">
        		        <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i> Admin Panel</a></li>
        		        <li class="breadcrumb-item active">Protection Module</li>
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
				<div class="col-md-8">
                    	    
<?php
if ($settings['proxy_protection'] > 0 OR $settings['proxy_protection2'] == 1) {
    echo '
              <div class="card card-solid card-success">
';
} else {
    echo '
              <div class="card card-solid card-danger">
';
}
?>
						<div class="card-header">
							<h3 class="card-title">Proxy - Protection Module</h3>
						</div>
						<div class="card-body">
<?php
if ($settings['proxy_protection'] > 0 OR $settings['proxy_protection2'] == 1) {
    echo '
        <h1 class="pm_enabled"><i class="fas fa-check-circle"></i> Enabled</h1>
        <p>The website is protected from <strong>Proxies</strong></p>
';
} else {
    echo '
        <h1 class="pm_disabled"><i class="fas fa-times-circle"></i> Disabled</h1>
        <p>The website is not protected from <strong>Proxies</strong></p>
';
}
?>
                        </div>
                    </div>
                    
                        <div class="card card-primary card-outline">
                        	<div class="card-header">
								<h3 class="card-title"><i class="fas fa-shield-alt"></i> Proxy Detection Methods</h3>
							</div>
							<div class="card-body">
							<form class="form-horizontal form-bordered" action="" method="post">
                        	    <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-body bg-light">
                                        <div class="row">
										<div class="col-md-6">
                                        <h5>Detection Method #1</h5>
										</div>
										<div class="col-md-6">
										<div class="dropdown">
										  <button class="btn btn-<?php
if ($settings['proxy_protection'] == 0) {
    echo 'danger';
} else {
    echo 'success';
}
?> dropdown-toggle float-right" class="width100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<?php
if ($settings['proxy_protection'] == 1) {
    echo 'IPHub';
} else if ($settings['proxy_protection'] == 2) {
    echo 'ProxyCheck';
} else if ($settings['proxy_protection'] == 3) {
    echo 'IPHunter';
} else {
    echo 'Proxy Detection API';
}
?>
											</button>
										  <div class="dropdown-menu" class="width100">
										    <a class="dropdown-item <?php
if ($settings['proxy_protection'] == 0) {
    echo 'active';
}
?>" href="?api=0">Disabled</a>
											<div class="dropdown-divider"></div>
										    <a class="dropdown-item <?php
if ($settings['proxy_protection'] == 1) {
    echo 'active';
}
?>" href="?api=1">IPHub</a>
										    <a class="dropdown-item <?php
if ($settings['proxy_protection'] == 2) {
    echo 'active';
}
?>" href="?api=2">ProxyCheck</a>
											<a class="dropdown-item <?php
if ($settings['proxy_protection'] == 3) {
    echo 'active';
}
?>" href="?api=3">IPHunter</a>
										  </div>
										</div>
									    </div>
										</div>
										<hr />
                                        Connects to Proxy Detection API and verifies whether the visitor is using a Proxy, VPN or TOR
                                        <br /><br />
<?php
if ($settings['proxy_protection'] > 0 && $settings['proxy_protection'] < 4) {
    
    $apik = 'proxy_api' . $settings['proxy_protection'];
    $key  = $settings[$apik];
    
    $proxy_check = 0;
    
    if ($settings['proxy_protection'] == 1) {
        //Invalid API Key ==> Offline
        $ch  = curl_init();
        $url = "http://v2.api.iphub.info/ip/8.8.8.8";
        curl_setopt_array($ch, [
			CURLOPT_URL => $url,
			CURLOPT_CONNECTTIMEOUT => 30,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => [ "X-Key: {$key}" ]
        ]);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);
        
        if ($httpCode >= 200 && $httpCode < 300) {
            $proxy_check = 1;
        } else if ($httpCode == 429) {
            $proxy_check = 429;
        }
		
    } else if ($settings['proxy_protection'] == 2) {
        
        $key = $settings['proxy_api2'];
            
        $ch           = curl_init('http://proxycheck.io/v2/8.8.8.8?key=' . $key . '');
        $curl_options = array(
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $curl_options);
        $response = curl_exec($ch);
        curl_close($ch);

        $jsonc = json_decode($response);
		
		if (isset($jsonc->status) && $jsonc->status == "ok") {
			$proxy_check = 1;
		}
        
    } else if ($settings['proxy_protection'] == 3) {
        //Invalid API Key ==> Offline
        $headers = [
			'X-Key: '.$key.'',
        ];
        $ch = curl_init("https://www.iphunter.info:8082/v1/ip/8.8.8.8");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);
        
        if ($httpCode >= 200 && $httpCode < 300) {
            $proxy_check = 1;
        } else if ($httpCode == 429) {
            $proxy_check = 429;
        }
		
    }
    
    if ($proxy_check == 0) {
        echo '<div class="callout callout-warning" role="callout">Invalid / missing API Key or API is Offline</div>';
    } else if ($proxy_check == 429) {
        echo '<div class="callout callout-warning" role="callout">Requests Limit exceeded</div>';
    }
    
    if ($settings[$apik] == NULL OR $proxy_check == 0) {
        if ($settings['proxy_protection'] == 1) {
            $apik_url = 'https://iphub.info/pricing';
        } else if ($settings['proxy_protection'] == 2) {
            $apik_url = 'https://proxycheck.io/pricing';
        } else if ($settings['proxy_protection'] == 3) {
            $apik_url = 'https://www.iphunter.info/prices';
        }
?>
                                        <a href="<?php
        echo $apik_url;
?>" class="btn btn-info btn-block text-white" target="_blank"><i class="fas fa-key"></i> Get API Key</a><br />
<?php
    }
}
?>
											
											<p>API Key</p>
											<input name="apikey" class="form-control" type="text" <?php
if ($settings['proxy_protection'] > 0) {
	echo 'value="' . $settings[$apik] . '"';
} else {
	echo 'disabled';
}
?>>
                                        </div>
                                    </div>
									</div>
									<div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-body bg-light">
											<div class="row">
												<div class="col-md-10">
													<h5>Detection Method #2</h5>
												</div>
												<div class="col-md-2">
													<input type="checkbox" name="protection2" class="psec-switch" <?php
if ($settings['proxy_protection2'] == 1) {
    echo 'checked="checked"';
}
?> />
												</div>
											</div><hr />
											Checks the visitor's HTTP connection headers for Proxy elements
                                        </div>
                                    </div>
                                    
									</div>
                                    <center><button class="btn btn-flat btn-md btn-block btn-primary mar-top" name="save2" type="submit"><i class="fas fa-save"></i> Save</button></center>
                                </div>
                        	</div>
                    </form>
                    
                </div>
                    
                <div class="col-md-4">
                     <div class="card card-primary card-outline">
                        	<div class="card-header">
								<h3 class="card-title"><i class="fas fa-info-circle"></i> What is Proxy</h3>
							</div>
							<div class="card-body">
                                <strong>Proxy</strong> or <strong>Proxy Server</strong> is basically another computer which serves as a hub through which internet requests are processed. By connecting through one of these servers, your computer sends your requests to the proxy server which then processes your request and returns what you were wanting.
                        	</div>
                     </div>
                     <div class="card card-primary card-outline">
                        	<div class="card-header">
								<h3 class="card-title"><i class="fas fa-cogs"></i> Module Settings</h3>
							</div>
							<div class="card-body">
									<ul class="list-group">
<form class="form-horizontal form-bordered" action="" method="post">
										<li class="list-group-item">
											<p>Logging</p>
												<input type="checkbox" name="logging" class="psec-switch" <?php
if ($settings['proxy_logging'] == 1) {
    echo 'checked="checked"';
}
?> /><br />
											<span class="text-muted">Logs the detected threats</span>
										</li>
                                        <li class="list-group-item">
											<p>Mail Notifications</p>
												<input type="checkbox" name="mail" class="psec-switch" <?php
if ($settings['proxy_mail'] == 1) {
    echo 'checked="checked"';
}
?> /><br />
											<span class="text-muted">Receive email notifications when threat of this type is detected</span>
										</li>
                                        <li class="list-group-item">
											<p>Redirect URL</p>
											<input name="redirect" class="form-control" type="text" value="<?php
echo $settings['proxy_redirect'];
?>" required>
										</li>
									</ul>
                        	</div>
                            <div class="card-footer">
                                <button class="btn btn-flat btn-block btn-primary mar-top" name="save" type="submit"><i class="fas fa-save"></i> Save</button>
                            </div>
</form>
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