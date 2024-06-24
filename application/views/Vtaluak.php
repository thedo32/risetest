   
	
</head>

<body class="bg-body">
	<div class=fix-navbar>
		<div class=shadowboxmin><h5>Kupi Batigo Taluak Buo</h5></div> 
		<a alt="News Page" href="<?php echo base_url('');?>"><img src="/storage/app/public/images/logo/logo.png" width = "128" height = "55"></a>
		<div class=fix-menu>
			<nav class="navbar-expand-md navbar-light">
		  	<button class=" table navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
            </button>
     
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="text-center navbar-nav mr-auto">
			<?php if ($this->session->userdata("name") === Null):?>
				<li class="nav-item">
					<a href="<?php echo base_url(''); ?>" >Menara</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('taluak'); ?>" >Taluak Buo</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('login'); ?>">Login</a>	
				</li>	
			<?php elseif ($this->session->userdata("name") === 'Alpha'):?>
				<li class="nav-item">
					<a href="<?php echo base_url(''); ?>">Menara</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('taluak'); ?>" >Taluak Buo</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('home'); ?>">Dashboard</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('register'); ?>">User Dashboard</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('register/add'); ?>">Add User</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('news/add'); ?>">Add News</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
				</li>
			<?php else: ?>
				<li class="nav-item">
					<a href="<?php echo base_url(''); ?>">Menara</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('taluak'); ?>" >Taluak Buo</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('home'); ?>">Dashboard</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('news/add'); ?>">Add News</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
				</li>
			<?php endif; ?>
			</div>
			</nav>
		</div>
	</div> 

	<?php
		  $this->load->view('side_post');
	?>
	 
 
	<table class=read-table>
		<tbody>
				<tr>
					<td><h5><?php echo set_value('title', $taluak->title); ?></h5></div></td>
				</tr>
				<tr>
					<td><?php echo htmlspecialchars_decode(set_value('text', $taluak->text)); ?></td>
				</tr>
		</tbody>
	</table>	
		



