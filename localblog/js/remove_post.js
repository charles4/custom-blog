$(document).ready(function(){
	$.each($('.removepostlink'), function(){
		$(this).click(function(){
		return confirm('Are you sure?');
		});
	});
});
