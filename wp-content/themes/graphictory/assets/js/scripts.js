/** ***************************************
	
    @Author			Avanzare
	@Website		www.avanzare.co
	@Last Update	08:26 PM Tuesday, Nov 04, 2014

	TABLE OF CONTENTS
	---------------------------
	 1. Preloader + Animation
	 2. Mobile Detect
     3. Background
	 4. Cycle
	 5. Overlay
	 6. Ajax Subscribe
	 7. Ajax Contact
		
 ** ***************************************/
 

/**	1. PRELOADER + ANIMATION
 *****************************************************/
$(window).load(function() {
	
	$('.socket').addClass('animated fadeOut');	
	
	//PARALLAX
	$('body').parallax({
	  scalarX: 25,
	  scalarY: 15,
	  frictionX: 0.1,
	  frictionY: 0.1,
	});
	
	  setTimeout(function() {
		  $('#prelaoder').addClass('animated fadeOut').fadeOut(2000);	
	  
		  setTimeout(function() {
			  $('#home-screen .content-block img.logo').addClass('animated fadeInDown');
			  
			  setTimeout(function() {
				  $('#home-screen .content-block h1').addClass('animated fadeInUp');	
				  
				  setTimeout(function() {
					  $('#home-screen .content-block p').addClass('animated fadeInUp');
					  
					  setTimeout(function() {
						  $('.arrow-wrap').addClass('animated fadeInUp');
					  
						  setTimeout(function() {
							  $('#canvas-container').addClass('animated fadeInUp');  
		  
							  setTimeout(function() {
								  activeOverlays = 1;
								  $('#canvas-container').css('opacity','1');  
								  $('.arrow-wrap').css('opacity','1');
								  $('#home-screen .content-block p').css('opacity','1');
								  $('#home-screen .content-block h1').css('opacity','1');
								  $('#home-screen .content-block img.logo').css('opacity','1');
								  
							  }, 1000); 
						  }, 500);
					  }, 500); 
				  }, 500);
			  }, 500);
		  }, 1000); 
	  }, 1000); 
  
});

$(document).ready( function(){

	var activeOverlays = 0;
	
	$(".overlay-content .social-icons li a").tooltip({
		container: 'body',
		delay: { "show": 100, "hide": 0 }
	});
	$(".overlay-content .social-icons li a").click(function(){
		$(this).tooltip('hide')
	});
	
});



/**	3. BACKGROUND
 *****************************************************/

$(document).ready( function(){

	// CANVAS 
	function callCanvas (canvas) {
		
		// SETTINGS
		var screenpointSplitt = 10000 
		var movingSpeed = 0.1 
		
		var viewportWidth = $(window).width();
		var viewportHeight = $(window).height();
		
		// Calculate Screen Dots
		var nbCalculated = Math.round(viewportHeight*viewportWidth/screenpointSplitt)
		
		//CONFIG
		var _this = this,
		
			ctx = canvas.getContext('2d');
	
		_this.config = {
			
			star: {
				color: 'rgba(255, 255, 255, 1)'
			},
			
			line: {
				color: 'rgba(255, 255, 255, 1)',
				width: 0.1
			},
			
			position: {
				x: canvas.width * 0.5,
				y: canvas.height * 0.5
			},
			
			velocity: movingSpeed,
			length: nbCalculated,
			distance: 120,
			radius: 120,
			stars: []
			
		};
		
		function Star () {
			this.x = Math.random() * canvas.width;
			this.y = Math.random() * canvas.height;
	
			this.vx = (_this.config.velocity - (Math.random() * 0.3));
			this.vy = (_this.config.velocity - (Math.random() * 0.3));
	
			this.radius = Math.random();
		}
	
		Star.prototype = {
			create: function(){
				ctx.beginPath();
				ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
				ctx.fill();
			},
	
			animate: function(){
				var i;
				for(i = 0; i < _this.config.length; i++){
	
					var star = _this.config.stars[i];
	
					if(star.y < 0 || star.y > canvas.height){
						star.vx = star.vx;
						star.vy = - star.vy;
					}
					else if(star.x < 0 || star.x > canvas.width){
						star.vx = - star.vx;
						star.vy = star.vy;
					}
					star.x += star.vx;
					star.y += star.vy;
				}
			},
	
			line: function(){
				var length = _this.config.length,
					iStar,
					jStar,
					i,
					j;
	
				for(i = 0; i < length; i++){
					for(j = 0; j < length; j++){
						iStar = _this.config.stars[i];
						jStar = _this.config.stars[j];
	
						if(
							(iStar.x - jStar.x) < _this.config.distance &&
							(iStar.y - jStar.y) < _this.config.distance &&
							(iStar.x - jStar.x) > - _this.config.distance &&
							(iStar.y - jStar.y) > - _this.config.distance
						) {
							if(
								(iStar.x - _this.config.position.x) < _this.config.radius &&
								(iStar.y - _this.config.position.y) < _this.config.radius &&
								(iStar.x - _this.config.position.x) > - _this.config.radius &&
								(iStar.y - _this.config.position.y) > - _this.config.radius
							) {
								ctx.beginPath();
								ctx.moveTo(iStar.x, iStar.y);
								ctx.lineTo(jStar.x, jStar.y);
								ctx.stroke();
								ctx.closePath();
							}
						}
					}
				}
			}
		};
	
		_this.createStars = function () {
			var length = _this.config.length,
				star,
				i;
	
			ctx.clearRect(0, 0, canvas.width, canvas.height);
			for(i = 0; i < length; i++){
				_this.config.stars.push(new Star());
				star = _this.config.stars[i];
	
				star.create();
			}
	
			star.line();
			star.animate();
		};
	
		_this.setCanvas = function () {
			canvas.width = window.innerWidth;
			canvas.height = window.innerHeight;
		};
	
		_this.setContext = function () {
			ctx.fillStyle = _this.config.star.color;
			ctx.strokeStyle = _this.config.line.color;
			ctx.lineWidth = _this.config.line.width;
		};
	
		_this.loop = function (callback) {
			callback();
	
			reqAnimFrame(function () {
				_this.loop(function () {
					callback();
				});
			});
		};
	
		_this.bind = function () {
			$(window).on('mousemove', function(e){
				_this.config.position.x = e.pageX;
				_this.config.position.y = e.pageY;
			});
		};
	
		_this.init = function () {
			_this.setCanvas();
			_this.setContext();
	
			_this.loop(function () {
				_this.createStars();
			});
	
			_this.bind();
		};
	  
	  return _this;
	}
	
    //requestAnimationFrame

	var reqAnimFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame || function (callback) {
		window.setTimeout(callback, 1000 / 60);
	};
	
	callCanvas($('canvas')[0]).init();	
	
	//Resize Canvas 
	var waitForFinalEvent = (function () {
	  var timers = {};
	  return function (callback, ms, uniqueId) {
		if (!uniqueId) {
		  uniqueId = "Don't call this twice without a uniqueId";
		}
		if (timers[uniqueId]) {
		  clearTimeout (timers[uniqueId]);
		}
		timers[uniqueId] = setTimeout(callback, ms);
	  };
	})();
	
	$(window).resize(function () {
		waitForFinalEvent(function(){
			callCanvas($('canvas')[0]).init();	

		}, 400, "some unique string");
	});

});
$(document).ready( function(){
	
	$('#bg-image').backstretch([
		'assets/img/1.jpg'
	  , 'assets/img/2.jpg'
	  , 'assets/img/3.jpg'
	  , 'assets/img/4.jpg'
	], {duration: 5500, fade: 500});

});
$(document).ready( function(){
	
	// SET BACKGROUND PARALLAX
    $('#bg-image').css('transform', 'scale(1.06)');
    $('#bg-image .backstretch').attr('data-depth', 0.1);
	$('#bg-image .backstretch').addClass('layer');
	$('#wrapper_mbYTP_bgndVideo').css('transform', 'scale(1.06)');
    $('#bg-video').attr('data-depth', 0.1);
	$('#bg-video').addClass('layer');

});

/**	4. CYCLE
 *****************************************************/
$(document).ready( function(){
	
	$('.slider').cycle({
		fx : 'fade',
		timeout: 7000,
		delay: 1000,
		speed: 500,
		slides: '.slide'
	});
	
});


