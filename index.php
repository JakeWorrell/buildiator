<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="main StyleSheet" charset="utf-8" /> 
		
		<title>Buildiator</title>
	</head>
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
		<script>
		function updateBuilds(){
			$.get('getBuilds.php', function(data){
				$('#builds').html(data);
				setTimeout('updateBuilds()', 4000);   
			});
		}
		
		$(document).ready(function(){
			updateBuilds();
			
			var count = 0;
			setInterval(function() {
				count++;
				var time = new Date().getTime();
					$('.building').animate({
						opacity: (count%2).toFixed(2),
						easing: 'swing'
					},1000)
				},
				1000
			);
		});
		
		</script>
		<ul id="builds">

		</ul>
	</body>
</html>
