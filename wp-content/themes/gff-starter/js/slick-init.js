jQuery(document).ready(function($){
     $('.slider').slick({
   
  dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear',
   autoplay: true,
   arrows: true,
  autoplaySpeed: 2000,
});
});


jQuery(document).ready(function($){
     $('.slideshow').slick({
dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  centerMode: true,
  arrows: true,
  adaptiveHeight: true,
});
});

