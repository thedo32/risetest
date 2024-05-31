    <h1>Add News</h1>
    <?php echo validation_errors(); ?>

	

	<?php if ($this->session->userdata("name") === Null):
			redirect(base_url(''));	
	elseif ($this->session->userdata("name") === 'Alpha'):?>
		<h6>You're Logged in' !, Admin</h6>
		<a href="<?php echo base_url(''); ?>">Home</a>
		<a href="<?php echo base_url('home'); ?>">Dashboard</a>
		<a href="<?php echo base_url('register/add'); ?>">Add User</a>
		<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
	<?php else: ?>
		<h6>You're Logged in' !, <?php echo $this->session->userdata("name"); ?></h6>
		<a href="<?php echo base_url(''); ?>">Home</a>
		<a href="<?php echo base_url('home'); ?>">Dashboard</a>
		<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
	<?php endif; ?>


    <form action="<?php echo base_url('news/add'); ?>" method="post">
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" value="<?php echo set_value('title'); ?>"></td>
            </tr>
            <tr>
                <td>Text</td>
                <td><textarea name="text" value="<?php echo set_value('text'); ?>"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Add News"></td>
            </tr>
        </table>
    </form>
	
