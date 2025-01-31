<?php
require "core.php";
head();
?>
<div class="content-wrapper">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div class="content-header">
				
				<div class="container-fluid">
				  <div class="row mb-2">
        		    <div class="col-sm-6">
        		      <h1 class="m-0 "><i class="fas fa-check"></i> PHP Functions - Security Check</h1>
        		    </div>
        		    <div class="col-sm-6">
        		      <ol class="breadcrumb float-sm-right">
        		        <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i> Admin Panel</a></li>
        		        <li class="breadcrumb-item active">PHP Functions - Security Check</li>
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

							    <div class="card">
								<div class="card-header">
								<ul class="nav nav-tabs card-header-tabs">
									<li class="nav-item active">
										<a href="#f1" data-toggle="tab" class="nav-link active text-center">Command Execution</a>
									</li>
									<li class="nav-item">
										<a href="#f2" data-toggle="tab" class="nav-link text-center">PHP Code Execution</a>
									</li>
									<li class="nav-item">
										<a href="#f3" data-toggle="tab" class="nav-link text-center">Information Disclosure</a>
									</li>
									<li class="nav-item">
										<a href="#f4" data-toggle="tab" class="nav-link text-center">Filesystem Functions</a>
									</li>
									<li class="nav-item">
										<a href="#f5" data-toggle="tab" class="nav-link text-center">Other</a>
									</li>			
								</ul>
								</div>
								<div class="card-body">
								<div class="tab-content">
									<div id="f1" class="tab-pane fade active show">
									    <div class="card card-body bg-light">Executing commands and returning the complete output</div><br />
										    <div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> exec &nbsp;&nbsp;
<?php
if (function_exists('exec')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>
                                                <br /><br /><pre class="breadcrumb" class="font14">Returns last line of commands output</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> passthru &nbsp;&nbsp;
<?php
if (function_exists('passthru')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>
                                                <br /><br /><pre class="breadcrumb" class="font14">Passes commands output directly to the browser</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> system &nbsp;&nbsp;
<?php
if (function_exists('system')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>
                                                <br /><br /><pre class="breadcrumb" class="font14">Passes commands output directly to the browser and returns last line</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> shell_exec &nbsp;&nbsp;
<?php
if (function_exists('shell_exec')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>
                                                <br /><br /><pre class="breadcrumb" class="font14">Returns commands output</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> popen &nbsp;&nbsp; 
<?php
if (function_exists('popen')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>
                                                <br /><br /><pre class="breadcrumb" class="font14">Opens read or write pipe to process of a command</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> proc_open &nbsp;&nbsp; 
<?php
if (function_exists('proc_open')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>
                                                <br /><br /><pre class="breadcrumb" class="font14">Similar to popen() but greater degree of control</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> pcntl_exec &nbsp;&nbsp; 
<?php
if (function_exists('pcntl_exec')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>
                                                <br /><br /><pre class="breadcrumb" class="font14">Executes a program</pre></h6>
									    	</div>
									</div>
									
									<div id="f2" class="tab-pane fade">
										<div class="card card-body bg-light">Apart from eval there are other ways to execute PHP code: include/require can be used for remote code execution in the form of Local File Include and Remote File Include vulnerabilities.</div><br />
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> assert &nbsp;&nbsp; 
<?php
if (function_exists('assert')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>
                                                 <br /><br /><pre class="breadcrumb" class="font14">Identical to eval()</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> create_function &nbsp;&nbsp; 
<?php
if (function_exists('create_function')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Create an anonymous (lambda-style) function</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> allow_url_fopen &nbsp;&nbsp; 
<?php
if (function_exists('allow_url_fopen')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>
                                                <br /><br /><pre class="breadcrumb" class="font14">This option enables the URL-aware fopen wrappers that enable accessing URL object like files - File inclusion vulnerability</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> allow_url_include &nbsp;&nbsp; 
<?php
if (function_exists('allow_url_include')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">This option allows the use of URL-aware fopen wrappers with the following functions: include, include, require, require - File inclusion vulnerability</pre></h6>
									    	</div>
									</div>
									
									<div id="f3" class="tab-pane fade">
									    <div class="card card-body bg-light">Most of these function calls are not sinks. But rather it maybe a vulnerability if any of the data returned is viewable to an attacker.</div><br />
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> expose_php &nbsp;&nbsp; 
<?php
if (function_exists('expose_php')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                  
                                                <br /><br /><pre class="breadcrumb" class="font14">Adds your PHP version to the response headers and this could be used for security exploits</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> display_errors &nbsp;&nbsp; 
<?php
if (function_exists('display_errors')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Shows PHP errors to the client and this could be used for security exploits</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> display_startup_errors &nbsp;&nbsp; 
<?php
if (function_exists('display_startup_errors')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Shows PHP startup sequence errors to the client and this could be used for security exploits</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> posix_getlogin &nbsp;&nbsp; 
<?php
if (function_exists('posix_getlogin')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Return login name</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> posix_ttyname &nbsp;&nbsp; 
<?php
if (function_exists('posix_ttyname')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Determine terminal device name</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> getenv &nbsp;&nbsp; 
<?php
if (function_exists('getenv')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gets the value of an environment variable</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> get_current_user &nbsp;&nbsp; 
<?php
if (function_exists('get_current_user')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gets the name of the owner of the current PHP script</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> proc_get_status &nbsp;&nbsp; 
<?php
if (function_exists('proc_get_status')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Get information about a process opened by proc_open()</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> get_cfg_var &nbsp;&nbsp; 
<?php
if (function_exists('get_cfg_var')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gets the value of a PHP configuration option</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> getcwd &nbsp;&nbsp; 
<?php
if (function_exists('getcwd')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gets the current working directory</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> getmygid &nbsp;&nbsp; 
<?php
if (function_exists('getmygid')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Get PHP script owner's GID</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> getmyinode &nbsp;&nbsp; 
<?php
if (function_exists('getmyinode')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gets the inode of the current script</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> getmypid &nbsp;&nbsp; 
<?php
if (function_exists('getmypid')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gets PHP's process ID</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> getmyuid &nbsp;&nbsp; 
<?php
if (function_exists('getmyuid')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gets PHP script owner's UID</pre></h6>
									    	</div>
									</div>
									
									<div id="f4" class="tab-pane fade">
									    <div class="card card-body bg-light">According to RATS all filesystem functions in PHP are nasty. Some of these don't seem very useful to the attacker. Others are more useful than you might think. For instance if allow_url_fopen=On then a url can be used as a file path, so a call to copy($_GET['s'], $_GET['d']); can be used to upload a PHP script anywhere on the system. Also if a website is vulnerable to a request send via GET everyone of those file system functions can be abused to channel and attack to another host through your server.</div><br />
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> chgrp &nbsp;&nbsp; 
<?php
if (function_exists('chgrp')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Changes file group</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> chmod &nbsp;&nbsp; 
<?php
if (function_exists('chmod')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Changes file mode</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> chown &nbsp;&nbsp; 
<?php
if (function_exists('chown')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Changes file owner</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> lchgrp &nbsp;&nbsp; 
<?php
if (function_exists('lchgrp')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Changes group ownership of symlink</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> lchown &nbsp;&nbsp; 
<?php
if (function_exists('lchown')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Changes user ownership of symlink</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> link &nbsp;&nbsp; 
<?php
if (function_exists('link')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Create a hard link</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> symlink &nbsp;&nbsp; 
<?php
if (function_exists('symlink')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Creates a symbolic link</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> tempnam &nbsp;&nbsp; 
<?php
if (function_exists('tempnam')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Create file with unique file name</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> touch &nbsp;&nbsp; 
<?php
if (function_exists('touch')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Sets access and modification time of file</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> ftp_get &nbsp;&nbsp; 
<?php
if (function_exists('ftp_get')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Downloads a file from the FTP server</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> ftp_nb_get &nbsp;&nbsp; 
<?php
if (function_exists('ftp_nb_get')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Read from filesystem</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> ftp_put &nbsp;&nbsp; 
<?php
if (function_exists('ftp_put')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Uploads a file to FTP server</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> ftp_nb_put &nbsp;&nbsp; 
<?php
if (function_exists('ftp_nb_put')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Stores a file on FTP server (non-blocking)</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> filegroup &nbsp;&nbsp; 
<?php
if (function_exists('filegroup')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gets file group</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> fileinode &nbsp;&nbsp; 
<?php
if (function_exists('fileinode')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gets file inode</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> fileowner &nbsp;&nbsp; 
<?php
if (function_exists('fileowner')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gets file owner</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> fileperms &nbsp;&nbsp; 
<?php
if (function_exists('fileperms')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gets file permissions</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> linkinfo &nbsp;&nbsp; 
<?php
if (function_exists('linkinfo')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gets information about a link</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> stat &nbsp;&nbsp; 
<?php
if (function_exists('stat')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gives information about a file</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> fstat &nbsp;&nbsp; 
<?php
if (function_exists('fstat')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gives information about a file</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> lstat &nbsp;&nbsp; 
<?php
if (function_exists('lstat')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Gives information about a file or symbolic link</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> readlink &nbsp;&nbsp; 
<?php
if (function_exists('readlink')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Returns target of a symbolic link</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> bzopen &nbsp;&nbsp; 
<?php
if (function_exists('bzopen')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Opens a bzip2 compressed file</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> gzopen &nbsp;&nbsp; 
<?php
if (function_exists('gzopen')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Open gz-file</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> gzfile &nbsp;&nbsp; 
<?php
if (function_exists('gzfile')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Read entire gz-file into an array</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> readgzfile &nbsp;&nbsp; 
<?php
if (function_exists('readgzfile')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Output a gz-file</pre></h6>
									    	</div>
									</div>
									
									<div id="f5" class="tab-pane fade">
									     <br />
										    <div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> extract &nbsp;&nbsp; 
<?php
if (function_exists('extract')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Opens the door for register_globals attacks</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> putenv &nbsp;&nbsp; 
<?php
if (function_exists('putenv')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Sets value of an environment variable</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> proc_nice &nbsp;&nbsp; 
<?php
if (function_exists('proc_nice')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Change the priority of current process</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> proc_terminate &nbsp;&nbsp; 
<?php
if (function_exists('proc_terminate')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Kills a process opened by proc_open</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> proc_close &nbsp;&nbsp; 
<?php
if (function_exists('proc_close')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Close a process opened by proc_open() and return the exit code of that process</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> apache_child_terminate &nbsp;&nbsp; 
<?php
if (function_exists('apache_child_terminate')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Terminate apache process after request</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> posix_kill &nbsp;&nbsp; 
<?php
if (function_exists('posix_kill')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Send a signal to a process</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> posix_setpgid &nbsp;&nbsp; 
<?php
if (function_exists('posix_setpgid')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Set process group id for job control</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> posix_setsid &nbsp;&nbsp; 
<?php
if (function_exists('posix_setsid')) {
    echo '<span class="badge badge-danger">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Make current process a session leader</pre></h6>
									    	</div>
											<div class="callout callout-default">
									    		<h6><i class="fas fa-code"></i> posix_setuid &nbsp;&nbsp; 
<?php
if (function_exists('posix_setuid')) {
    echo '<span class="badge badge-warning">Not Disabled</span>';
} else {
    echo '<span class="badge badge-success">Disabled</span>';
}
?>                                                
                                                <br /><br /><pre class="breadcrumb" class="font14">Set UID of current process</pre></h6>
									    	</div>
									</div>
								</div>
							    </div>
                        </div>
                </div>
                    
				<div class="col-md-4">
				     <div class="card">
						<div class="card-header">
							<h3 class="card-title"><i class="fas fa-info-circle"></i> Information & Tips</h3>
						</div>
				        <div class="card-body">
							  On this page you can see which vulnerable PHP Functions are enabled on your host.<br />
				              If you decide you can disable them from the php.ini file on your host.		
                        </div>
				     </div>
                     <div class="card">
						<div class="card-header">
							<h3 class="card-title"><i class="fab fa-php"></i> How to Disable PHP Functions</h3>
						</div>
				        <div class="card-body">
							  <ol>
									<li>Open the <b>php.ini</b> file of your website</li>
									<li>Find <b>disable_functions</b> variable and set it as follows for example: <br /><br />
										<pre class="breadcrumb" class="font14">disable_functions = exec,passthru,shell_exec,system,proc_open,popen</pre>
									</li>
									<li>Save and close the file. Restart the HTTPD Server (Apache)</li>
				             </ol>		
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