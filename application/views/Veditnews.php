    <h2>Edit News</h2>

    <!-- Display validation errors -->
    <?php echo validation_errors(); ?>

	<?php if ($this->session->userdata("name") === Null):
			redirect(base_url(''));	
	elseif ($this->session->userdata("name") === 'Alpha'):?>
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

    <!-- form action style for editing a user -->
    <form action="<?php echo base_url('news/edit/' . $news->id); ?>" method="post">
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" value="<?php echo set_value('title', $news->title); ?>"></td>
            </tr>
            <tr>
                <td>Text</td>
                <td><textarea name="text"><?php echo set_value('text', $news->text); ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Save Edit"></td>
            </tr>
        </table>
    </form>
	
</body>
</html>
