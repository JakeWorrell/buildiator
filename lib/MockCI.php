<?php

require_once 'base/ContinuousIntegrationServerInterface.php';

/**
 * Description of MockCI
 *
 * @author jake
 */
class MockCI {
	public function getAllJobs() {
		$return = array(
			array(
				'name'=>'Fake Job 1',
				'status'=>array('failed')
			),
			array(
				'name'=>'Fake Job 2',
				'status'=>array('failed','building')
			),
			array(
				'name'=>'Fake Job 3',
				'status'=>array('successful')
			),
			array(
				'name'=>'Fake Job 4',
				'status'=>array('successful','building')
			),
			array(
				'name'=>'Fake Job 5',
				'status'=>array('cancelled')
			),
			array(
				'name'=>'Fake Job 5',
				'status'=>array('cancelled','building')
			),
			array(
				'name'=>'Fake Job 1',
				'status'=>array('failed')
			),
			array(
				'name'=>'Fake Job 2',
				'status'=>array('failed','building')
			),
			array(
				'name'=>'Fake Job 1',
				'status'=>array('failed')
			),
			array(
				'name'=>'Fake Job 2',
				'status'=>array('failed','building')
			),
			array(
				'name'=>'Fake Job 5',
				'status'=>array('cancelled')
			),
			array(
				'name'=>'Fake Job 5',
				'status'=>array('cancelled','building')
			),
			array(
				'name'=>'Fake Job 3',
				'status'=>array('successful')
			),
			array(
				'name'=>'Fake Job 4',
				'status'=>array('successful','building')
			),
			array(
				'name'=>'Fake Job 5',
				'status'=>array('cancelled')
			),
				array(
				'name'=>'Fake Job 3',
				'status'=>array('successful')
			),
			array(
				'name'=>'Fake Job 4',
				'status'=>array('successful','building')
			),
			array(
				'name'=>'Fake Job 5',
				'status'=>array('cancelled','building')
			),
		);
		return ($return);
	}
}

?>
