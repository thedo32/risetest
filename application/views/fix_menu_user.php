<div class=fix-menu>
			<?php echo validation_errors(); ?>

			<nav class="navbar-expand-lg navbar-light">
		  	<button class=" table navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
            </button>


			 <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="text-center navbar-nav mr-auto">
			<?php if ($this->session->userdata("name") === 'Alpha'):?>
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
			<?php else: 
				redirect(base_url(''));	
			endif; ?>
			</ul>
			</div>
			</nav>
		</div>

