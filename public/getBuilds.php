<?php
require_once (__DIR__ .'/../lib/MockCI.php');
require_once (__DIR__ .'/../lib/JenkinsCI.php');
require_once (__DIR__ .'/../lib/Exceptions.php');

$result = '';
if (isset($_GET['view'])) {
	$ci = new JenkinsCI('http://ci.jenkins-ci.org/',$_GET['view']);
} else {
	$ci = new JenkinsCI('http://ci.jenkins-ci.org/');
}

try {
	$jobs = $ci->getAllJobs();
} catch (BuildiatorCIServerCommunicationException $e) {
	$result = array('status'  => 'error',
					'content' => $e->getMessage());
}

if (!is_array($result)) {
	$html = '';
	foreach ($jobs as $job) {
		$blame = null;
		if ($job['status'][0] == 'failed') {
			$blame = "<br /><span class='blame'>{$job['blame']}</span>" ;
		}
		$html .="<li class = 'job " . implode(" ",$job['status'] ) . "'>{$job['name']}{$blame}</li>";
	}

	$result = array('status'  => 'ok',
					'content' => $html);
}

echo json_encode($result);
?>
