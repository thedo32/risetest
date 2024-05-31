
<?php 	
	$this->load->view('view_header');?>
         
		<title>User Dashboard</title>

</head>

<body>
				

                <h1>You're Logged in' !</h1>

                <h4>Welcome, <?php echo $this->session->userdata("name"); ?></h4>
				
				<?php if ($this->session->userdata("name") === 'Alpha'):?>
					<a href="<?php echo base_url(''); ?>">Home</a>
					<a href="<?php echo base_url('register'); ?>">User Dashboard</a>
					<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
				<?php else: ?>
					<a href="<?php echo base_url(''); ?>">Home</a>
					<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
                <?php endif; 

	$this->load->view('view_footer');
?>
