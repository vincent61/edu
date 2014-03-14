function randomFromTo(from, to){
	return Math.floor(Math.random() * (to - from + 1) + from);
}



function animateDiv(obj, newX, newY) {
	var newq = makeNewPosition(obj.parent());
	//console.log(newq);
	var oldq = obj.offset();
	if(obj.hasClass("movable")){
		obj.animate(
		{
			left: [newX,'easeInOutQuart'], 
			top: [newY,'linear']}, 
			randomFromTo(3000, 8000), 
			function() {
				moveRandom(obj);
			});
//obj.animate({rotate: '30deg', scale: '1.25'}, 1000);
}
};

function makeNewPosition(container, obj) {

    // Get viewport dimensions (remove the dimension of the div)
    container = (container || $(window))
    
    var h = container.height();
    var w = container.width()-180 ;

    var nh = Math.floor(Math.random() * h);
    var nw = Math.floor(Math.random() * w);

    return [nh, nw];

}




function moveRandom(obj) {
	/* get container position and size*/
	var res=makeNewPosition($('#container'), obj);
	newX=res[1];
	newY=res[0];
	animateDiv(obj, newX, newY);
}




function maj(tableauDeMots)
{

	$.each(tableauDeMots, function (key, value){
		if(!$('#'+key).length > 0)
		{
			var cHeight = $('#container').height();
			var cWidth = $('#container').width();

			//Création de l'objet dans la vue
			$("#container").append('<div class="movable" id="'+key+'"> '+value['valeur']+'</div>');  
			
			$('#'+key).offset({ top: cHeight+500, left:randomFromTo(0,cWidth)});

			// Mise en mouvement de l'objet
			$('#'+key).css({
				"position":"absolute" 
			});
			moveRandom($('#'+key));
			$('#'+key).draggable({ cursor: "pointer" });
			$('#'+key).css('cursor', 'pointer');
			$('#'+key).css({
				"position":"relative" 
			});
			//Lorsque l'on clique sur l'objet il ne bouge plus
			$('#'+key).mousedown(function(e)
			{
				stopMovement($('#'+key));
			});

			 


		}
	});

	$( "#trash" ).droppable({
		hoverClass: "trashHover",
		tolerance: 'touch',
		drop: function( event, ui ) {
			$( this )
			.addClass( "ui-state-highlight" );
			$( this ).addClass( "full" );

			var src = $('#trash').attr("src").replace("trash.png", "trashFull.png");
			$('#trash').attr("src", src);
			//HIDE : evite de décaler les autre label à la suppression du courant. Il n'est supprimer qu'en base mais est juste mis hors du scope du navigateur.
			ui.draggable.offset({ top: 50000,left: 50000});
			deleteCall(ui.draggable.text().substring(1,ui.draggable.text().length));
		}
	});
}





function stopMovement(obj)
{
	obj.removeClass( 'movable' );
	pos=obj.offset();
	y=pos.left;
	x=pos.top;
	obj.stop(true,true);
	obj.offset({ top: x, left: y});
}

function launchWebApp() {
	var request = $.ajax({
		url: "controleur/ajax.php",
		type: "GET",            
		dataType: "html"
	});

	request.done(function(msg) { 
		tableauDeMots = JSON.parse(msg);
		maj(tableauDeMots);		 
		setTimeout(launchWebApp, 1000);
		//console.log('refresh');
		request.fail(function(jqXHR, textStatus) {
			alert( "Request failed: " + textStatus );
		});
	});
}

function deleteCall(mot) {
	var request = $.ajax({
		url: "controleur/deleteAjax.php?mot="+mot,
		type: "GET",            
		dataType: "html"
	});

	request.done(function(msg) { 
		request.fail(function(jqXHR, textStatus) {
			alert( "Request failed: " + textStatus );
		});
	});
}
