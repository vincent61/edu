<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Vincent Mercier">
	<link rel="stylesheet" href="vue/css/bootstrap.min.css">
	<link rel="stylesheet" href="vue/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="vue/css/stylesheetCustom.css">
	<link rel="shortcut icon" href="vue/img/brain.ico">
</head>

<body>
	<div class="meny">
		<h2>A venir</h2>
		<ul>
			<li><a href="#">Blacklist (TO DO)</a></li>
			<li><a href="#">Liste des Participants (TO DO)</a></li>
		</ul>
	</div>

	<div class="meny-arrow"></div>

	<div class="contents">
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Rem'Humain'Inge</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">


						<li >
							<img id="pause" class="headerButton" src="vue/img/pause.png"/>
						</li>
						<li >
							<img id="stop" class="headerButton" src="vue/img/stop.png"/>
						</li>
					</ul>
					<form class="navbar-form navbar-right" role="form">
						<div class="form-group">
							<input type="text" placeholder="Email" class="form-control">
						</div>
						<div class="form-group">
							<input type="password" placeholder="Password" class="form-control">
						</div>
						<button type="submit" class="btn btn-custom-darken">Sign in</button>
					</div><!--/.nav-collapse -->

				</div>

			</div>



			<article>
				<img id="trash" src="vue/img/trash.png"/>
				<div id="container">

				</div>	

			</article>

		</div>

	</body>


	<script src="vue/js/jquery-1.10.2.js"></script>
	<script src="vue/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="vue/js/meny.min.js"></script>
	<script src="vue/js/libEDU.js"></script>
	<script src="vue/js/bootstrap.min.js"></script>


	<script>

			// Create an instance of Meny
			var meny = Meny.create({
				// The element that will be animated in from off screen
				menuElement: document.querySelector( '.meny' ),

				// The contents that gets pushed aside while Meny is active
				contentsElement: document.querySelector( '.contents' ),

				// [optional] The alignment of the menu (top/right/bottom/left)
				position: Meny.getQuery().p || 'left',

				// [optional] The height of the menu (when using top/bottom position)
				height: 200,

				// [optional] The width of the menu (when using left/right position)
				width: 260,

				// [optional] Distance from mouse (in pixels) when menu should open
				threshold: 40,

				// [optional] Use mouse movement to automatically open/close
				mouse: true,

				// [optional] Use touch swipe events to open/close
				touch: true
			});

			// API Methods:
			// meny.open();
			// meny.close();
			// meny.isOpen();

			// Events:
			// meny.addEventListener( 'open', function(){ console.log( 'open' ); } );
			// meny.addEventListener( 'close', function(){ console.log( 'close' ); } );

			// Embed an iframe if a URL is passed in
			if( Meny.getQuery().u && Meny.getQuery().u.match( /^http/gi ) ) {
				var contents = document.querySelector( '.contents' );
				contents.style.padding = '0px';
				contents.innerHTML = '<div class="cover"></div><iframe src="'+ Meny.getQuery().u +'" style="width: 100%; height: 100%; border: 0; position: absolute;"></iframe>';
			}

			$('#pause').click(function(){
				if($(this).attr("src")=="vue/img/play.png")
					$(this).attr("src", "vue/img/pause.png");
				else
					$(this).attr("src", "vue/img/play.png");
			});



// Lancement de la Web APP
$( document ).ready(function() {


	launchWebApp();

});
</script>

</html>