
$().ready(function() {
	var currentImage = 0;
	var nextImage = new Image();
	var nextnextImage = new Image();
	var req = $.ajax({
		url: "getbackgroundpaths.php",
		dataType: 'json',
		success: function(data){
			
		//load first image and cycle through images
			$('#backgrounds').append("<div class='background'></div>");
			$('.background').css('background-image', "url('" + data[currentImage].path + "')").fadeIn(5000).delay(3000).fadeOut(5000, function(){$(this).remove();});
					
			preloadNextImages();
			setInterval(nextImage, 14000);

			function nextImage(){
				if(currentImage < data.length){
					currentImage++;
					$('#backgrounds').append("<div class='background'></div>");
					$('.background').css('background-image', "url('" + nextImage.src +  "')").fadeIn(5000).delay(3000).fadeOut(5000, function(){$(this).remove();});
					preloadNextImages();
				}else{
					currentImage = 0;
					$('#backgrounds').append("<div class='background'></div>");
					$('.background').css('background-image', "url('" + nextImage.src + "')").fadeIn(5000).fadeOut(5000, function(){$(this).remove();});	
				}
			}
			//preloads next 2 images
			function preloadNextImages(){
				if(currentImage < (data.length-2)){
					console.log("preloading..." + data[currentImage+1].path + " and " +data[currentImage+2].path);
					nextImage.src = data[currentImage+1].path;
					nextnextImage.src = data[currentImage+2].path;			
				}
			}
		}//end of ajax() success
	});//end of ajax()
	
});//end of on ready()



