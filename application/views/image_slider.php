<!-- slider dari BarajaCoding -->

<div class="slideshow-container-img">    
    <div class="prev" onclick="plusSlides(-1)">&#10094;</div>
    <div class="next" onclick="plusSlides(1)">&#10095;</div>

    <div class="mySlidesImg">
        <img src="<?php echo base_url ("/storage/app/public/images/slider/taluakbuo1.png");?>" style="width:80%"><br>
        Semburatnya nan jingga Berkelumat dengan hitam Membaur dengan gelap Lenyap bersama 
    </div>

    <div class="mySlidesImg">
        <img src="<?php echo base_url ("/storage/app/public/images/slider/taluakbuo2.png");?>" style="width:80%"><br>
        Kulepaskan pandanganku Jauh ke Ujung lautan ke Ujung pelangi Betapa luas alam semesta
    </div>

    <div class="mySlidesImg">
        <img src="<?php echo base_url ("/storage/app/public/images/slider/taluakbuo3.png");?>" style="width:80%"><br>
        Deru ombak menghantam bebatuan Bisikan angin memecahkan suasana pilu Terlebih lagi ada cahaya indah di hadapan
    </div>

    <div class="mySlidesImg">
        <img src="<?php echo base_url ("/storage/app/public/images/slider/taluakbuo4.png");?>" style="width:80%"><br>
        Mendengar suara deburan ombak jiwa yang lelah tidur nyenyak diiringi nyanyian alam sungguh indah sangat menawan
    </div>
</div>

<script>
    var slideImgIndex = 0;
    var slides = document.getElementsByClassName("mySlidesImg");
    showSlidesImg();

    function showSlidesImg() {
        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideImgIndex++;
        if (slideImgIndex > slides.length) {slideImgIndex = 1}    
        fadeInOut(slides[slideImgIndex-1]);
        setTimeout(showSlidesImg, 13000); // Change image every 13 seconds
    }

    function currentSlide(n) {
        slideImgIndex = n;
        showSlideImg(slideImgIndex);
    }

    function showSlideImg(n) {
        if (n > slides.length) {slideImgIndex = 1}
        if (n < 1) {slideImgIndex = slides.length}
        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        fadeInOut(slides[slideImgIndex-1]);
    }

    function plusSlides(n) {
        showSlideImg(slideImgIndex += n);
    }

    function fadeInOut(element) {
        var opacity = 0;
        var interval = 10; // Interval for smoother transition
        var duration = 2000; // 2 seconds fade in/out

        element.style.opacity = opacity;
        element.style.display = "block";
        var fadeInOutTimer = setInterval(function() {
            if (opacity >= 1) {
                clearInterval(fadeInOutTimer);
                setTimeout(function() {
                    fadeOut(element);
                }, 13000); // Hold the image for 13 seconds before fading out
            }
            element.style.opacity = opacity;
            opacity += interval / duration;
        }, interval);
    }

    function fadeOut(element) {
        var opacity = 1;
        var interval = 10; // Interval for smoother transition
        var duration = 2000; // 2 seconds fade in/out

        var fadeOutTimer = setInterval(function() {
            if (opacity <= 0) {
                clearInterval(fadeOutTimer);
                element.style.display = "none";
            }
            element.style.opacity = opacity;
            opacity -= interval / duration;
        }, interval);
    }
</script>

<!-- end of slider dari BarajaCoding -->
