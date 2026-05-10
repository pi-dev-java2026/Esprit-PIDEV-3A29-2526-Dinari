jQuery(document).ready(function($) {

	'use strict';

        $(function() {
  
          // Vars
          var modBtn  = $('#modBtn'),
              modal   = $('#modal'),
              close   = modal.find('.close'),
              modContent = modal.find('.modal-content');
          
          // open modal when click on open modal button 
          modBtn.on('click', function() {
            modal.css('display', 'block');
            modContent.removeClass('modal-animated-out').addClass('modal-animated-in');
          });
          
          // close modal when click on close button or somewhere out the modal content 
          $(document).on('click', function(e) {
            var target = $(e.target);
            if(target.is(modal) || target.is(close)) {
              modContent.removeClass('modal-animated-in').addClass('modal-animated-out').delay(300).queue(function(next) {
                modal.css('display', 'none');
                next();
              });
            }
          });
          
        });

      (function($) {
        $(".accordion > li:eq(0) a")
          .addClass("active")
          .next()
          .slideDown();

        $(".accordion a").click(function(j) {
          var dropDown = $(this)
            .closest("li")
            .find("p");

          $(this)
            .closest(".accordion")
            .find("p")
            .not(dropDown)
            .slideUp();

          if ($(this).hasClass("active")) {
            $(this).removeClass("active");
          } else {
            $(this)
              .closest(".accordion")
              .find("a.active")
              .removeClass("active");
            $(this).addClass("active");
          }

          dropDown.stop(false, true).slideToggle();

          j.preventDefault();
        });
      })(jQuery);


      $('.owl-carousel').owlCarousel({
          loop:true,
          margin:30,
          responsiveClass:true,
          responsive:{
              0:{
                  items:1,
                  nav:true
              },
              500:{
                  items:2,
                  nav:false
              },
              800:{
                  items:3,
                  nav:false
              },
              1000:{
                  items:4,
                  nav:true,
                  loop:false
              },
              1200:{
                  items:5,
                  nav:true,
                  loop:false
              },
              1500:{
                  items:6,
                  nav:true,
                  loop:false
              }
          }
      })

      
      $('#form-submit .date').datepicker({
      });

      /**
     * jquery.responsive-menu.js
     * jQuery + CSS Multi Level Responsive Menu
     */

    jQuery(function($) {
      $.fn.responsivenav = function(args) {
        var defaults = {
          responsive: true,
          width: 993,
          button: $(this).attr('id')+'-button',
          animation: {
          effect: 'slide',
          show: 150,
          hide: 100
          },
          selected: 'selected',
          arrow: 'downarrow'
        };
        var settings = $.extend(defaults, args);
        
        init($(this).attr('id'), settings.button);
        
        function init(menuid, buttonid) {
          setupMenu(menuid, buttonid);
          $(window).bind('resize orientationchange', function(){ resizeMenu(menuid, buttonid); });
          resizeMenu(menuid, buttonid);
        }
        
        function setupMenu(menuid, buttonid) {
          var $mainmenu = $('#'+menuid+'>ul');
          var $headers = $mainmenu.find("ul").parent();
          $headers.each(function(i) {
            var $curobj = $(this);
            $curobj.children('a:eq(0)').append('<span class="'+settings.arrow+'"></span>');
          });
          
          if ( settings.responsive ) {
            $('#'+buttonid).click(function(e) {
              e.preventDefault();
              if ( isSelected($('#'+buttonid)) ) {
                collapseChildren('#'+menuid);
                animateHide($('#'+menuid), $('#'+buttonid));
              } else {
                animateShow($('#'+menuid), $('#'+buttonid));
              }
            });
          }
        }
        
        function resizeMenu(menuid, buttonid) {
          var $ww = document.body.clientWidth;
          if ( $ww > settings.width || !settings.responsive) {
            $('#'+menuid).removeClass('mobile');
            $('#'+buttonid).removeClass('mobile');
          } else {
            $('#'+menuid).addClass('mobile');
            $('#'+buttonid).addClass('mobile');
          }
          
          var $headers = $('#'+menuid+'>ul').find('ul').parent();
          $headers.each(function(i) {
            var $curobj = $(this);
            var $link = $curobj.children('a:eq(0)');
            var $subul = $curobj.find('ul:eq(0)');
            $curobj.unbind('mouseenter mouseleave');
            $link.unbind('click');
            animateHide($curobj.children('ul:eq(0)'));
            
            if ( $ww > settings.width  || !settings.responsive ) {
              $curobj.hover(function(e) {
                var $targetul = $(this).children('ul:eq(0)');
                var $dims = { w: this.offsetWidth, h: this.offsetHeight, subulw: $subul.outerWidth(), subulh: $subul.outerHeight() };
                var $istopheader = $curobj.parents('ul').length == 1 ? true : false;
                $subul.css($istopheader ? {} : { top: 0 });
                var $offsets = { left: $(this).offset().left, top: $(this).offset().top };
                var $menuleft = $istopheader ? 0 : $dims.w;
                $menuleft = ( $offsets.left + $menuleft + $dims.subulw > $(window).width() ) ? ( $istopheader ? -$dims.subulw + $dims.w : -$dims.w ) : $menuleft;
                $targetul.css({ left:$menuleft+'px', width:$dims.subulw+'px' });
                animateShow($targetul);
              },
              function(e) {
                var $targetul = $(this).children('ul:eq(0)');
                animateHide($targetul);
              });
            } else {
              $link.click(function(e) {
                e.preventDefault();
                var $targetul = $curobj.children('ul:eq(0)');
                if ( isSelected($curobj) ) {
                  collapseChildren($targetul);
                  animateHide($targetul);
                } else {
                  animateShow($targetul);
                }
              });
            }
          });
          
          collapseChildren('#'+menuid);
          if ( settings.responsive && isSelected($('#'+buttonid)) ) {
            $('#'+menuid).hide();
            $('#'+menuid).removeAttr('style');
            $('#'+buttonid).removeClass(settings.selected);
          }
        }
        
        function collapseChildren(elementid) {
          var $headers = $(elementid).find('ul');
          $headers.each(function(i) {
            if ( isSelected($(this).parent()) ) {
              animateHide($(this));
            }
          });
        }
        
        function isSelected(element) {
          return element.hasClass(settings.selected);
        }
        
        function animateShow(menu, button) {
          if ( !button ) { var button = menu.parent(); }
          button.addClass(settings.selected);
          if ( settings.animation.effect == 'fade' ) {
            menu.fadeIn(settings.animation.show);
          } else if ( settings.animation.effect == 'slide' ) {
            menu.slideDown(settings.animation.show);
          } else {
            menu.show();
            menu.removeClass('hide');
          }
        }
        
        function animateHide(menu, button) {
          if ( !button ) { var button = menu.parent(); }
          if ( settings.animation.effect == 'fade' ) {
            menu.fadeOut(settings.animation.hide, function() { 
              menu.removeAttr('style');
              button.removeClass(settings.selected);
            });
          } else if ( settings.animation.effect == 'slide' ) {
            menu.slideUp(settings.animation.hide, function() { 
              menu.removeAttr('style');
              button.removeClass(settings.selected);
            });
          } else {
            menu.hide();
            menu.addClass('hide');
            menu.removeAttr('style');
            button.removeClass(settings.selected);
          }
        }
      };
    });

    // ⚠️ On a supprimé $('#primary-nav').responsivenav()
    // car on utilise notre propre navbar Dinari
    jQuery(function ($) {
      $('#top-nav').responsivenav({responsive:false});
    });
	
	$('a.scrollTo').on('click', function(){
          var scrollTo = $(this).attr('data-scrollTo');
          $( "a.scrollTo" ).each(function() {
            if(scrollTo == $(this).attr('data-scrollTo')){
              $(this).addClass('active');
            }else{
              $(this).removeClass('active');
            }
          });
          $('body, html').animate({
            "scrollTop": $('#'+scrollTo).offset().top
          }, 1000 );
          return false;
        })
});