<?php  
$slides = get_sub_field('slide');
// print_r($slides);
$no_slides = count($slides);

//print_r('</br> No of slides '.$no_slides);
?>
<style>

.mySlides {display: none}
img {vertical-align: middle;}
.fade:not(.show) {
    opacity: 1;
}
/* Slideshow container */
.slideshow-container{
  display: none;
}
.slideshow-container {
  max-width: 100%;
  position: relative;
  margin: auto;
  /*height: calc(100vh - 221px);*/
    overflow: hidden;
    margin-top: 50px;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  bottom: 5%;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 180px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
/*.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}*/

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

.slider_link a {
    font-size: 2.25rem;
    line-height: 1.16667;
    font-weight: 700;
    color: #ffffff;
}
.mySlides p {
    font-size: 1.3125rem !important;
    line-height: 1.33333;
    margin-top: 15px;
    color: #ffffff;
}
span.dot {
    width: 14px;
    height: 14px;
    background-color: rgba(0,0,0,0.4);
    border-radius: 50%;
    box-shadow: inset 0 0 0 1px #fff;
    content: '';
    display: inline-block; 
    overflow: hidden;
    transition: background-color 0.25s;
        margin: 2px;
}
span.dot.active {
    background-color: #fff;
}
.slider_bullets {
    position: absolute;
    bottom: 30%;
    left: 0;
    right: 0;
}
a.nav_arrows {
    width: 55px;
    height: 55px;
    display: flex;
    align-items: center;
    background: rgba(0,0,0,0.9);
    box-shadow: inset 0px 0px 0px 4px #fff;
    border-radius: 50%;
    color: #fff;
    justify-content: center;
    pointer-events: auto;
    text-indent: -9999px;
    transition: background-color 0.25s,box-shadow 0.25s;
    will-change: transform;
}
a.nav_arrows:hover {
    box-shadow: inset 0px 0px 0px 1px #fff;
    background: rgba(0,0,0,0.4);
}
a.nav_arrows svg {
    width: 19 !important;
    height: 22 !important;
}
.mySlides.fade:before {
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 0;
    background: linear-gradient(to top,rgba(0,0,0,0.75),transparent 65%);
    content: '';
}
@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>

<div class="my-slider-main">
  <div class="slideshow-container">
    <?php foreach ($slides as $slide) {
      $img = $slide['image']['url'];
      $video = $slide['video']['url'];
      $link = $slide['link'];
      $sub_caption = $slide['sub_caption'];
    ?>
     <div class="mySlides fade">
  <?php if ($video != '') { ?>
    <div class="slider">
      <div class="slide">
        <video width="100%" class="slider-video" controls autoplay loop muted poster="<?php echo $img; ?>">
          <source src="<?php echo $video; ?>" type="video/mp4">
        </video>
      </div>
    </div>
  <?php } elseif ($img != '') { ?>
    <img src="<?php echo $img; ?>" style="width:100%">
  <?php } ?>
  <div class="text">
    <?php if ($link != '') { ?>
      <div class="slider_link"><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></div>
    <?php }
    if ($sub_caption != '') { ?>
      <p><?php echo $sub_caption; ?></p>
    <?php } ?>
  </div>
</div>


    <?php } ?>
    <a class="nav_arrows prev" onclick="plusSlides(-1)" aria-label="Previous"><span class="icon"><svg class="symbol symbol_feature_left"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#feature_left"></use></svg></span></a>
    <a class="nav_arrows next" onclick="plusSlides(1)" aria-label="Next"><svg class="symbol symbol_feature_right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#feature_right"></use></svg></a>
    <div class="slider_bullets" style="text-align:center" aria-label="carousel pagination">
      <?php for ($i = 1; $i <= $no_slides; $i++) { ?>
        <span class="dot" onclick="currentSlide(<?php echo $i; ?>)"></span>
      <?php } ?>
    </div>
  </div>
</div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}



/******28-04-2023 myslider-script******/
/*let sliderContainer = document.querySelector('.my-slider-main');
let innerSlider = document.querySelector('.slideshow-container');

let pressed = false;
let startX;
let x;*/



/******End 28-04-2023 myslider-script******/
</script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">


<style type="text/css">
.row.responsive.slick-initialized.slick-slider.slick-dotted{
  overflow-x: hidden;
}
 
  .fade1{
  animation-name: fade;
  animation-duration: 1.5s;
}
.fade1:before {
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 0;
    /*change 07-07-2023**/
    /*background: linear-gradient(to top,rgba(0,0,0,0.15),transparent 45%);*/
    /* background: linear-gradient(to top,rgba(0,0,0,0.15),transparent 100%); */
    /* background: linear-gradient(to top,rgba(0,0,0,0.15),transparent 40%); */
    
	/* height: 165%;
    width: 100%;
    position: absolute;
    top: -285px;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 0;
    background: linear-gradient(to top,rgba(0,0,0,0.19),transparent 28%);
    /*background: linear-gradient(to top,rgba(0,0,0,0.75),transparent 65%);*/
    content: '';
}
@keyframes fade1 {
  from {opacity: 50} 
  to {opacity: 1}
}
  /* .text1 {
    text-align: center !important;
    position: absolute;
    bottom: 8px;
    width: 11.3%;
    z-index: 1;
    
} */

.text1 {
	text-align: center !important;
	position: absolute;
	bottom: 0px;
	width: inherit;
	z-index: 1;
	background: linear-gradient(to top,rgba(0,0,0,0.8),transparent 100%);
	padding-top: 215px;
}

/* .slider_link1 {
    position: absolute;
    bottom: 90px;
}
.slick-list p {
    position: absolute;
    bottom: 20px;
} */
.slick-slide{
  height: unset !important;
}
img.slide-img {
    height: 518px;
    object-fit: cover;

  }
  .slick-list.draggable {
    height: 518px;
}
video.slide-video {
    height: 518px;
    object-fit: cover;
}
.slider_link1 a {
    color: #fff !important;
    font-size: 2.25rem;
    line-height: 1.16667;
    font-weight: 700;
}
.text1 p {
    color: #fff;
    text-align: center;
    font-size: 1.31rem;
    line-height: 1.3;
    margin-top: 15px;
    padding-right: 40px;
}
.slick-prev {
  left: 2.6% !important;
  z-index: 1;
    width: 55px;
    height: 55px;
    display: flex;
    align-items: center;
    background: rgba(0,0,0,0.9);
    box-shadow: inset 0px 0px 0px 4px #fff;
    border-radius: 50%;
    /*color: #fff;*/
    justify-content: center;
    pointer-events: auto;
    /*text-indent: -9999px;*/
    transition: background-color 0.25s,box-shadow 0.25s;
    will-change: transform;
}
.slick-next {
  right: 2.6% !important;
  z-index: 1;
  width: 55px;
    height: 55px;
    display: flex;
    align-items: center;
    background: rgba(0,0,0,0.9);
    box-shadow: inset 0px 0px 0px 4px #fff;
    border-radius: 50%;
    /*color: #fff;*/
    justify-content: center;
    pointer-events: auto;
    /*text-indent: -9999px;*/
    transition: background-color 0.25s,box-shadow 0.25s;
    will-change: transform;
}
.slick-next:before, .slick-prev:before {
    font-family: slick;
    font-size: 20px;
    line-height: 1;
    opacity: inherit !important;
    color: #fff !IMPORTANT;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.slick-next:hover{
  box-shadow: inset 0px 0px 0px 1px #fff;
    background: rgba(0,0,0,0.4);
}
.slick-prev:hover{
  box-shadow: inset 0px 0px 0px 1px #fff;
    background: rgba(0,0,0,0.4);
}
.slick-dots{
  bottom: 115px;
  height: 22px;
}
/**change 07-07-2023**/
.slick-dots li button{
    border: 1px solid #fff !important;
    border-radius: 50px !important;
    width: 18px !important;
    height: 18px !important;
}
.slick-dots li button:before{
  font-size: 15px !important;
  left: -1px !important;
}
.slick-dots li button:before {
    font-family: slick;
    font-size: 6px;
    line-height: 21px;
    position: absolute;
    top: 0;
    left: 0;
    width: 20px;
    height: 20px;
    content: '•';
    text-align: center;
    opacity: .25;
    color: #000;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
/**end change 07-07-2023**/
.slick-dots li.slick-active button::before {
    color: #fff !important;
    opacity: 1;
    background: #fff;
}

.slick-dots li button:focus:before, .slick-dots li button:hover:before {
    opacity: 1;
}

.slick-dots li button {
    background: transparent;
}
.slick-dotted.slick-slider{
  margin-bottom: 0px;
}
.slick-next, .slick-prev{
  top: unset;
  bottom: 0px;

}
.slick-next:before, .slick-prev:before{
  font-family: FontAwesome;
  position: relative;
  left: 18px;
}
@media screen and (min-width: 2400px) and (max-width: 2560px){
img.slide-img {
    height: 1200px;
    object-fit: cover;
}
.slick-list.draggable {
    height: 1200px;
}
video.slide-video{
	height: 1200px;
}
}

@media screen and (min-width: 1800px) and (max-width: 1920px){
img.slide-img {
    height: 930px;
    /*object-fit: cover;*/
    object-fit: cover;
}
.slick-list.draggable {
    height: 930px;
}
video.slide-video{
	height: 930px;
}
}
/*@media screen and (min-width: 1440px) and (max-width: 1600px){
img.slide-img {
    height: 845px;
    object-fit: cover;
    object-fit: contain;
}
.slick-list.draggable {
    height: 930px;
}
video.slide-video{
	height: 845px;
}
}*/
@media screen and (min-width: 1200px) and (max-width: 1440px){
img.slide-img {
    height: 600px;
    object-fit: cover;
}
.slick-list.draggable {
    height: 600px !important;
}
video.slide-video{
	height: 600px;
}

}
@media screen and (min-width: 1025px) and (max-width: 1200px){
	.text1 .slider_link1 a {
    font-size: 2.25rem !important;
}
/* .text1{
	padding: 0px 150px !important;
} */
.text1 p{
	padding: 0px 50px; 
}
.slick-dots{
	bottom:125px;
}
}
@media screen and (min-width: 900px) and (max-width: 980px){
.text1 p{
	padding: 0px 55px;
}
}
@media screen and (min-width: 980px) and (max-width: 1024px){
.text1 p{
	padding: 0px 79px !important;
}
}
/*@media screen and (min-width: 900px) and (max-width: 1026px){
img.slide-img {
    height:525px;
    object-fit: cover;
    object-fit: contain;
}
}*/
@media screen and (min-width: 822px) and (max-width: 835px){
img.slide-img {
    height: 450px;
    object-fit: cover;
}
.slick-list.draggable {
    height: 450px !important;
}
video.slide-video{
	height: 450px;
}
/* .text1{
 padding:0px 80px;
} */
.text1 p{
font-size:1.3125rem !important;
}
}

@media screen and (min-width: 800px) and (max-width: 821px){
img.slide-img {
    height: 450px;
    object-fit: cover;
}
.slick-list.draggable {
    height: 450px !important;
}
video.slide-video{
	height: 450px;
}
/* .text1{
  padding:0px 125px;
} */
.text1 p{
  font-size:1.3125rem;
  padding: 0px 10px !important;
}

}
@media screen and (min-width: 560px) and (max-width: 740px){
	.home .slick-list.draggable{
    	margin-top:0px !important;
    }
}
@media screen and (min-width: 500px) and (max-width: 560px){
.home .slider_link1 a {
    font-size: 1.3125rem !important;
}
	.text1 p{
    	font-size:0.8125rem !important;
    }
}

@media screen and (max-width: 500px) {
 .fade1:before {
    /* background: linear-gradient(to top,rgba(0,0,0,0.2),transparent 75%); */
  }
}
@media screen and (min-width: 426px) and (max-width: 500px){
/* .home .slick-list.draggable{
	margin-top: 0px !important;
} */
.slick-list.draggable {
    height: 370px !important;
}
img.slide-img {
    height: 370px !important;
    object-fit: cover;
}
video.slide-video{
	height: 370px !important;
}
.slick-next, .slick-prev{
	bottom: 0px !important;
}
	.text1 {
    bottom: 0px !important;
    /* padding: 0px 60px !important; */
}
.slider_link1 a{
	font-size: 1rem !important;
}
.text1 p{
	font-size:0.8125rem !important;
    margin-top:0px;
}
.slick-next{
	width:35px !important;
    height:35px !important;
}
.slick-prev{
	width:35px !important;
    height:35px !important;
}
.slick-next:before, .slick-prev:before{
	left: 11px !important;
    font-size:16px !important;
}
}
@media screen and (min-width: 416px) and (max-width: 426px){
/* .home .slick-list.draggable{
	margin-top: 0px !important;
} */
img.slide-img {
    height: 350px !important;
    object-fit: cover !important;
}
.slick-list.draggable {
    height: 350px !important;
}
video.slide-video{
	height: 350px !important;
}
.slider_link1 a{
	font-size:1rem !important;
}
.text1 p{
   font-size:0.8125rem !important;
   margin-top:0px;
}
.slick-next, .slick-prev {
    top: unset;
    bottom: 0px !important;
}
.text1 {
    bottom: 0px !important;
    /* padding: 0px 60px !important; */
}
.slick-next{
	width:35px !important;
    height:35px !important;
}
.slick-prev{
	width:35px !important;
    height:35px !important;
}
.slick-next:before, .slick-prev:before{
	left: 11px !important;
    font-size:16px !important;
}
}
@media screen and (min-width: 391px) and (max-width: 415px){
/* .home .slick-list.draggable{
	margin-top: 0px !important;
} */

img.slide-img {
    height: 350px !important;
    object-fit: cover;
}
.slick-list.draggable {
    height: 350px !important;
}
video.slide-video{
	height: 350px !important;
}
.slider_link1 a{
	font-size:1rem !important;
}
.text1 p{
   font-size:0.8125rem !important;
   margin-top:0px;
}
.slick-next, .slick-prev {
    top: unset;
    bottom: 0px !important;
}
.text1 {
    bottom: 0px !important;
    /* padding: 0px 60px !important; */
}
.slick-next{
	width:35px !important;
    height:35px !important;
}
.slick-prev{
	width:35px !important;
    height:35px !important;
}
.slick-next:before, .slick-prev:before{
	left: 11px !important;
    font-size:16px !important;
}
}
@media screen and (min-width: 377px) and (max-width: 391px){
/* .home .slick-list.draggable{
	margin-top: 0px !important;
} */
img.slide-img {
    height: 350px !important;
    object-fit: cover;
}
.slick-list.draggable {
    height: 350px !important;
}
video.slide-video{
	height: 350px !important;
}
.slider_link1 a{
	font-size:1rem !important;
}
.text1 p{
   font-size:0.8125rem !important;
   margin-top:0px;
}
.slick-next, .slick-prev {
    top: unset;
    bottom: 10px !important;
}
.text1 {
    bottom: 0px !important;
    /* padding: 0px 60px !important; */
}
.slick-next{
	width:35px !important;
    height:35px !important;
}
.slick-prev{
	width:35px !important;
    height:35px !important;
}
.slick-next:before, .slick-prev:before{
	left: 11px !important;
    font-size:16px !important;
}
}
@media screen and (min-width: 360px) and (max-width: 376px){
/* .home .slick-list.draggable{
	margin-top: 0px !important;
} */
img.slide-img {
    height: 330px !important;
    object-fit: cover;
}
.slick-list.draggable {
    height: 330px !important;
}
video.slide-video{
	height: 330px !important;
}
.slider_link1 a{
	font-size:1rem !important;
}
.text1 p{
   font-size:0.8125rem !important;
   margin-top:0px;
}
.slick-next, .slick-prev {
    top: unset;
    bottom: 0px !important;
}
.text1 {
    bottom: -5px !important;
    /* padding: 0px 60px !important; */
}
.slick-next{
	width:35px !important;
    height:35px !important;
}
.slick-prev{
	width:35px !important;
    height:35px !important;
}
.slick-next:before, .slick-prev:before{
	left: 11px !important;
    font-size:16px !important;
}

}

@media only screen and (max-width: 1025px) {

/*.text1{
  bottom: 58px;
  padding: 0px 100px;
  }*/
.text1{
	/* padding: 0px 180px; */
}
.slick-dots{
	bottom:130px;
}
}
@media only screen and (max-width: 980px){

  ul.slick-dots {
    display: none !important;
}
/* .text1{
	padding: 0px 180px;
} */
}

/*@media only screen and (max-width: 780px) {
    img.slide-img {
    height: 63%;
    object-fit: cover;
}
video.slide-video {
    height: 63%;
    object-fit: cover;
}
.slick-list.draggable{
 height: 63%;}
}*/

@media only screen and (max-width: 768px) {
  .slick-next:before, .slick-prev:before{
  font-family: FontAwesome;
  position: relative;
  left: 15px;
}
   /*   img.slide-img {
    height: 100%;
    object-fit: cover;
}*/
img.slide-img {
    height: 440px;
    object-fit: cover;
}
.slick-list.draggable {
    height: 440px;
}
video.slide-video{
	height: 440px;
}
/*video.slide-video {
    height: 100%;
    object-fit: cover;
}*/

.text1{
  bottom: 0px;
  /* padding: 0px 95px; */
  }
  .slider_link1 a{
  	font-size: 1rem !important;
  }
  .text1 p{
  	font-size: 1.3125rem;
  }
  .slick-prev{
    width: 45px;
    height: 45px;
    box-shadow: inset 0px 0px 0px 2px #fff;
  }
  .slick-next{
    width: 45px;
    height: 45px;
    box-shadow: inset 0px 0px 0px 2px #fff;
  }
  .slick-next, .slick-prev{
  top: unset;
  bottom: 10px;
}
ul.slick-dots {
    display: none;
}
/*.slick-list.draggable {
    height: 52%;
}*/
button#slick-slide-control00 {
    display: none;
}
}


@media only screen and (max-width: 425px){
  /*img.slide-img {
    height: 270px;
    object-fit: cover;
}*/

.slider_link1 a {
    color: #fff !important;
    font-size: 1rem;
    line-height: 1.16667;
    font-weight: 700;
}
.slider_link1 a{
  font-size: 1rem;
  line-height: 1.16667;
}
/*.text1 p{
  font-size: 0.8125rem !important;
  line-height: 1.230;
  padding: 0px 60px;
}*/
}
</style>



<style>
  .video-container {
    position: relative;
  }

  .slide-video {
    width: 100%;
  }

  .play-pause-btn {
    position: absolute;
    bottom: 27px;
    left: 89.5%;
    z-index: 99;
    padding: 19px 21px;
    background-color: rgb(0 0 0);
    color: white;
    border: none;
    border-radius: 90%;
    cursor: pointer;
}

@media only screen and (max-width: 1400px){
  .play-pause-btn {
    left: 88.5% !important;
}

}
@media only screen and (max-width: 1217px){
  .play-pause-btn {
    left: 87.5% !important;
}

}
@media only screen and (max-width: 1100px){
  .play-pause-btn {
    left: 86.5% !important;
}

}
@media only screen and (max-width: 991px){
  .play-pause-btn {
    display: none;
}

.text1 p {
    padding-right: 0;
}

}



</style>
<div class="container-fluid">
    <div class="row responsive">
        <?php foreach($slides as $slide ){ 
            $img = $slide['image']['url'];
            $video = $slide['video']['url'];
            $link = $slide['link'];
            $sub_caption = $slide['sub_caption'];
        ?>
            <div class="col-md-12 fade1">
                <div class="text1">
                    <?php if($link != ''){  ?>
                        <div class="slider_link1"><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></div>
                    <?php } 
                    if($sub_caption != ''){ ?>
                        <p><?php echo $sub_caption; ?></p>
                    <?php } ?>
                </div>
                <?php if($video != ''){ ?>
                    <div class="video-container">
                        <video class="slide-video" width="100%" autoplay loop muted>
                            <source src="<?php echo $video; ?>" type="video/mp4">
                        </video>
                        <button class="play-pause-btn" onclick="togglePlayPause(this)">
                            <i class="fas fa-play" style="display: none;"></i>
                            <i class="fas fa-pause"></i>
                        </button>
                    </div>
                <?php } ?>
                <?php if($img != ''){ ?>
                    <img class="slide-img" src="<?php echo $img; ?>" style="width:100%">
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.responsive').slick({
  dots: true,
  infinite: true,
  speed: 300,
  //slidesToShow: 1,
  arrows: true,
  slidesToScroll: 1,
  /*nextArrow: '<i class="fas fa-arrow-circle-right slick-next"></i>',
  prevArrow: '<i class="slick-prev fa-regular fa-arrow-left"></i>',*/
  // Add FontAwesome Class
   // prevArrow: '<div class="slider-arrow slider-prev fas slick-prev fa-arrow-left"></div>',
    //nextArrow: '<div class="slider-arrow slider-next fa fa-angle-right"></div>',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        infinite: true,
        //slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        arrows: true,
      }
    },
    {
      breakpoint: 600,
      settings: {
        //slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        //slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  
  ]
});


    /*$(document).ready(function(){
        $('.responsive').slick({
            autoplay:true,
            arrows: true,
            prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class="fas fa-arrow-circle-right slick-next"></i></button>"
        });
    });*/
</script>