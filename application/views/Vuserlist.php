
    <title>User Dashboard</title>
</head>
<body>
    <h1>User List</h1>
	 <?php echo validation_errors(); ?>

	<!-- notification if add user success-->
		<?php if ($this->session->flashdata('category_success')): ?>
			<p style="color: red;"><?php echo $this->session->flashdata('category_success'); ?></p>
		<?php endif; ?>
    

	<?php if ($this->session->userdata("name") === 'Alpha'):?>
		<h6>You're Logged in' !, Admin</h6>
		<a href="<?php echo base_url(''); ?>">Home</a>
		<a href="<?php echo base_url('home'); ?>">Dashboard</a>
		<a href="<?php echo base_url('register/add'); ?>">Add User</a>
		<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
	<?php else: 
		redirect(base_url(''));	
	endif; ?>

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
	
