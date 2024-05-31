    <title>News View</title>
	
</head>
<body>
    <h1>News</h1>
    <?php echo validation_errors(); ?>
	<?php if ($this->session->userdata("name") === Null):?>
		<a href="<?php echo base_url(''); ?>">Home</a>
		<a href="<?php echo base_url('login'); ?>">Login</a>
	<?php elseif ($this->session->userdata("name") === 'Alpha'):?>
		<a href="<?php echo base_url(''); ?>">Home</a>
		<a href="<?php echo base_url('home'); ?>">Dashboard</a>
		<a href="<?php echo base_url('register/add'); ?>">Add User</a>
		<a href="<?php echo base_url('news/add'); ?>">Add News</a>
		<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
	<?php else: ?>
		<a href="<?php echo base_url(''); ?>">Home</a>
		<a href="<?php echo base_url('home'); ?>">Dashboard</a>
		<a href="<?php echo base_url('news/add'); ?>">Add News</a>
		<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
	<?php endif; ?>

        <table>
            <tr>
                <td><div ><?php echo set_value('title', $news->title); ?></div></td>
            </tr>
            <tr>
                <td><div class="textarea"><?php echo htmlspecialchars_decode(set_value('text', $news->text)); ?></div></td>
            </tr>
        </table>

