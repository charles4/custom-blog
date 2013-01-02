window.onload = function () {
	//select all forms
	var forms = $('.comment_form');
	//setup form submit via ajax
	$.each(forms, function(){ this.onsubmit=submit_onclick;});
	function submit_onclick() {
		var id = this.getAttribute('id');
		var content = $('#input'+id).val();
		var address = this.children[2].value;
		var my_canary = $('#canary').val(); 
		$.get('addcomment.php', { postid : id , body : content, email : address, canary : my_canary});
		$('#input'+id).val('');
		return false;
	}

	//setup comment refresh loop
	var commentareas = $('.comments');
	$.each(commentareas, function(){addGetLooper(this);});
	
	function addGetLooper(area){
		var latest_comment = 0, id = $(area).attr('id'), commentgetter = new XMLHttpRequest();
		//clear out the ---no comments--- thing
		$(area).html("");
		commentgetter.onreadystatechange = function () {
			if (this.readyState==4 && this.status==200) {
            			var data = JSON.parse(this.responseText);
            			for (var i in data) {
                			var comment = data[i].body;
					var escapedHTML = $('<span/>').text(comment).html();
					var email = data[i].user_id;
					var comment_id = data[i].id;
					$(area).append(  "<div id='comment"+comment_id+"' class='acomment'>" + '<span class=commenttext>"' + escapedHTML + '" --' + email + '.</span>' +"</div>"  );
					$('#comment'+comment_id).prepend("<span class='myid hidden'>" + comment_id + "</span>");
					setlatestcomment(comment_id);
            			}

        		}
    		};
		function setlatestcomment(id){  latest_comment = id;   }
	
		function getcomments(){
			commentgetter.open('GET', 'getcomments.php?postid=' + id +"&id=" + latest_comment + "&canary="+$('#canary').val(), true);
			commentgetter.send();
		}
		
		setInterval(getcomments, 1000);
		
	}	
	
}
