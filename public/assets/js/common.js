/*
 * ---------------------------------------------------
 * 1. Click icon search show search moblie
 * 2. Main Menu
 * 3. Scroll to Top
 * 4. Scroll to Top
 */

  (function($){
    "use strict";
  /* ==================================================== */
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $('nav#menu').mmenu();
  $('#slider').flexslider({
      controlNav: false,
      animationLoop: true,
      slideshow: true,
    slideshowSpeed: 5000,    
      animation: "slide",
    });
   $('body').append('<div id="top" ></div>');
   $(window).scroll(function() {
       if($(window).scrollTop() > 100) {
           $('#top').fadeIn();
       } else {
           $('#top').fadeOut();
       }
   });
   $('#top').click(function() {
       $('html, body').animate({scrollTop:0},500);
   });
  /*
   * 1. Click icon search show search moblie
  */
  $('.search-mb i').on('click', function() {
    $(this).toggleClass('open');
    $('.search').toggleClass('open');
  })

  /*
   * 2. Main Menu
  */
  $(".nav-toogle").on( 'click', function() {
    $( this ).toggleClass('has-open');
    $(".nav-menu").toggleClass("has-open");
    $("body").toggleClass("menu-open");
  });

  /*
   * 3. Main Menu
  */
  $(document).ready(function(){
    $('.nav-menu li.parent').append('<span class="plus"></span>');
    $('.nav-menu li.parent .plus').click(function(){
      $(this).toggleClass('open').siblings('.submenu').slideToggle();
    });
  });

  /*
   * 4. Scroll to Top
  */
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 200) {
      $('#return-to-top').addClass('td-scroll-up-visible');
    } else {
      $('#return-to-top').removeClass('td-scroll-up-visible');
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 'slow');
  });
  $('.block-user .block-content').popover({
    placement: top,
    trigger: 'click',
    html : true,
    content: function() {
      return $('.popover').html();
    }
  });
})(jQuery); // End of use strict

window.fbAsyncInit = function() {
  FB.init({
    appId      : $('#fb-app-id').val(),
    cookie     : true,  // enable cookies to allow the server to access
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.7' // use graph api version 2.7
  });
};
 (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
$(document).ready(function() {
  $('.login-by-facebook-popup').click(function() {
    var url_redirect = $(this).data('url');
    $('#url_fb_redirect').val(url_redirect);    
    FB.login(function(response){
      if(response.status == "connected")
      {
         // call ajax to send data to server and do process login
        var token = response.authResponse.accessToken;
        $.ajax({
          url: $('#route-ajax-login-fb').val(),
          method: "POST",
          data : {
            token : token
          },
          success : function(data){
       
              location.href = $('#url_fb_redirect').val();
            
          }
        });

      }
    }, {scope: 'public_profile,email'});
  });  
});
$(document).ready(function(){
  $("input.number").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
         // Allow: Ctrl+A, Command+A
        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
         // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
             // let it happen, don't do anything
             return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});
  $('.toggle-menu-select, a.form-close').click(function(){
    $('.menu-select .wrapper-menu-select').toggle();
  });
  
});
jQuery(document).ready(function() {          
  $('.content iframe').each(function(index, el) {
    $(this).wrap( "<div class='video-container'></div>" );
  });
    $('.content table').each(function(index, el) {
    $(this).wrap( "<div class='table-responsive'></div>" );
  });           
});