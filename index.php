<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="main StyleSheet" charset="utf-8" /> 
		
		<title>buildiator</title>
	</head>
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
		<script>
		var lastdata;
		function updateJobs(){
			$.get('getBuilds.php', function(data){
				if (data != lastdata){
					lastdata = data;
					$('#jobs').html(data);
				}
				setTimeout('updateJobs()', 5000);   
			});
		}
		
		$(document).ready(function(){
			updateJobs();
			
			var count = 0;
			setInterval(function() {
				count++;
				var time = new Date().getTime();
					op = (count%2).toFixed(2)
					$('.building').animate({
						opacity: op,
						easing: 'swing'
					},1000)
				},
				1000
			);
		});
		
		</script>
		<ul id="jobs">
			<!--this is where the jobs go-->
		</ul>
	</body>
</html>
