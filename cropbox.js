$(document).ready(function(){
	var $cropbox = $("#cropbox");
	var $crop_button = $("#crop_button");
	var $image = $("img");
	var $name = $("p.name");
	var $nicknames = $("p.nicknames");
	var $agenda = $("p.agenda");

	$cropbox.draggable({containment: 'img'});

	$cropbox.resizable({containment: '#containerbox', aspectRatio: true});

	$crop_button.click(function(){

	 	var top = $cropbox.position().top;
	 	var left = $cropbox.position().left;
	 	var width = $cropbox.width();
	 	var height = $cropbox.height();

	 	var imageLoc = document.getElementById("tempLoc").src;
	 	var profileName = $name.text();
	 	var profileNicknames = $nicknames.text();
	 	var profileAgenda = $agenda.text();
	 	// document.write(imageLoc);

		$.post('crop.php', {'top':top, 'left':left, 'width':width, 'height':height, 
			'iWidth':iWidth, 'iHeight':iHeight, 'imageLoc':imageLoc,
			'profileName': profileName, 'profileNicknames': profileNicknames, 'profileAgenda': profileAgenda}, 
		function(){
			$(location).attr('href', "index.php")
		});
		
	});

})		
