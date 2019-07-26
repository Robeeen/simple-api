<?php
require_once 'config.php';

class API{

	public function Select(){
		$db = new Connect;
		$data = $db->prepare('SELECT * FROM users ORDER BY id');
		$data->execute();
		$users = array();
		while($outputdata = $data->fetch(PDO::FETCH_ASSOC)){
			$users[$outputdata['id']] = array(
				'id' 		=> $outputdata['id'],
				'name'		=> $outputdata['name'],
				'location'	=> $outputdata['location'],
				'age'		=> $outputdata['age'],
				'sex'		=>	$outputdata['sex'],
				'designation' => $outputdata['designation']
			);
		}

		return json_encode($users);

	}
}

$api = new API;

	header('content-type: application/json');
	echo $api->Select();
