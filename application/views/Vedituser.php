 
</head>  
<body class="bg-body">
    <h1>Edit User</h1>

    <!-- Display validation errors -->
    <?php echo validation_errors(); ?>

	<?php if ($this->session->userdata("name") === 'Alpha'):?>
		<h6>You're Logged in' !, Admin</h6>
		<a href="<?php echo base_url(''); ?>">Home</a>
		<a href="<?php echo base_url('home'); ?>">Dashboard</a>
		<a href="<?php echo base_url('register'); ?>">User Dashboard</a>
		<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
	<?php else: 
		redirect(base_url(''));	
	endif; ?>


    <!-- form action style for editing a user -->
    <form action="<?php echo base_url('register/edit/' . $user->id); ?>" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo set_value('username', $user->username); ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo set_value('email', $user->email); ?>"></td>
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
                <td><input type="submit" value="Save Edit"></td>
            </tr>
        </table>
    </form>
	
