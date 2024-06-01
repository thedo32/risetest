
	<title>Login Page</title>
</head>
<body>		
<h2>Login Page</h2>
		 <a href="<?php echo base_url(''); ?>">Home</a>
		 <a href="<?php echo base_url('register/add'); ?>">Register</a>

		<!-- notification if login error -->
		<?php if ($this->session->flashdata('error')): ?>
			<p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
		<?php endif; 

		if ($this->session->tempdata('email_sent')): ?>
					<p style="color: green;"><?php echo $this->session->tempdata('email_sent'); ?></p>
		<?php elseif ($this->session->tempdata('email_failed')): ?>
					<p style="color: green;"><?php echo $this->session->tempdata('email_failed'); ?></p>
		<?php endif; ?>
    
	
		<form action="<?php echo base_url('login/actionlogin'); ?>" method="post">

			<table>

				<tr>

					<td>Username</td>

					<td><input type="text" name="username"></td>

				</tr>

				<tr>

					<td>Password</td>

					<td><input type="password" name="password"></td>

				</tr>

				<tr>

					<td></td>

					<td><input type="submit" value="Login"></td>

				</tr>

				

			</table>

		</form>
		<br/>

		
		

		



