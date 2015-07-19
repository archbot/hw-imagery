/* 
 * Preload Images
 */
	$.fn.preload = function() {
	  this.each(function(){
	      $('<img/>')[0].src = this;
	  });
	};

	// Home page images
	$([	'img/couple.jpg',
			'img/couple2.jpg',
			'img/mother-son.jpg',
			'img/kids.jpg',
			'img/dogs.jpg',
			'img/nature.jpg'
		]).preload();

	// Main images for sliders
	$([	'img/2Couple/23.jpg',
			'img/4Kiddos/28.jpg',
			'img/1Family/13.jpg',
			'img/6MyLife/4568475413.jpg',
			'img/5Nature/DSC_0754.jpg'
		]).preload();

	// Thumbnails
	$([	'img/2Couple/thumb/23.jpg','img/2Couple/thumb/56.jpg','img/2Couple/thumb/DSC_0094a.jpg',
			'img/2Couple/thumb/MalooleyFam (6).jpg','img/2Couple/thumb/MalooleyFam (69).jpg','img/2Couple/thumb/DSC_0545.jpg',
			'img/4Kiddos/thumb/28.jpg','img/4Kiddos/thumb/DSC_0138.jpg','img/4Kiddos/thumb/3largebw.jpg',
			'img/4Kiddos/thumb/MalooleyFam (48).jpg','img/4Kiddos/thumb/11121.jpg','img/4Kiddos/thumb/Becca (56).jpg',
			'img/1Family/thumb/13.jpg','img/1Family/thumb/25.jpg','img/1Family/thumb/40.jpg',
			'img/1Family/thumb/73.jpg','img/1Family/thumb/Becca (9).jpg','img/1Family/thumb/DSC_0747.jpg',
			'img/1Family/thumb/kkk.jpg','img/1Family/thumb/MFP (4).jpg','img/5Nature/thumb/DSC_0754.jpg',
			'img/6MyLife/thumb/4568475413.jpg','img/6MyLife/thumb/6MyLife.jpg','img/6MyLife/thumb/Background.jpg',
			'img/6MyLife/thumb/DSC_0866.jpg','img/6MyLife/thumb/TDOG.jpg','img/6MyLife/thumb/TravisHannah1.jpg',
			'img/6MyLife/thumb/zDSC_0015.jpg']).preload();
	// End preloading of images

/*
 * Load content dynamically
 */
	function loadContent(hideThis,fileName) {
		$(hideThis).hide();
		$('#content').show().load(fileName).fadeIn('1500');
	}

	$(window).load(setTimeout(disappear(), 2000));
	  function disappear()
	  {
	    $('#main').show();
	    $('#lead').delay(1000).slideUp('slow');//.delay(1000).hide(0);
	    $('#content').load('categories.html');
	  }
  // End content loading

/*
 * Responsive image slider
 */
	$(function() {
	  $(".rslides").responsiveSlides();
	});
	// End image slider