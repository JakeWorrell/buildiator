<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="getTheme.php?type=css" type="text/css" media="screen" title="main StyleSheet" charset="utf-8" />
		<?php
			$view = $_GET['view'];
			if (isset($view) && !empty($view)) {
				echo '	<link rel="stylesheet" href="' . "$view.css" . '" type="text/css" media="screen" title="view StyleSheet" charset="utf-8" />';
			}
		?>

		<title>buildiator</title>
	</head>
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
		<script>
		var lastdata;
		function updateJobs(){
			$.getJSON('getBuilds.php?view=<?php echo $_GET['view']; ?>', function(data){
				if (data.content != lastdata){
					lastdata = data.content;
					$('#jobs').html(data.content);
				}
				setTimeout('updateJobs()', 5000);
			});


		}

		$(document).ajaxError(function() {
			//if there was an error updating, wait a bit longer and try again
			setTimeout('updateJobs()', 10000);
		});

		$(document).ready(function(){
			updateJobs();

			var count = 0;
			setInterval(function() {
				count++;
				var time = new Date().getTime();
					op = (count%2 +0.25).toFixed(2);
					if (op>1) {
						op = 1;
					}
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
