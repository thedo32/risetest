
    <title>Add User</title>
</head>
<body>
    <h1>Add User</h1>
    <?php echo validation_errors(); ?>

	<a href="<?php echo base_url(''); ?>">Home</a>
	<a href="<?php echo base_url('login'); ?>">Login</a>
	 <form action="<?php echo base_url('register/add'); ?>" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo set_value('username'); ?>" size="20" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo set_value('email'); ?>" size="30" /></td>
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
	
