<?php

include "core.php";
head();

if (isset($_POST['username'])) {
	$_SESSION['username'] = addslashes(htmlspecialchars(strip_tags($_POST['username'])));
} else {
	$_SESSION['username'] = '';
}
if (isset($_POST['password'])) {
	$_SESSION['password'] = addslashes(htmlspecialchars(strip_tags($_POST['password'])));
} else {
	$_SESSION['password'] = '';
}
?>
<form method="post" action="" class="form-horizontal row-border">

	<div class="form-group">
		<p class="col-sm-3">Username: </p>
		<div class="col-sm-12">
			<div class="input-group input-group-prepend">
				<span class="input-group-text">
					<i class="fa fa-user"></i>
				</span>
				<input type="text" name="username" class="form-control" placeholder="admin" value="<?php
																									echo $_SESSION['username'];
																									?>" required>
			</div>
		</div>
	</div>
	<div class="form-group">
		<p class="col-sm-3">Password: </p>
		<div class="col-sm-12">
			<div class="input-group input-group-prepend">
				<span class="input-group-text">
					<i class="fa fa-lock"></i>
				</span>
				<input type="text" name="password" class="form-control" placeholder="" value="<?php
																								echo $_SESSION['password'];
																								?>" required>
			</div>
		</div>
	</div>

	<?php
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		echo '<meta http-equiv="refresh" content="0; url=malscan-finish" />';
	}
	?>

	<br />
	<input class="btn-primary btn btn-block" type="submit" name="submit" value="Next" />

	</div>
</form>
<?php
footer();
?>