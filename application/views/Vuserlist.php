	
	<!-- script for temporary notification -->
		<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> 
		<script>
			$(document).ready(function() {
				// Delay in milliseconds (e.g., 8000 ms = 8 seconds)
				var delay = 8000;

				// Hide the message after the delay
				setTimeout(function() {
					$('#addeditSuccessMessage').fadeOut(5000, function() {
						$(this).remove();
					});
				}, delay);
			});
		</script>
    

</head>
<body>
    <div class=fix-navbar>
        <a alt="News Page" href="<?php echo base_url('');?>"><img src="/storage/app/public/images/logo/logo.gif" width = "128" height = "55"></a>
		<div class=fix-menu>
			<?php echo validation_errors(); ?>
			<?php if ($this->session->userdata("name") === 'Alpha'):?>
				<h6>You're Logged in' !, Admin</h6>
				<a href="<?php echo base_url(''); ?>">Home</a>
				<a href="<?php echo base_url('home'); ?>">Dashboard</a>
				<a href="<?php echo base_url('register/add'); ?>">Add User</a>
				<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
			<?php else: 
				redirect(base_url(''));	
			endif; ?>
		</div>
	</div>
	<div class=shadowbox><h4>User List</h4></div>

		<!-- notification if add or edit user success-->
		<?php if ($this->session->tempdata('add_success')): ?>
			<p id="addeditSuccessMessage" style="color: green;"><?php echo $this->session->tempdata('add_success'); ?></p>
		<?php elseif ($this->session->tempdata('edit_success')): ?>
			<p id="addeditSuccessMessage" style="color: green;"><?php echo $this->session->tempdata('edit_success'); ?></p>
		<?php endif; ?>

		<?php if ($this->session->tempdata('email_sent')): ?>
			<p id="addeditSuccessMessage" style="color: green;"><?php echo $this->session->tempdata('email_sent'); ?></p>
		<?php elseif ($this->session->tempdata('email_failed')): ?>
			<p id="addeditSuccessMessage" style="color: green;"><?php echo $this->session->tempdata('email_failed'); ?></p>
		<?php endif; ?>
    

	
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <a href="<?php echo site_url('register/edit/' . $user['id']); ?>">Edit</a>
                        <a href="<?php echo site_url('register/delete/' . $user['id']); ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <?php echo $this->pagination->create_links(); ?>
    <br>
	
