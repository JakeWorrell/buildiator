<?php
/**
 * Description of HudsonCI
 *
 * @author jake
 */

require_once 'base/ContinuousIntegrationServerInterface.php';

class HudsonCI implements ContinuousIntegrationServerInterface{
	private $url;
	
	function __construct($url) {
		$this->url = $url;
	}
	
	public function getAllJobs() {
		$json = file_get_contents($this->url . '/api/json?tree=jobs[name,color]');
		$jobs = json_decode($json);
		foreach ($jobs->jobs as $job) {
			$newjob = array('name'=>$job->name, 'status'=>$this->translateColorToStatus($job->color));
			$return[] = $newjob;
		}
		return ($return);
	}
	
	private function translateColorToStatus($color){
		switch($color){
			case 'blue':
				return array('successful');
			case 'blue_anime':
				return array('successful','building');
			case 'red':
				return array('failed');
			default:
				return array('unknown');
		}
	}
}

?>
