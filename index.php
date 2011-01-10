<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="main StyleSheet" charset="utf-8" /> 
		<title>Buildiator</title>
	</head>
	<body>
		<ul>
<?php	
			require_once ('lib/MockCI.php');
			require_once ('lib/HudsonCI.php');
			$ci = new MockCI('http://' . gethostname() . ':8080');
			//$ci = new HudsonCI('http://' . gethostname() . ':8080');
			$jobs = $ci->getAllJobs();
			foreach ($jobs as $job) {
				echo "\t\t\t<li class = 'build " . implode(" ",$job['status'] ) . "'>{$job['name']}</li>\n";
			}
?>
		</ul>
	</body>
</html>
