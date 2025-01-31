<?php
require "core.php";
head();

// Purge logs older than 30 days
$datetod = strtotime(date('d F Y', strtotime('-30 days')));
$query2 = $mysqli->query("SELECT id, date, ip FROM `psec_live-traffic` ORDER BY id ASC");
while ($row2 = $query2->fetch_assoc()) {
	if (strtotime($row2['date']) < $datetod) {
		
		$id     = $row2['id'];
		$query3 = $mysqli->query("DELETE FROM `psec_live-traffic` WHERE id = '$id'");
		
		// Delete cache file
		if(is_file('modules/cache/live-traffic/' . $row2['ip'] . '.json')) {
			unlink('modules/cache/live-traffic/' . $row2['ip'] . '.json'); 
		}
	}
}

if (isset($_GET['enable'])) {
	
    $settings['live_traffic'] = 1;
	file_put_contents('config_settings.php', '<?php $settings = ' . var_export($settings, true) . '; ?>');
}

if (isset($_GET['disable'])) {
	
    $settings['live_traffic'] = 0;
	file_put_contents('config_settings.php', '<?php $settings = ' . var_export($settings, true) . '; ?>');
	
	$files = glob('modules/cache/live-traffic/*'); // Get all cache file names
	foreach($files as $file){ // Iterate cache files
		if(is_file($file)) {
			unlink($file); // Delete cache file
		}
	}
}

if (isset($_GET['delete-all'])) {
    $query = $mysqli->query("TRUNCATE TABLE `psec_live-traffic`");
}
?>
<div class="content-wrapper">

	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div class="content-header">
		<div class="container-fluid">
		  <div class="row mb-2">
			<div class="col-sm-6">
			  <h1 class="m-0 "><i class="fas fa-globe"></i> Live Traffic</h1>
			</div>
			<div class="col-sm-6">
			  <ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i> Admin Panel</a></li>
				<li class="breadcrumb-item active">Live Traffic</li>
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
			
					<div class="callout callout-info">
						Visit logs older than 30 days will be automatically deleted.
					</div>
						
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="card-title">Live Traffic</h3>&nbsp;&nbsp;&nbsp;
							<div class="float-sm-right">
<?php
if ($settings['live_traffic'] == 0) {
	echo '<a href="?enable" class="btn btn-flat btn-primary btn-sm"><i class="fas fa-play"></i> Enable Tracking</a>';
} else {
	echo '<a href="?disable" class="btn btn-flat btn-secondary btn-sm"><i class="fas fa-pause-circle"></i> Disable Tracking</a>';
}
?>
								<a href="live-traffic.php" class="btn btn-flat btn-primary btn-sm"><i class="fas fa-sync-alt"></i> Refresh</a>
								<a href="?delete-all" class="btn btn-flat btn-danger btn-sm"><i class="fas fa-trash"></i> Delete Data</a>
							</div>
						</div>
						<div class="card-body">
				
							<table id="dt-basiclivetraff" class="table table-sm table-bordered table-hover" width="100%">
								<thead class="<?php echo $thead; ?>">
									<tr>
										<th>IP Address</th>
										<th>Country</th>
										<th>Browser</th>
										<th>OS</th>
										<th>Domain </th>
										<th>Page</th>
										<th>Date</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
<?php
$query = $mysqli->query("SELECT id, bot, ip, country, country_code, browser, browser_code, os, os_code, domain, request_uri, date, time FROM `psec_live-traffic` ORDER BY id DESC");
while ($row = $query->fetch_assoc()) {
    echo '
									<tr>
										<td>' . $row['ip'] . '
									';
    if ($row['bot'] == 1) {
        echo '<span class="badge badge-primary">Bot</span>';
    }
    echo '</td>
										<td><img src="assets/plugins/flags/blank.png" class="flag flag-' . strtolower($row['country_code']) . '" alt="' . $row['country'] . '" /> ' . $row['country'] . '</td>
										<td><img src="assets/img/icons/browser/' . $row['browser_code'] . '.png" /> ' . $row['browser'] . '</td>
										<td><img src="assets/img/icons/os/' . $row['os_code'] . '.png" /> ' . $row['os'] . '</td>
										<td>' . $row['domain'] . '</td>
										<td>' . $row['request_uri'] . '</td>
										<td data-sort="' . strtotime($row['date']) . ' + ' . $row['time'] . '">' . $row['date'] . ' at ' . $row['time'] . '</td>
										<td><a href="visitor-details.php?id=' . $row['id'] . '" class="btn btn-sm btn-flat btn-primary" data-toggle="tooltip" title="Visitor Details"><i class="fas fa-tasks"></i></a></td>
									</tr>
';
}
?>
								</tbody>
							</table>
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