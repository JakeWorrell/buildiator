<?php
require_once ('lib/MockCI.php');
require_once ('lib/JenkinsCI.php');
require_once ('lib/Exceptions.php');

$result = '';
if (isset($_GET['view'])) {
	$ci = new JenkinsCI($_GET['view']);
} else {
	$ci = new JenkinsCI();
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
