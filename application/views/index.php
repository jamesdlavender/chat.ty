<!DOCTYPE html>
<!-- [if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!-- [if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head> 
	<meta charset="utf-8"/>
	<title>Chat.ty - Chat System</title>
	<meta name="description" content=""/>
	<meta author=""  content=""/>
	
	<!-- Mobile specific meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" />
	
	<!-- [if lt IE9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
</head>
<body>
	
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a href="<?php echo base_url();?>" class="brand">Chat.ty - Chat System</a>
					<a data-toggle="collapse" data-target=".nav-collapse" class="btn btn-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</a>
				<div class="collapse nav-collapse">
					<form action="" class="navbar-search pull-right">
					<input type="text" class="search-query" placeholder="Search..."/>
					</form>
					<ul class="nav  pull-right">
						<li class="active"><a href="<?php echo base_url();?>">Home</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div> <!-- end nav-bar -->
	<!-- headline section -->
	<div class="hero-unit">
		<center><h2>Chat.ty - Chat System</h2></center>
	</div>
	<!--end headline section -->
	<!-- modal contact us -->
	<div class="modal hide fade" id="modal-contact-form">
		<div class="modal-header">
		<button class="close" data-dismiss="modal">&times;</button>
		<h3>Login</h3>
		</div>
		
		<div class="modal-body">
			<form action="<?php echo base_url();?>login/authenticate" class="form-horizontal" method="POST" id="signinfrm">
				<div class="control-group">
					<label for="login-name" class="control-label">Username :</label>
						<div class="controls">
							<input type="text" id="login-name" class="validate[required] text" name="username" />
						</div>
				</div>
				
				<div class="control-group">
					<label for="login-password" class="control-label">Password :</label>
						<div class="controls">
							<input type="password" id="login-password" class="validate[required] text" name="password"/>
						</div>
				</div>
				
				<div class="control-group">
					<div class="controls">
						<input type="submit" class="btn btn-primary" value="Sign In"/> 
					</div>
				</div>
			</form>
		</div>
		
		<div class="modal-footer">
			<a href="" data-dismiss="modal" class="btn"> Cancel </a>
		</div>
	</div>
	<!-- end modal contact us -->



	<!-- modal register form modal -->
	<div class="modal hide fade" id="modal-register-form">
		<div class="modal-header">
		<button class="close" data-dismiss="modal">&times;</button>
		<h3>Register</h3>
		</div>
		
		<div class="modal-body">
			<form action="<?php echo base_url();?>login/register" enctype="multipart/form-data" class="form-horizontal" method="POST" id="signupfrm">
				<div class="control-group">
					<label for="login-name" class="control-label">Username :</label>
						<div class="controls">
							<input type="text" id="register-username" class="validate[required, ajax[ajaxNameCallPhp]] text" name="username" />
							<span id="emailinfo" ></span>
						</div>
				</div>

				<div class="control-group">
					<label for="login-name" class="control-label">Image :</label>
						<div class="controls">
							<input type="file" id="image" class="validate[ajax[ajaxImageValidate]]" name="image" />
                                                        <p class="text-muted">(Max 500x500 - Format: PNG, GIF, JPEG, JPG)</p>
						</div>
				</div>
				
				<div class="control-group">
					<label for="register-password" class="control-label">Password :</label>
						<div class="controls">
							<input type="password" id="register-password" class="validate[required] text" name="password"/>
						</div>
				</div>
				<div class="control-group">
					<label for="register-cpassword" class="control-label">Confirm Password :</label>
						<div class="controls">
							<input type="password" id="register-cpassword" class="validate[required , equals[register-password]] text" name="cpassword"/>
						</div>
				</div>
				
				<div class="control-group">
					<div class="controls">
						<input type="submit" id="registerButton" class="btn btn-primary" value="Sign Up"/> 
					</div>
				</div>
			</form>
		</div>
		
		<div class="modal-footer">
			<a href="" data-dismiss="modal" class="btn"> Cancel </a>
		</div>
	</div>
	<!-- end modal contact us -->







	<!-- comppany info -->
	<div class="container">
		<section>
		<h3>Hello & Welcome!</h3>
			<div class="row">
				<div class="span6">
                                    <p class="well well-large lead text-left">
                                        <span class="lead text-left">Welcome to Chat.ty! Chat.ty is a hand coded web chat system uses <strong>CodeIgniter</strong> & <strong>JQuery</strong>. Feel free to poke around and test the application. </span><br/>
                                <span class="lead text-left"></span>
                                <table class="table table-bordered table-striped">
						<thead>
							<tr><th>Chat.ty is powered by...</th><th>Links</th></tr>
						</thead>
                                                <tr><td>CodeIgniter</td><td><a href="http://www.codeigniter.com/">Website</a></td></tr>
						<tr><td>JQuery</td><td><a href="http://jquery.com/">Website</a></td></tr>
						<tr><td>MYSQL</td><td><a href="http://www.mysql.com/">Website</a></td></tr>
						<tr><td>AJAX</td><td><a href="http://api.jquery.com/jquery.ajax/">Website</a></td></tr>
						<tr><td>Bootstrap</td><td><a href="http://getbootstrap.com/">Website</a></td></tr>
					</table>
				
				</p>
				</div>
				
				<div class="span6">
				
				<?php echo ($this->session->flashdata('error')) ? '<div class="alert alert-error">'.$this->session->flashdata('error').'</div>' : ''; ?>
				<?php echo ($this->session->flashdata('success')) ? '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>' : ''; ?>
		

				<p class="well well-large lead text-center">
				<span class="lead text-center">To get started Login or Sign Up to get chatting!</span><br/><br/>
					<a href="" data-toggle="modal" data-target="#modal-contact-form" class="btn btn-large btn-success">Login</a>
					<a href="" data-toggle="modal" data-target="#modal-register-form" class="btn btn-large btn-info">Register</a>
				
				</p>
				</div>
			</div>
		</section>
		
		
		<hr/>
		
		<!-- FOOTER -->
		<section>
			<p class="lead text-center">Advanced Server-side Languages - Online (<a href="http://www.fullsail.edu/">Full Sail University</a>)</p>
			<hr/>
			<ul class="inline text-center">
			<li><strong>FOLLOW ME: </strong></li>
			<li><a href="https://twitter.com/jamesdlavender">Twitter</a></li>
			<li><a href="https://www.facebook.com/jamesdlavender">Facebook</a></li>
			<li><a href="http://linkedin.com/pub/james-lavender/a2/a7/655/en">Linkedin</a></li>
			</ul>
			<p class="text-center muted">&copy; Copyright 2015 By. James Lavender</p>
		</section>
		
	</div>
		
	<!-- Javascript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/validationEngine/css/validationEngine.jquery.css" type="text/css"/>
	<script src="<?php echo base_url();?>assets/validationEngine/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo base_url();?>assets/validationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
	$(document).ready(function(){
	  $("#signinfrm").validationEngine();
	  $("#signupfrm").validationEngine();

}); 
	</script>
	</body>
</html>
	