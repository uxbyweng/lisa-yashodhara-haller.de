// js Document

(function($) {
    "use strict";


// --------------------- Add .active class to current navigation based on URL
        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
          $(".navbar-nav > li  a").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          $(this).addClass("active");
          // $(this).parent("li").addClass("active");
        })


// ------------------------ Navigation Scroll
        $(window).on('scroll', function (){   
          var sticky = $('.sticky-menu'),
          scroll = $(window).scrollTop();
          if (scroll >= 100) sticky.addClass('fixed');
          else sticky.removeClass('fixed');

        });

// -------------------- From Bottom to Top Button
        $(window).on('scroll', function (){
          if ($(this).scrollTop() > 200) {
            $('.scroll-top').fadeIn();
          } else {
            $('.scroll-top').fadeOut();
          }
        });

//---------------------- Click event to scroll to top
        $('.scroll-top').on('click', function() {
          $('html, body').animate({scrollTop : 0});
          return false;
        });

// -------------------- Remove Placeholder When Focus Or Click
        $("input,textarea").each( function(){
            $(this).data('holder',$(this).attr('placeholder'));
            $(this).on('focusin', function() {
                $(this).attr('placeholder','');
            });
            $(this).on('focusout', function() {
                $(this).attr('placeholder',$(this).data('holder'));
            });     
        });


// ----------------------------- Select Function
        if($(".nice-select").length) {
            $('.nice-select').niceSelect();
        }

        
// ------------------------ Password Toggler
        if($(".user-data-form").length) {
          $(".passVicon").on('click', function() {
            $(".passVicon").toggleClass("eye-slash");
            var input = $(".pass_log_id");
            if (input.attr("type") === "password") {
              input.attr("type", "text");
            } else {
              input.attr("type", "password");
            }

          });
        }


// ----------------------- Closes responsive menu when a scroll trigger link is clicked
    $('#one-page-nav .nav-link').on('click', function(){
      $('.navbar-collapse').removeClass('show');
      $('.navbar-toggler').attr("aria-expanded", "false");
    })



// --------------------------------- Contact Form
// init the validator
// validator files are included in the download package
// otherwise download from http://1000hz.github.io/bootstrap-validator

        if($("#contact-form").length) {
            $('#contact-form').validator();
            $('#contact-form').on('submit', function (e) {
                if (!e.isDefaultPrevented()) {
                    var $form = $(this);
                    var $btn  = $form.find('button[type="submit"], button:not([type])');
                    $btn.prop('disabled', true).text('Wird gesendet …');

                    $.ajax({
                        type: "POST",
                        url: "contact.php",
                        data: $form.serialize(),
                        success: function (data) {
                            var messageAlert = 'alert-' + data.type;
                            var messageText  = data.message;
                            if (messageAlert && messageText) {
                                var $alertBox = $('<div>').addClass('alert ' + messageAlert + ' alert-dismissable').text(messageText);
                                $form.find('.messages').empty().append($alertBox);
                                $form[0].reset();
                            }
                            $btn.prop('disabled', false).text('Mitteilung senden');
                        },
                        error: function () {
                            $btn.prop('disabled', false).text('Mitteilung senden');
                        }
                    });
                    return false;
                }
            });
          }


// --------------------- YouTube Two-Click-Façade
    $(document).on('click', '.yt-facade', function (e) {
        if ($(e.target).closest('.yt-facade__notice').length) return;
        $(this).find('.yt-facade__notice').show();
    });
    $(document).on('click', '.yt-facade__accept', function (e) {
        e.stopPropagation();
        var $f = $(this).closest('.yt-facade');
        $.fancybox.open({
            src: 'https://www.youtube.com/embed/' + $f.data('ytId') + '?start=' + ($f.data('ytStart') || 0) + '&autoplay=1',
            type: 'iframe',
            opts: { animationEffect: 'zoom-in-out', transitionEffect: 'zoom-in-out' }
        });
    });


$(window).on ('load', function (){
// makes sure the whole site is loaded


// ------------------------------------- Fancybox
        var fancy = $ (".fancybox");
        if(fancy.length) {
          fancy.fancybox({
            arrows: true,
            buttons: [
              "zoom",
              //"share",
              "slideShow",
              //"fullScreen",
              //"download",
              "thumbs",
              "close"
            ],
            animationEffect: "zoom-in-out",
            transitionEffect: "zoom-in-out",
          });
        }


// ----------------------------- isotop gallery
        if ($("#isotop-gallery-wrapper").length) {
            var $grid = $('#isotop-gallery-wrapper').isotope({
              // options
              itemSelector: '.isotop-item',
              percentPosition: true,
              masonry: {
                // use element for option
                columnWidth: '.grid-sizer'
              }

            });

            // filter items on button click
            $('.isotop-menu-wrapper').on( 'click', 'li', function() {
              var filterValue = $(this).attr('data-filter');
              $grid.isotope({ filter: filterValue });
            });

            // change is-checked class on buttons
            $('.isotop-menu-wrapper').each( function( i, buttonGroup ) {
                var $buttonGroup = $( buttonGroup );
                $buttonGroup.on( 'click', 'li', function() {
                  $buttonGroup.find('.is-checked').removeClass('is-checked');
                  $( this ).addClass('is-checked');
                });
            });
        }
    


    });  //End On Load Function
    
    
})(jQuery);