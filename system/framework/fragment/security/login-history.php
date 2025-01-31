<?php
require "core.php";
head();

// Purge login logs older than 6 months
$datetod = strtotime(date('d F Y', strtotime('-6 months')));
$query2 = $mysqli->query("SELECT id, date FROM `psec_logins` ORDER BY id ASC");
while ($row2 = $query2->fetch_assoc()) {
	if (strtotime($row2['date']) < $datetod) {
		$id     = $row2['id'];
		$query3 = $mysqli->query("DELETE FROM `psec_logins` WHERE id = '$id'");
	}
}
?>
<div class="content-wrapper">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div class="content-header">
				
				<div class="container-fluid">
				  <div class="row mb-2">
        		    <div class="col-sm-6">
        		      <h1 class="m-0 "><i class="fas fa-history"></i> Login History</h1>
        		    </div>
        		    <div class="col-sm-6">
        		      <ol class="breadcrumb float-sm-right">
        		        <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i> Admin Panel</a></li>
        		        <li class="breadcrumb-item active">Login History</li>
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
					Login logs older than 6 months will be automatically deleted.
				</div>
					
                <div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="card-title">Login History</h3>
						</div>
						<div class="card-body">
<table id="dt-basicloghist" class="table table-bordered table-hover table-sm" width="100%">
									<thead class="<?php echo $thead; ?>">
										<tr>
											<th><i class="fas fa-user"></i> Username</th>
											<th><i class="fas fa-address-card"></i> IP Address</th>
											<th><i class="far fa-calendar-alt"></i> Date & Time</th>
											<th><i class="fas fa-info-circle"></i> Login Status</th>
											<th><i class="fas fa-cog"></i> Actions</th>
										</tr>
									</thead>
									<tbody>
<?php
$query = $mysqli->query("SELECT * FROM `psec_logins` ORDER BY id DESC");
while ($row = $query->fetch_assoc()) {
    echo '
										<tr>
											<td>' . $row['username'] . '</td>
                                            <td>' . $row['ip'] . '</td>
											<td data-sort="' . strtotime($row['date']) . ' + ' . $row['time'] . '">' . $row['date'] . ' at ' . $row['time'] . '</td>
											<td>';
    if ($row['successful'] == 0) {
        echo '<span class="badge badge-danger">Failed</span>';
    } else {
        echo '<span class="badge badge-success">Successful</span>';
    }
    echo '
	</td>
											<td>
                                            <a href="ip-lookup.php?ip=' . $row['ip'] . '" class="btn btn-flat btn-flat btn-primary btn-sm"><i class="fas fa-search"></i> IP Lookup</a>
											</td>
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