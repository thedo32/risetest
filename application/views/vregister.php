

</head>
<body="bg-body">
   <?php echo validation_errors(); ?>

	 <div class=fix-navbar>
		<div class=shadowbox><h3>User Registration</h3></div> 

		<a alt="Login Page" href="<?php echo base_url('');?>"><img src="/storage/app/public/images/logo/logo.png" class=image-logo></a>
      	<div class=logged-in>
		<?php if ($this->session->userdata("name") === 'Alpha' ):?>
				  <a href="<?php echo base_url('home'); ?>" class=h8>Admin</a><br>
				<a href="<?php echo base_url('login/logout'); ?>"class=h8>Logout</a>
		<?php else:?> 
				<a href="<?php echo base_url('login'); ?>"class=h7>Login</a>
		<?php endif; ?>	
		</div>
					

		  <div class=fix-menu>
			<nav class="navbar-expand-lg navbar-light">
		  	<button class=" table navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
            </button>
     
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="text-center navbar-nav mr-auto">
			<?php if ($this->session->userdata("name") !== 'Alpha'):?>
				<li class="nav-item">
					<a href="<?php echo base_url('home'); ?>">Home</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('padang'); ?>" >Kafe</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('taluak'); ?>" >Wisata</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('painan'); ?>" >Creative Space</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('Login'); ?>">Login</a>
				</li>
			<?php else:?>
				<li class="nav-item">
					<a href="<?php echo base_url('padang'); ?>" >Kafe</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('taluak'); ?>" >Wisata</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('painan'); ?>" >Creative Space</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('register'); ?>">User Dashboard</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('register/add'); ?>">Add User</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('news/add/news'); ?>">Add News</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
				</li>
			<?php endif; ?>
			</ul>
			</div>
			</nav>
		</div>
	</div>



	 <form action="<?php echo base_url('register/add'); ?>" method="post">
        <table class=login-table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo set_value('username'); ?>" size="20" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" /></td>
            </tr>
			 <tr>
                <td>Handphone</td>
                <td><input type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" size="25" /></td>
            </tr>
			 <tr>
                <td>Alamat</td>
                <td><input type="text" name="address" value="<?php echo set_value('address'); ?>" size="100" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" /></td>
            </tr>
			<tr>
                <td>Confirm Password</td>
                <td><input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Add User"></td>
		    </tr>
        </table>
    </form>

	    <br>

<script>

	// for expand and collapse below navbar
	shiftBelowLTable();

</script>
	