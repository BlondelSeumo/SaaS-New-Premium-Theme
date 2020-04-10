$(document).ready(function(){
	/**
	 * Sidebar Toggle
	 */
	$(".sidebar-collapse").click(function(e){
		e.preventDefault();
		$("body").toggleClass("compact");

		if($("body").hasClass("compact")){
			var date = new Date();
			date.setDate(date.getDate() + 10);
			document.cookie = "menu.collapsed = 1; expires ="+date;	
		}else{
			var date = new Date();
			date.setDate(date.getDate() - 10);
			document.cookie = "menu.collapsed =; expires ="+date;
		}

	});
	if(getCookie("menu.collapsed") && $(".sidebar-collapse").length > 0){
		$("body").addClass("compact");	
	}
  /**
   * Pricing Table
   */
	var monthly_price_table = $('#price-tables').find('.monthly');
	var yearly_price_table = $('#price-tables').find('.yearly');

	$('.switch-toggles').find('.monthly').addClass('active');
	$('#price-tables').find('.monthly').addClass('active');

	$('.switch-toggles').find('.monthly').on('click', function(){
		$(this).addClass('active');
		$(this).closest('.switch-toggles').removeClass('active');
		$(this).siblings().removeClass('active');
		monthly_price_table.addClass('active');
		yearly_price_table.removeClass('active');
	});

	$('.switch-toggles').find('.yearly').on('click', function(){
		$(this).addClass('active');
		$(this).closest('.switch-toggles').addClass('active');
		$(this).siblings().removeClass('active');
		yearly_price_table.addClass('active');
		monthly_price_table.removeClass('active');			
	});
  /**
   * Fixed Header
   */
  $(window).scroll(function(){   
    if(window.pageYOffset > 150){
      $(".home header").addClass("affix");
    }else{
      $(".home header").removeClass("affix");
    }
  });	
  /**
   * TypeJS
   */
	if($(".forPeople").length > 0) {
		var typed = new Typed(".forPeople", {
	    strings: lang.typed,
	    smartBackspace: true,
	    startDelay: 1500,
	    typeSpeed: 100,
	    backSpeed: 50,
	    backDelay: 1000,
	    loop: true
	  });  
	}     
	/**
	* Testimonials
	*/         
	if($(".testimonials").length > 0) {
		$(".testimonials").owlCarousel({
			items: 1,
	    autoplay: true,
	    loop: true,
	    autoplayTimeout: 4000,
			itemElement: 'testimonial-item'
		});
	}
	/**
	 * User avatar
	 */
	$("header .dropdown > a").click(function(e){
		e.preventDefault();
		$(".dropdown-nav").fadeToggle();
	});

	$(".form-group i.ti-eye").click(function(e){
		e.preventDefault();
		var fg = $(this).parent(".form-group");
		if($(this).hasClass("active")){
			fg.find("input[name=password]").attr("type", "password");
			$(this).removeClass("active");		
		}else{
			fg.find("input[type=password]").attr("type", "text");
			$(this).addClass("active");			
		}
	});
	$(".form-group i.ti-user").click(function(e){
		e.preventDefault();
		location.href = appurl + "/user/register";
	});	
	/**
	 * Scroll to
	 */
	$("a[rel=custom]").click(function(e){
		e.preventDefault();
		
		var href = $(this).attr("href");
		var hash = href.split("#")[1];

		if($("#" + hash).length > 0){

      var pos = $("#" + hash).position(); 
      var css = $(this).attr('class');
      $('body,html').animate({ scrollTop: pos.top-30 });
		}else{
			window.location = href;			
		}
	});

  if(typeof Clipboard == "function"){
    new Clipboard('.copy-s');  
  }  

  $(".copy-s").click(function(e){
    e.preventDefault();  
    $(this).addClass("pulse");   
  });	
});
function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}