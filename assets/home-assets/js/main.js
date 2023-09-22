

/**********************/
	/*	Client carousel   */
/**********************/

$('.responsive').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  
});

$(document).ready(function () {
    "use strict";
    if ($('#our-partner-carousel').length) {
        $('#our-partner-carousel').slick({
            dots: false,
			autoplay: true,
			nav: true,
            infinite: true,
            speed: 300,
            slidesToShow: 6,
			loop: true,
			slidesToScroll: 6,
			autoplaySpeed: 1000,
//            fade: true,
//            cssEase: 'linear'
			responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
          });
    }
});

//$(document).ready(function(){
//	"use strict";
//	if ($('#our-partner-carousel').length){
//		$('#our-partner-carousel').owlCarousel({
//	autoplay: true,
//	autoplayTimeout:2000,
//autoplayHoverPause:false,
//	center: true,
//	items: 6,
//    loop:true,
//    margin:10,
//    nav:true,
//    responsive:{
//        0:{
//            items:1
//        },
//        600:{
//            items:3
//        },
//        1000:{
//            items:6
//        }
//    }
//});
//	}
//	
//});

$(document).ready(function () {
    "use strict";
    if ($('#country-carousel').length) {
        $('#country-carousel').slick({
            dots: false,
			autoplay: true,
			nav: true,
            infinite: true,
            speed: 300,
            slidesToShow: 8,
			loop: true,
			slidesToScroll: 1,
			autoplaySpeed: 1000,
//            fade: true,
//            cssEase: 'linear'
			responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 8,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 776,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
          });
    }
});

//$(document).ready(function(){
//	"use strict";
//	if ($('#country-carousel').length){
//		$('#country-carousel').owlCarousel({
//	autoplay: true,
//	autoplayTimeout:2000,
//autoplayHoverPause:false,
//	center: true,
//	items: 8,
//    loop:true,
//    margin:10,
//    nav:true,
//    responsive:{
//        0:{
//            items:1
//        },
//        600:{
//            items:3
//        },
//        1000:{
//            items:8
//        }
//    }
//});
//	}
//	
//});

$(document).ready(function(){
	"use strict";
	if ($('#custom_carousel').length){
		$('#custom_carousel').owlCarousel({
	autoplay: false,
	autoplayTimeout:2000,
autoplayHoverPause:false,
	center: true,
	dots: true,
	items: 1,
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
	}
	
});

$(document).ready(function() {
  
  $(".search-category").click(function(event) {
    event.preventDefault();
    return false;   
    });
"use strict";
  $("#tab-domains").owlCarousel({
    speed: 800,
    margin:15,
    autoplay:false,
    nav:false,
	  items: 4,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:1
      },
      900:{
        items:4
      }
    }
  });
  $("#tab-websites").owlCarousel({
    speed: 800,
    margin:15,
    autoplay:false,
    nav:false,
	  items: 4,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:1
      },
      900:{
        items:4
      }
    }
  });
  $("#tab-apps").owlCarousel({
    speed: 800,
    margin:15,
    autoplay:false,
    nav:false,
	  items: 4,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:1
      },
      900:{
        items:4
      }
    }
  });
  $("#tab-amazonstore").owlCarousel({
    speed: 800,
    margin:15,
    autoplay:false,
    nav:false,
	  items: 4,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:1
      },
      900:{
        items:4
      }
    }
  });
  // debugger; 
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    e.target; // newly activated tab
    e.relatedTarget; // previous active tab
    // $("#owl-example").trigger('refresh.owl.carousel');
    });
  });

//Testimonail Carousel

$(document).ready(function () {
    "use strict";
    if ($('#testimonial-carousel').length) {
        $('#testimonial-carousel').slick({
            dots: true,
			autoplay: true,
			nav: false,
            infinite: true,
			appendDots: $('#testimonial-carousel'),
			prevArrow: false,
    nextArrow: false,
            speed: 2000,
            slidesToShow: 1,
			loop: true,
			slidesToScroll: 1,
			autoplaySpeed: 1000,
//            fade: true,
//            cssEase: 'linear'
			responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
          });
    }
});

//$(document).ready(function(){
//	"use strict";
//	if ($('#testimonial-carousel').length){
//		$('#testimonial-carousel').owlCarousel({
//	autoplay: false,
//	autoplayTimeout:2000,
//autoplayHoverPause:false,
//	center: true,
//	items: 1,
//    loop:true,
//    margin:10,
//    nav:true,
//    responsive:{
//        0:{
//            items:1
//        },
//        600:{
//            items:1
//        },
//        1000:{
//            items:1
//        }
//    }
//});
//	}
//	
//});

//blog-carousel Start
$(document).ready(function () {
    "use strict";
    if ($('#blog-carousel').length) {
        $('#blog-carousel').slick({
            dots: false,
			autoplay: true,
			nav: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
			loop: true,
			slidesToScroll: 4,
			autoplaySpeed: 1000,
//            fade: true,
//            cssEase: 'linear'
			responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
          });
    }
});

//$(document).ready(function(){
//	"use strict";
//	if ($('#blog-carousel').length){
//		$('#blog-carousel').owlCarousel({
//	autoplay: false,
//	autoplayTimeout:2000,
//autoplayHoverPause:false,
//	center: true,
//	items: 4,
//    loop:true,
//    margin:10,
//    nav:true,
//    responsive:{
//        0:{
//            items:1
//        },
//        600:{
//            items:1
//        },
//        1000:{
//            items:4
//        }
//    }
//});
//	}
//	
//});

//featured-listing-carousel

$(document).ready(function () {
    "use strict";
    if ($('#featured-listing-carousel').length) {
        $('#featured-listing-carousel').slick({
            dots: false,
			autoplay: true,
			nav: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
			loop: true,
			slidesToScroll: 4,
			autoplaySpeed: 1000,
//            fade: true,
//            cssEase: 'linear'
			responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
          });
    }
});

//$(document).ready(function(){
//	"use strict";
//	if ($('#featured-listing-carousel').length){
//		$('#featured-listing-carousel').owlCarousel({
//	autoplay: false,
//	autoplayTimeout:2000,
//autoplayHoverPause:false,
//	center: true,
//	items: 4,
//    loop:true,
//    margin:10,
//    nav:true,
//    responsive:{
//        0:{
//            items:1
//        },
//        600:{
//            items:1
//        },
//        1000:{
//            items:4
//        }
//    }
//});
//	}
//	
//});


$(document).ready(function () {
    "use strict";
    if ($('#slickCarousel').length) {
        $('#slickCarousel').slick({
            dots: true,
			autoplay: true,
			nav: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            fade: true,
            cssEase: 'linear'
          });
    }
});