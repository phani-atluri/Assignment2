// On Document Load
jQuery(window).load(function(){
    //site loader
    jQuery('#wraploader').hide();
});

// On Document Ready
jQuery(document).ready(function ($) {   

   //hide and show nav 
  $("button#menu-toggle").click(function () {
    $(".site-header-menu").slideToggle("1500");
  });

    
    /*wow jQuery*/
    wow = new WOW({
            boxClass: 'evision-animate'
        }
    )

    wow.init();

    // slick jQuery 
    jQuery('.carousel-group').slick({
      autoplay: true,
      autoplaySpeed: 3000,
      dots: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      lazyLoad: 'ondemand',
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
           breakpoint: 768,
           settings: {
             slidesToShow: 2,
             slidesToScroll: 2
           }
         },
         {
           breakpoint: 481,
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


    $(window).scroll(function() {    
      var scroll = $(window).scrollTop();

      if(scroll >= 1) {
          $("header#masthead").addClass("chrimbo-fixed-header");
      } else {
          $("header#masthead").removeClass("chrimbo-fixed-header");
      }
  });

    // back to top animatio  

    $('#gotop').click(function () {
    $('html, body').animate({
      scrollTop: '0px'
    }, 1000);
    return false;
  });

       
    // header fix
    var initialPosition = $(window).scrollTop();
    $(window).scroll(function() {
      var getScrollTop = $('html body').scrollTop(),
          mastheadHeight = $('#masthead').outerHeight(),
          headerFixed = $('#fixedhead');
          
      if (getScrollTop > initialPosition) {
        $( '#fixedhead' ).css({'top': -170});
      } else {
        $( '#fixedhead' ).css({'top': 0});
      }

      if ( getScrollTop == 0 ) { 
       $( '#fixedhead' ).css({'top': -170});
      }
      initialPosition = getScrollTop;

      // back to top button visible on scroll
      var scrollTopPosition = $('html, body').scrollTop();
      if( scrollTopPosition > 240 ) {
        $('#gotop').css({'bottom': 25});
      } else {
        $('#gotop').css({'bottom': -100});
      }
    });

    // margin top social
    var mastheadHeight = $('#masthead').outerHeight(),
        mobileScreen = $(window).width();
        mobileScreenMargin(mobileScreen);

    function mobileScreenMargin(mobileScreen){
      if( mobileScreen >= 768 ){
        $('.evision-social-section').css('margin-top', mastheadHeight);
      }   else {
        $('.evision-social-section').css('margin-top', '0px');   
      }
    }


    // resize
    $(window).resize(function(){
       var  mastheadHeight = $('#masthead').outerHeight(),
            mobileScreen = $(window).width();
          $( '#fixedhead' ).css({'width': mobileScreen });
          mobileScreenMargin(mobileScreen);
    });
});