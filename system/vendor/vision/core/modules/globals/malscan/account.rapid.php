<?php
require("core.php");
head();
?>
<div class="page-content">
	<div class="container-fluid">

		<!--Page content-->
		<!--===================================================-->
		<section class="content">

			<?php
			if (isset($_POST['edit'])) {
				$username = htmlspecialchars(strip_tags($_POST['username']));
				$password = $_POST['password'];

				$config['username'] = $username;
				file_put_contents('config.php', '<?php return ' . var_export($config, true) . '; ?>');
				if ($password != null) {
					$password = hash('sha256', $_POST['password']);

					$config['password'] = $password;
					file_put_contents('config.php', '<?php return ' . var_export($config, true) . '; ?>');
				}
				echo '<meta http-equiv="refresh" content="0;url=malscan">';
			}
			?>

			<div class="row">

				<div class="col-md-12">
					<form class="form-horizontal" action="" method="post">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Edit Account</h3>
							</div>
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-4 control-label">Username: </label>
									<div class="col-sm-8">
										<input type="text" name="username" class="form-control" value="<?php
																										echo $config['username'];
																										?>" required>
									</div>
								</div>
								<hr>
								<div class="form-group">
									<label class="col-sm-4 control-label">New Password: </label>
									<div class="col-sm-8">
										<input type="text" name="password" class="form-control">
									</div>
								</div>
								<br /><i>Fill this field only if you want to change the password.</i>
							</div>
							<div class="panel-footer">
								<button class="btn btn-flat btn-success btn-block" name="edit" type="submit">Save</button>
							</div>
						</div>
					</form>

				</div>
			</div>

	</div>
	<!--===================================================-->
	<!--End page content-->


</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->

<?php
footer();
?>