	
		<title>News Page</title>

		
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
    <h2>News Page</h2>
	 <?php echo validation_errors(); ?>
	<?php if ($this->session->userdata("name") !== Null ):?>
           <h6>You're Logged in' !, <?php echo $this->session->userdata("name"); ?></h6>
	<?php endif; ?>
	
	<!-- notification if add or edit news success-->
		<?php if ($this->session->tempdata('add_success')): ?>
			<p id="addeditSuccessMessage" style="color: green;"><?php echo $this->session->tempdata('add_success'); ?></p>
		<?php elseif ($this->session->tempdata('edit_success')): ?>
			<p id="addeditSuccessMessage" style="color: green;"><?php echo $this->session->tempdata('edit_success'); ?></p>
		<?php endif; ?>
				

	<?php if ($this->session->userdata("name") === Null):?>
		<a href="<?php echo base_url(''); ?>">Home</a>
		<a href="<?php echo base_url('login'); ?>">Login</a>
	<?php elseif ($this->session->userdata("name") === 'Alpha'):?>
		<a href="<?php echo base_url(''); ?>">Home</a>
		<a href="<?php echo base_url('home'); ?>">Dashboard</a>
		<a href="<?php echo base_url('register'); ?>">User Dashboard</a>
		<a href="<?php echo base_url('register/add'); ?>">Add User</a>
		<a href="<?php echo base_url('news/add'); ?>">Add News</a>
		<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
	<?php else: ?>
		<a href="<?php echo base_url(''); ?>">Home</a>
		<a href="<?php echo base_url('home'); ?>">Dashboard</a>
		<a href="<?php echo base_url('news/add'); ?>">Add News</a>
		<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
	<?php endif; ?>

	<?php if ($this->session->userdata("name") === 'Alpha'):?>	
    <table border="1">
	    <thead>
		    <tr>
                <th>Slug</th>
                <th>Title</th>
                <th>Text</th>
				<th>Actions</th>
			</tr>
        </thead>
        <tbody>
			<?php if (is_array($news)): ?>
            <?php foreach ($news as $news_list): ?>
                <tr>
					<td><p><a href="<?php echo site_url('news/view/' . $news_list['slug']); ?>"><?php echo $news_list['slug'];?></a></p></td>
                    <td><p><?php echo $news_list['title']; ?></p></td>
					<td><?php echo character_limiter($news_list['text'],40); ?></td>
					<td>
						<a href="<?php echo site_url('news/edit/' . $news_list['id']); ?>">Edit</a>
						<p><a href="<?php echo site_url('news/delete/' . $news_list['id']); ?>" onclick="return confirm('Are you sure you want to delete this news?');">Delete</a></p>
					</td>
				</tr>
            <?php endforeach; ?>
			<?php else: ?>
				<tr>
				<td colspan="4">No news available.</td>
				</tr>
			<?php endif; ?>
        </tbody>
	</table>
   	<?php else: ?>
	 <table border="1"> 
		<thead>
		    <tr>
                <th>Title</th>
                <th>Text</th>
			</tr>
        </thead>
        <tbody>
			<?php if (is_array($news)): ?>
            <?php foreach ($news as $news_list): ?>
                <tr>
					<td><p><a href="<?php echo site_url('news/view/' . $news_list['slug']); ?>"><?php echo $news_list['title'];?></a></p></td>
                    <td><?php echo character_limiter($news_list['text'],40); ?></td>
				</tr>
            <?php endforeach; ?>
			<?php else: ?>
				<tr>
				<td colspan="4">No news available.</td>
				</tr>
			<?php endif; ?>
	    </tbody>
	</table>
	<?php endif; ?>
    <br>
    <?php echo $this->pagination->create_links(); ?>
    <br>
	
