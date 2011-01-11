<?php	
require_once ('lib/MockCI.php');
require_once ('lib/HudsonCI.php');
$ci = new MockCI('http://' . gethostname() . ':8080');
$ci = new HudsonCI('http://' . gethostname() . ':8080');
$jobs = $ci->getAllJobs();
foreach ($jobs as $job) {
	echo "<li class = 'job " . implode(" ",$job['status'] ) . "'>{$job['name']}</li>";
}
?>