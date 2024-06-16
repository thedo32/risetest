
<!-- slider dari BarajaCoding -->

<div class="slideshow-container-img">	
	<div class="mySlidesImg fade">
		Semburatnya nan jingga Berkelumat dengan hitam<p> 
		Membaur dengan gelap Lenyap bersama 
		<img src= "<?php echo base_url ("/storage/app/public/images/slider/taluakbuo1.png");?>" style="width:80%">
	</div>

	<div class="mySlidesImg fade">
		Kulepaskan pandanganku Jauh ke Ujung lautan<p> 
		ke Ujung pelangi Betapa luas alam semesta
		<img src= "<?php echo base_url ("/storage/app/public/images/slider/taluakbuo2.png");?>" style="width:80%">
	</div>

	<div class="mySlidesImg fade">
		Deru ombak menghantam bebatuan Bisikan angin memecahkan suasana pilu<p> 
		Terlebih lagi ada cahaya indah di hadapan
		<img src= "<?php echo base_url ("/storage/app/public/images/slider/taluakbuo3.png");?>" style="width:80%">
	</div>

	<div class="mySlidesImg fade">
		Mendengar suara deburan ombak jiwa yang lelah tidur nyenyak<p> 
		Aku dengar nyanyian alam sungguh indah sangat menawan
		<img src= "<?php echo base_url ("/storage/app/public/images/slider/taluakbuo4.png");?>" style="width:80%">
	</div>
</div>

<script>
	var slideImgIndex = 0;
	showSlidesImg();

	function showSlidesImg() {
		var i;
		var slides = document.getElementsByClassName("mySlidesImg");
		var dots = document.getElementsByClassName("dot");
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
		}
		slideImgIndex++;
		if (slideImgIndex > slides.length) {slideImgIndex = 1}    
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace("active", "");
		}
		slides[slideImgIndex-1].style.display = "block";  
		setTimeout(showSlidesImg, 10000); // Change image every 4 seconds
	}
</script>

<!-- end of slider dari BarajaCoding -->
