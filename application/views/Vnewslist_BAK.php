
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

<body class="bg-body">
	<?php echo validation_errors(); ?>
    <div class=fix-navbar>
        <a alt="News Page" href="<?php echo base_url('');?>"><img src="/storage/app/public/images/logo/logo.gif" width = "128" height = "55"></a>
		<div class=fix-menu>
			<?php if ($this->session->userdata("name") === 'Alpha' ):?>
				<h6>You're Logged in' <a href="<?php echo base_url('home'); ?>">Admin</a></h6>
			<?php elseif ($this->session->userdata("name") != Null ):?>
				<h6>You're Logged in' <a href="<?php echo base_url('home'); ?>"><?php echo $this->session->userdata("name"); ?></a></h6>
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
		</div>
	</div>
	<div class=shadowbox><h4>News Page</h4></div> 
	   
	
	<!-- notification if add or edit news success-->
    <?php if ($this->session->tempdata('add_success')): ?>
    <p id="addeditSuccessMessage" style="color: green;"><?php echo $this->session->tempdata('add_success'); ?></p>
    <?php elseif ($this->session->tempdata('edit_success')): ?>
    <p id="addeditSuccessMessage" style="color: green;"><?php echo $this->session->tempdata('edit_success'); ?></p>
    <?php endif; ?>

   <div class=container>
        <div class=row>
            <div class=table-responsive>
				<?php if ($this->session->userdata("name") === 'Alpha'):?>

                <table class=table>
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
                            <td>
                                <p><a href="<?php echo site_url('news/view/' . $news_list['slug']); ?>"><?php echo $news_list['slug'];?></a></p>
                            </td>
                            <td>
                                <p><?php echo $news_list['title']; ?></p>
                            </td>
                            <td><?php echo character_limiter($news_list['text'],40); ?></td>
                            <td>
                                <a href="<?php echo site_url('news/edit/' . $news_list['id']); ?>">Edit</a>
                                <a href="<?php echo site_url('news/delete/' . $news_list['id']); ?>" onclick="return confirm('Are you sure you want to delete this news?');">Delete</a>
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

                <table class="table">
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
                            <td>
                                <p><a href="<?php echo site_url('news/view/' . $news_list['slug']); ?>"><?php echo $news_list['title'];?></a></p>
                            </td>
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
            </div>
        </div>
    </div>


    <br>
    <?php echo $this->pagination->create_links(); ?>
    <br>
