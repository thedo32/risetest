
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
		<div class=shadowbox><h5>Kupi Batigo Taluak Buo</h5></div> 
        <a alt="Menara" href="<?php echo base_url('');?>"><img src="/storage/app/public/images/logo/logo.png" width = "110" height = "60"></a>
		<div class=logged-in>
		<?php if ($this->session->userdata("name") === 'Alpha' ):?>
				You're Logged in' <a href="<?php echo base_url('home'); ?>" class=h8>Admin</a>
				<a href="<?php echo base_url('login/logout'); ?>"class=h8>Logout</a>
		<?php elseif ($this->session->userdata("name") != Null ):?>
				You're Logged in' <a href="<?php echo base_url('home'); ?>" class=h8><?php echo $this->session->userdata("name"); ?></a>
				<a href="<?php echo base_url('login/logout'); ?>"class=h8>Logout</a>
		<?php else:?> 
				<a href="<?php echo base_url('login'); ?>"class=h7>Login</a>	
		<?php endif; ?>	
		</div>

			
		<div class=fix-menu>
			<nav class="navbar-expand-lg navbar-light">
		  	<button class=" table navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
            </button>
     
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="text-center navbar-nav mr-auto">
			<?php if ($this->session->userdata("name") === Null):?>
				<li class="nav-item">
					<a href="<?php echo base_url(''); ?>" >Menara</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('taluak'); ?>" >Taluak Buo</a>
				</li>
			<?php elseif ($this->session->userdata("name") === 'Alpha'):?>
				<li class="nav-item">
					<a href="<?php echo base_url(''); ?>">Menara</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('taluak'); ?>" >Taluak Buo</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('home'); ?>">Dashboard</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('register'); ?>">User Dashboard</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('register/add'); ?>">Add User</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('news/add'); ?>">Add News</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
				</li>
			<?php else: ?>
				<li class="nav-item">
					<a href="<?php echo base_url(''); ?>">Menara</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('taluak'); ?>" >Taluak Buo</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('home'); ?>">Dashboard</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('news/add'); ?>">Add News</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
				</li>
			<?php endif; ?>
			</div>
			</nav>
		</div>
	</div>

	


	<?php $this->load->view("header_slider");
		  //$this->load->view('side_post');
	?>

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
                        <?php if (is_array($taluak)): ?>
                        <?php foreach ($taluak as $taluak_list): ?>
                        <tr>
                            <td>
                               <a href="<?php echo site_url('taluak/view/' . $taluak_list['slug']); ?>"><?php echo $taluak_list['title']; ?></a>
                            </td>
                            <td><?php echo character_limiter($taluak_list['text'],30); ?></td>
                            <td>
                                <a href="<?php echo site_url('news/edit/' . $taluak_list['id']); ?>">Edit</a><p>
                                <a href="<?php echo site_url('news/delete/' . $taluak_list['id']); ?>" onclick="return confirm('Are you sure you want to delete this news?');">Delete</a>
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
                        <?php if (is_array($taluak)): ?>
                        <tr>
							 <?php foreach ($taluak as $index => $taluak_list): ?>
								<td>
									<div class="newsbox">
										 <div class="sm-title"><a href="<?php echo site_url('taluak/view/' . $taluak_list['slug']); ?>" title="<?php echo $taluak_list['title']; ?>"><?php echo $taluak_list['title']; ?></a></div><p>
										 <a href="<?php echo site_url('taluak/view/' . $taluak_list['slug']); ?>" data-toggle="tooltip" title="<?php echo $taluak_list['title']; ?>"><img src= "<?php echo base_url("storage/app/public/images/logo/logo.png");?>" height="50" width="65" class=news-imgthumb ></a>
										 <p><?php echo character_limiter($taluak_list['text'], 20); ?>
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
    <?php echo $this->pagination->create_links(); 
			   $this->load->view('image_slider');
	?>
	<br>
	<div class=slideshow-container-art>
		<div class=articlebox>		
		<center>Tetang Desa Wisata Teluk Buo:</center><br> 
		Merupakan desa yang berlokasi Kelurahan Teluk Kabung Tengah, Kecamatan Bungus Teluk Kabung, Kota Padang.<br> 
		Desa Wisata Teluk Buo ini memiliki luas area 25,64 km2.<br> 
		Jarak Desa Wisata Teluk Buo dari kantor kelurahan ke kantor kecamatan adalah 3 kilometer, ke balai kota adalah 30 kilometer, ke kantor gubernur 25 kilometer.<br>
		Desa Wisata Teluk Buo terkenal sebagai kawasan objek wisata bahari karena memiliki teluk indah, pantai berpasir putih, dan hutan Mangrove yang eksotis untuk dijelajahi.<br>
		Masyarakat Teluk Buo umumnya berprofesi sebagai nelayan dan berkebun. Pantai Teluk Buo ini memiliki keindahan yang dapat membuat berdecak kagum.<br> 
		Perpaduan pasir putih dan hijau hutan mangrove begitu sempurna, menjadi daya tarik untuk dikunjungi wisatawan.<br> 
		Kawasan objek wisata bahari yang menawan ini berada tersembunyi di balik batu karang Teluk Buo.<br>
		Keberagaman hutan mangrove di Desa Wisata Teluk Buo menjadi potensi daya tarik wisata yang dapat dikembangkan sebagai Ekowisata Mangrove Teluk Buo. <br>
		Hutan Mangrove ini cukup   luas   dan padat sekitar 10 hektar. Jenis mangrove yang terdapat   dilokasi   ini   adalah; Rhizophora apiculata, Sonner atia alba, Avicenia cornicullatum,  Bruguiera  gymnorrhiza  dan Xylocarpus granatum.<br>
		Desa Wisata Teluk Buo memiliki pemandangan aktivitas nelayan yang menarik untuk disaksikan, seperti terdapat sejumlah kapal nelayan berada di dekat keramba ikan Teluk Buo.<br> 
		Hal itu semua menjadi daya tarik Desa Wisata Teluk Buo untuk dikunjungi oleh para wisatawan. keindahan alam laut dan hutan mangrove serta kehidupan masyarakat pesisir pantai
		pantai yang berada di kawasan teluk buo sangat cocok untuk wisatawan untuk mandi snorkeling dan memancing serta menikmati keindahan serta makanan khas. 
	</div>
</div>
<?php $this->load->view('post_container');?>




	
