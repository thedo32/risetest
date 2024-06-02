
<?php 	
	$this->load->view('view_header');?>
         

</head>

<body class="bg-body">
	<div class=fix-navbar>
		<h2>You're Logged in' !</h2>
		<?php if ($this->session->userdata("name") === 'Alpha'):?>
			<a href="<?php echo base_url(''); ?>">Home</a>
			<a href="<?php echo base_url('register'); ?>">User Dashboard</a>
			<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
		<?php else: ?>
			<a href="<?php echo base_url(''); ?>">Home</a>
			<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
        <?php endif;?>
	</div>

	<div class= "shadowbox">
        <?php if ($this->session->userdata("name") === 'Alpha' ):?>
           <h6>Welcome <a href="<?php echo base_url('home'); ?>">Admin</h6>
		<?php elseif ($this->session->userdata("name") != Null ):?>
		   <h6>Welcome <a href="<?php echo base_url('home'); ?>"><?php echo $this->session->userdata("name"); ?></h6>
		<?php endif; ?>
	</div>	
				
				

	<?php $this->load->view('view_footer');
?>
