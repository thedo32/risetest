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
            slides[i].style.opacity = 0;
        }
        slideImgIndex++;
        if (slideImgIndex > slides.length) {slideImgIndex = 1}    
        fadeIn(slides[slideImgIndex-1]);
        setTimeout(showSlidesImg, 12000); // Change image every 12 seconds
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
            slides[i].style.opacity = 0;
        }
        fadeIn(slides[slideImgIndex-1]);
    }

    function plusSlides(n) {
        showSlideImg(slideImgIndex += n);
    }

    function fadeIn(element) {
        var opacity = 0;
        element.style.display = "block";
        var timer = setInterval(function() {
            if (opacity >= 1) {
                clearInterval(timer);
            }
            element.style.opacity = opacity;
            opacity += 0.02;
        }, 20); // 20ms interval to complete the transition in 2 seconds
    }
</script>


<!-- end of slider dari BarajaCoding -->
