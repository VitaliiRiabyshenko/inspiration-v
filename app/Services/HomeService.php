<?php


namespace App\Services;

use Illuminate\Support\Facades\Log;



class HomeService
{
	public function postLogging($data)
	{
		Log::channel('application')->info('User application:', [
			'name_a' => $data['name_a'],
			'surname_a' => $data['surname_a'],
			'age_a' => $data['age_a'],
			'full_name' => $data['full_name'],
			'select_country' => $data['select_country'],
			'type_visa' => $data['type_visa'],
		]);
	}

	public function isSpam($data)
	{
		if($data['name_a'] !== 'Dockfender' || $data['surname_a'] !== 'Panda' || $data['age_a'] !== null) {
			return true;
		}
		return false;
	}

	public function createApplication($data)
	{
		return $application_data = [
			'full_name' => $data['full_name'],
			'email' => $data['email'],
			'country' => $data['select_country'],
			'visa_types' => json_encode($data['type_visa'])
		];
	}
}