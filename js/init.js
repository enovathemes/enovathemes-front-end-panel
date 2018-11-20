(function($){

	"use strict";

	$('.efp-body').niceScroll({
		cursorcolor:'#9a9a9a',
		cursoropacitymin:0.8,
		cursoropacitymax:1,
		cursorwidth:'6px',
		cursorborderradius:'6px',
		scrollspeed:'100',
		mousescrollstep:'60',
		background:'#616161',
		cursorborder: "none",
		zindex: "15"
	});

	$('.efp-toggle-main').on('click',function(){
		$('.efp').toggleClass('active');
	});

	$('.efp-select').on('change',function(){
		window.location.replace($(this).val());
	});

	$('.efp-select').each(function(){
		$(this).find('option').each(function(){
			var $this = $(this);
			if (window.location.href == $this.val()) {
				$this.attr('selected','selected').siblings().removeAttr('selected');
			}
		});
	});

	$('.efp-check').each(function(){

		$(this).find('a').eq(0).addClass('active').addClass('icon-efp-checked');
		
		$(this).find('a').each(function(){
			var $this = $(this);
			if (window.location.href == $this.attr('href')) {
				$this
				.addClass('active')
				.addClass('icon-efp-checked')
				.siblings()
				.removeClass('active')
				.removeClass('icon-efp-checked')
			}
		});
	});

	$('.efp-demos-list-container').each(function(){

		var $this = $(this);
		$this.imagesLoaded( function() {

			var $grid = $this.find('.efp-demos-list').isotope({
				itemSelector: '.efp-demos-list-item',
			});

			$this.find('.efp-filter .filter').on( 'click', function() {
				var $filter  = $(this),
					filterValue = $filter.attr('data-filter'),
					isActive = $filter.hasClass( 'active' );
				if ( !isActive ) {
					$grid.isotope({ filter:'.'+filterValue });
					$this.find('.efp-filter .active').removeClass('active');
					$filter.toggleClass('active');
				}
			});
		
		});

	});

})(jQuery);