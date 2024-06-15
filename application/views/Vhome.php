
<?php 	
	$this->load->view('view_header');?>
         
</head>

<body class="bg-body">
	<div class=fix-navbar>
		<a alt="News Page" href="<?php echo base_url('');?>"><img src="/storage/app/public/images/logo/logo.png" width = "128" height = "55"></a>
		<div class=fix-menu>
			<?php if ($this->session->userdata("name") === 'Alpha'):?>
				<a href="<?php echo base_url(''); ?>">Home</a>
				<a href="<?php echo base_url('register'); ?>">User Dashboard</a>
				<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
			<?php else: ?>
				<a href="<?php echo base_url(''); ?>">Home</a>
				<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
			<?php endif;?>
		</div>
	</div>
	<div class=shadowboxmin><h1>You're Logged in'</h1></div>
	
	<div class = home-table>
	<?php if ($this->session->userdata("name") === 'Alpha' ):?>
			<h6>Welcome <a href="<?php echo base_url('home'); ?>">Admin</a></h6>
	<?php elseif ($this->session->userdata("name") != Null ):?>
			<h6>Welcome <a href="<?php echo base_url('home'); ?>"><?php echo $this->session->userdata("name"); ?></a></h6>
	<?php endif; ?>

	<?php 
		$this->load->view('welcome_message');?>
	</div>	
	<?php $this->load->view('view_footer');
	?>
	
