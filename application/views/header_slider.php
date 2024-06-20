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
</div>

<script>
	var slideIndex = 0;
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
		setTimeout(showSlides, 9000); // Change image every 9 seconds
	}
</script>

<!-- end of slider dari BarajaCoding -->
