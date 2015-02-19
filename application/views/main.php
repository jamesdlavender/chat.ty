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
				<a href="#" class="brand">Welcome <?php echo $this->session->userdata('username');?></a>
					<a data-toggle="collapse" data-target=".nav-collapse" class="btn btn-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</a>
				<div class="collapse nav-collapse">
					
					<ul class="nav  pull-right">
						<li class="active"><a href="<?php echo base_url();?>login/logout">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div> <!-- end nav-bar -->
	
	<div class="container-fluid">
      <div class="row-fluid">	  
	  
        <div class="span12">
          <div class="hero-unit">
            <h2>Chat.ty - Chat System</h2>
            <p><a href="#" class="btn btn-primary btn-large">Button</a></p>
          </div>
         
          <div class="row-fluid">
            <div class="span6">
              <h3 style="color:#6541a5">Features</h3>
            <p class="well well-large lead text-left">
                - Uses CodeIgniter framework which is more secure and robust.</br>
		- Uses JQuery Ajax.</br>
		- Allows multiple chatting, P2P.</br>
		- Has minimize and close chat box buttons.</br>
		- Displays notifications by changing colors.</br>
		- Displays Sent time after 3 minutes of inactivity.</br>
		- Login & Register Forms.</br>
                - Auto-resize of text input box.</br>
            </p>
            </div><!--/span-->
            <div class="span6">
            <h3 style="color:#6541a5">How To Chat</h3>
		<p class="well well-large lead text-left">
                    - Use the <strong>Open Chat</strong> button to get started. You can see a list of registered users via the Users List once you click the button.</br></br>
                
                - Click a user and start chatting! The user will then be able to log in and view your message you sent them.</br></br> 
                
                - <strong>Enjoy!</strong>
            </p>
		   </div>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

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
	
	<div id="users" class="users" valign="bottom">
		<div class="headerchat">&nbsp;Online Users</div>
		<div id="onlineusers" class="chat"></div>
	</div>

	<div id="chat-area" class="messages" valign="bottom">
		<div id="chatmessage" class="chat"></div>
		<div align="center">
			<form id="newmessageform" name="newmessageform">
			<input type="text" maxlength="75" class="formchattext" name="message" id="message" />
			</form>
		</div>
	</div>

 <div id="chat-bar" class="fixed-position">
	 <div id="chat-bar-frame">
		 <div id="chat-bar-content">
		 <a id="chat-btn" href="#" class="btn-primary btn-large">Open Chat</a>
		 <div id="newmessage" class="newmessage"></div>
		 
		 </div>
	 </div>
 </div>
 
	<!-- Javascript -->
	<script type="text/javascript">var base = "<?=base_url();?>";</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/chatigniter.js"></script>
	</body>
</html>
	