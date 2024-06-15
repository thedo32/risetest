
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
        <a alt="News Page" href="<?php echo base_url('');?>"><img src="/storage/app/public/images/logo/logo.png" width = "110" height = "60"></a>
		<div class=logged-in>
		<?php if ($this->session->userdata("name") === 'Alpha' ):?>
				You're Logged in' <a href="<?php echo base_url('home'); ?>" class=h7>Admin</a>
		<?php elseif ($this->session->userdata("name") != Null ):?>
				<h6>You're Logged in' <a href="<?php echo base_url('home'); ?>"><?php echo $this->session->userdata("name"); ?></a></h6>
		<?php endif; ?>	
		</div>
		
		<div class=fix-menu>
			<?php if ($this->session->userdata("name") === Null):?>
				<a href="<?php echo base_url(''); ?>" >Home</a>
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
	<div class=shadowboxmin><h1>Desa Wisata</h1></div> 

<!-- slider dari BarajaCoding -->

<div class="slideshow-container">	
	<div class="mySlides fade">
		<img src= "<?php echo base_url ("/storage/app/public/images/slider/1.png");?>" style="width:80%">
		<!-- < <div class="text">Caption One</div> --> 
	</div>

	<div class="mySlides fade">
		<img src= "<?php echo base_url ("/storage/app/public/images/slider/2.png");?>" style="width:80%">
		<!-- <div class="text">Caption Two</div> -->
	</div>

	<div class="mySlides fade">
		<img src= "<?php echo base_url ("/storage/app/public/images/slider/3.png");?>" style="width:80%">
		<!-- <div class="text">Caption Three</div> -->
	</div>

	<div class="mySlides fade">
		<img src= "<?php echo base_url ("/storage/app/public/images/slider/4.png");?>" style="width:80%">
		<!-- <div class="text">Caption Fours</div> -->
	</div>
</div>

<script>
	var slideIndex = 1;
	showSlides();

	function showSlides() {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
		}
		slideIndex++;
		if (slideIndex > slides.length) {slideIndex = 1}    
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace("active", "");
		}
		slides[slideIndex-1].style.display = "block";  
		setTimeout(showSlides, 10000); // Change image every 4 seconds
	}
</script>

<!-- end of slider dari BarajaCoding -->
 
	<div class=side-post-container-1>
		<img src= "<?php echo base_url("storage/app/public/images/logo/desa_wisata.png");?>" height="180" width="180">
	</div>
	<div class=side-post-container-2>
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d498.6407428353693!2d100.38496897942254!3d-1.0674286968005176!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4a57a23103a87%3A0x7034718ca6f2dd15!2sDesa%20Wisata%20Teluk%20Buo!5e0!3m2!1sen!2sid!4v1718351009418!5m2!1sen!2sid" width="185" height="185" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
		

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

                <table class=admin-table>
                    <thead>
                        <tr>
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
                               <a href="<?php echo site_url('news/view/' . $news_list['slug']); ?>"><?php echo $news_list['title']; ?></a>
                            </td>
                            <td><?php echo character_limiter($news_list['text'],30); ?></td>
                            <td>
                                <a href="<?php echo site_url('news/edit/' . $news_list['id']); ?>">Edit</a><p>
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

                <table class="news-table">
                    <tbody>					  
                        <?php if (is_array($news)): ?>
                        <tr>
							 <?php foreach ($news as $index => $news_list): ?>
								<td>
									<div class="newsbox">
										 <a href="<?php echo site_url('news/view/' . $news_list['slug']); ?>" data-toggle="tooltip" title="<?php echo $news_list['title']; ?>"><?php echo ellipsize($news_list['title'], 30); ?></a><p>
										 <a href="<?php echo site_url('news/view/' . $news_list['slug']); ?>" data-toggle="tooltip" title="<?php echo $news_list['title']; ?>"><img src= "<?php echo base_url("storage/app/public/images/logo/logo.png");?>" height="50" width="65" class=news-imgthumb ></a>
										 <p><?php echo character_limiter($news_list['text'], 20); ?>
									</div>
									
								</td>
								<?php if ($index % 2 != 0): ?>
									</tr><tr>
								<?php endif; ?>
							<?php endforeach; ?>
						</tr>
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
