
/* ========== owlSlider js Strat ========== */ 
  $(window).load(function() {
        $('#slider').nivoSlider();
    });
	
	
$('.showSingle').on('click', function () {
    //$(this).addClass('selected').siblings().removeClass('selected');
    $('.targetDiv').hide();
    $('#div' + $(this).data('target')).show();
});


//$('.modal').modal({backdrop: 'static', keyboard: false});

$('.user').each(function() {

	 var $this = $(this);		
    $this.popover({		
      trigger: 'click',
      placement: 'right',
      html: true,
      content: $this.find('.userInfo').html()  
    });
	
});

$(window).scroll(function(){
  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});

$('.user').popover();
$('.user').click(function () {
     $('.user').not(this).popover('hide');
});

$('.popover-content').click(function(e){	
	alert();
	})
	
 $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });

/* ========== Carousel js Strat ========== */
 
/* ========== Carousel js End ========== */
/* ========== Accodin js Strat ========== */ 
// <![CDATA[			
		$(document).ready(function () {
			$('#pageWrap ul').accordion();
		});		
		// ]]>
/* ========== Accodin js End ========== */
/* ========== Owl Carasol js Strat ========== */ 
$('#owl-example').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
	controls:false,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
        }
    }
})

$('#owl-example2').owlCarousel({
    loop:true,
    margin:0,
    responsiveClass:true,
	controls:false,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:2,
            nav:true,
        },
	1100:{
            items:3,
            nav:true,
        }
    }
})

$('#owl-example3').owlCarousel({
    loop:true,
    margin:30,
    responsiveClass:true,
	controls:false,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:2,
            nav:true,
        },
	1100:{
            items:3,
            nav:true,
        }
    }
})

$('#owl-example5').owlCarousel({
    loop:false,
    margin:30,
    responsiveClass:true,
	controls:false,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:1,
            nav:true,
        },
	1100:{
            items:1,
            nav:true,
        }
    }
})

$('#owl-example4').owlCarousel({
    loop:true,
    margin:30,
    responsiveClass:true,
	controls:false,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
        },
	1100:{
            items:3,
            nav:true,
        }
    }
})


$('#owl-example6').owlCarousel({
    loop:false,
    margin:30,
    responsiveClass:true,
	controls:false,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:1,
            nav:true,
        },
	1100:{
            items:1,
            nav:true,
        }
    }
})

$('.cronical').owlCarousel({
    loop:true,
    autoplay: true,
    margin:30,
    responsiveClass:true,
	controls:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:true
        },
        1000:{
            items:1,
            nav:true,
        },
	1100:{
            items:1,
            nav:true,
        }
    }
})


/* ========== Owl Carasol js End ========== */
/* ========== Select Dropdown js Strat ========== */ 
$(".myval").select2({
   width: "100%",
 });
/* ========== Select Dropdown js End ========== */
/* ========== Bootstrap Gallery js Strat ========== */
$('#borderless-checkbox').on('change', function () {
        var borderless = $(this).is(':checked');
        $('#blueimp-gallery').data('useBootstrapModal', !borderless);
        $('#blueimp-gallery').toggleClass('blueimp-gallery-controls', borderless);
});
/* ========== Bootstrap Gallery js End ========== */
/* ========== Bootstrap Carousel js Strat ========== */
 $('.carousel').carousel({
       pause: true,
    interval: false
    })
/* ========== Bootstrap Carousel js End ========== */
/* ========== Perfect-Scrollbar js Strat ========== */
$(document).ready(function ($) {
        $('.description').perfectScrollbar({
          wheelSpeed: 20,
          wheelPropagation: false
        });
});
/* ========== Perfect-Scrollbar js End ========== */
/* ========== News (jquery.bootstrap.newsbox) js Strat ========== */
$(function () {
        $(".demo1").bootstrapNews({
            newsPerPage: 3,
            autoplay: true,
			pauseOnHover:true,
            direction: 'up',
			navigation: false,
            newsTickerInterval: 4000,
            onToDo: function () {
                //console.log(this);
            }
        });	
    });
/* ========== News (jquery.bootstrap.newsbox) js End ========== */
(function($) {
	$(function() {
		$(".scroller").simplyScroll({orientation:'vertical',customClass:'vert'});
	});
})(jQuery);
/* ========== Back to top js Strat ========== */ 
$(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();	
		} else {
			$('#toTop').fadeOut();
		}
	});
 
	$('#toTop').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});	
});
/* ========== Back to top js End ========== */
/* ========== Form js Strat ========== */ 



(function() {
  var carouselContent, carouselIndex, carouselLength, firstClone, firstItem, isAnimating, itemWidth, lastClone, lastItem;

  carouselContent = $(".carousel__content");

  carouselIndex = 0;

  carouselLength = carouselContent.children().length;

  isAnimating = false;

  itemWidth = 100 / carouselLength;

  firstItem = $(carouselContent.children()[0]);

  lastItem = $(carouselContent.children()[carouselLength - 1]);

  firstClone = null;

  lastClone = null;

  carouselContent.css("width", carouselLength * 100 + "%");

  carouselContent.transition({
    x: "" + (carouselIndex * -itemWidth) + "%"
  }, 0);

  $.each(carouselContent.children(), function() {
    return $(this).css("width", itemWidth + "%");
  });

  $(".nav--left").on("click", function() {
    if (isAnimating) {
      return;
    }
    isAnimating = true;
    carouselIndex--;
    if (carouselIndex === -1) {
      lastItem.prependTo(carouselContent);
      carouselContent.transition({
        x: "" + ((carouselIndex + 2) * -itemWidth) + "%"
      }, 0);
      return carouselContent.transition({
        x: "" + ((carouselIndex + 1) * -itemWidth) + "%"
      }, 1000, "easeInOutExpo", function() {
        carouselIndex = carouselLength - 1;
        lastItem.appendTo(carouselContent);
        carouselContent.transition({
          x: "" + (carouselIndex * -itemWidth) + "%"
        }, 0);
        return isAnimating = false;
      });
    } else {
      return carouselContent.transition({
        x: "" + (carouselIndex * -itemWidth) + "%"
      }, 1000, "easeInOutExpo", function() {
        return isAnimating = false;
      });
    }
  });

  $(".nav--right").on("click", function() {
    if (isAnimating) {
      return;
    }
    isAnimating = true;
    carouselIndex++;
    return carouselContent.transition({
      x: "" + (carouselIndex * -itemWidth) + "%"
    }, 1000, "easeInOutExpo", function() {
      isAnimating = false;
      if (firstClone) {
        carouselIndex = 0;
        carouselContent.transition({
          x: "" + (carouselIndex * -itemWidth) + "%"
        }, 0);
        firstClone.remove();
        firstClone = null;
        carouselLength = carouselContent.children().length;
        itemWidth = 100 / carouselLength;
        carouselContent.css("width", carouselLength * 100 + "%");
        $.each(carouselContent.children(), function() {
          return $(this).css("width", itemWidth + "%");
        });
        return;
      }
      if (carouselIndex === carouselLength - 1) {
        carouselLength++;
        itemWidth = 100 / carouselLength;
        firstClone = firstItem.clone();
        firstClone.addClass("clone");
        firstClone.appendTo(carouselContent);
        carouselContent.css("width", carouselLength * 100 + "%");
        $.each(carouselContent.children(), function() {
          return $(this).css("width", itemWidth + "%");
        });
        return carouselContent.transition({
          x: "" + (carouselIndex * -itemWidth) + "%"
        }, 0);
      }
    });
  });

}).call(this);
$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});


$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });
	 });
$(function(){
	$.placeholder.shim();
});
if(Function('/*@cc_on return 8===document.documentMode@*/')()){document.documentElement.className='ie8';}
if(Function('/*@cc_on return 9===document.documentMode@*/')()){document.documentElement.className='ie9';}
/* ========== Form js End ========== */





