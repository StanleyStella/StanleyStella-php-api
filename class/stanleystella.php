<?php

/**
 * Stanley & Stella API class
 *
 * API Documentation: http://api.stanleystella.com/developer/
 * Class Documentation: https://github.com/StanleyStella/StanleyStella-php-api
 *
 * @author Julien Henrotte
 * @since 29.04.2016
 * @copyright Julien Henrotte - Stanley & Stella
 * @version 0.1
 * @license  GNU GENERAL PUBLIC LICENSE
 */

class stst{

	/* The API base URL. */
	const API_URL = 'http://stanleystellaapi.cloudapp.net';

	/* The public API Key. */
	private $_apikey;

	/* The Private API key */
	private $_apisecret;

	/* Default construct  */
	public function __construct($config)
	{
		if (is_array($config)) {
			$this->setApiKey($config['apiKey']);
			$this->setApiSecret($config['apiSecret']);
		} elseif (is_string($config)) {
			$this->setApiKey($config);
		} else {
			throw new StanleyStellaException('Error: __construct() - Configuration data is missing.');
		}
	}

	/* Search by id */
	public function searchById($value){
		$result = $this->callApi('id='.$value);
		return $result;
	}

	/* Search by colorName */
	public function searchByColor($value){
		$value = $this->spaceManage($value);
		$result = $this->callApi('colorName='.$value);
		return $result;
	}

	/* Search by colorTypeName */
	public function searchByColorType($value){
		$value = $this->spaceManage($value);
		$result = $this->callApi('colorCategoryName='.$value);
		return $result;
	}

	/* Search by colorTypeName */
	public function searchByColorCode($value){
		$result = $this->callApi('colorCode='.$value);
		return $result;
	}

	/* Search by fitName */
	public function searchByFit($value){
		$value = $this->spaceManage($value);
		$result = $this->callApi('fitName='.$value);
		return $result;
	}

	/* Search by genderName */
	public function searchByGender($value){
		$result = $this->callApi('genderCode='.$value);
		return $result;
	}

	/* Search by rangeName */
	public function searchByRange($value){
		$result = $this->callApi('rangeName='.$value);
		return $result;
	}

	/* Search by sizeName */
	public function searchBySize($value){
		$value = $this->upper($value);
		$result = $this->callApi('sizeName='.$value);
		return $result;
	}

	/* Search by certificationName */
	// public function searchByCertification($value){
	// 	$value = $this->spaceManage($value);
	// 	$result = $this->callApi('certificationName='.$value);
	// 	return $result;
	// }

	/* Mixed search */
	public function searchMixed($array){
		$i = 0;
		$numItems = count($array);
		$search = '';
		foreach ($array as $key => $value) {
			if (++$i === $numItems) {
				$search .= $key.'='.$value.'';        
			}else{
				$search .= $key.'='.$value.'&';
			}
		}
		$result = $this->callApi($search);
		return $result;
	}

	protected function callApi($query){

		$apiCall = self::API_URL . '/api/v1/products?' . $query;
		$headerData = array(
			'method'=>"GET",
			'header'=>"Authorization: Bearer ".$this->getApiKey()."",
			'Content-Type: application/json',
			'Accept: application/json'
			);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $apiCall);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headerData);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
		curl_setopt($ch, CURLOPT_TIMEOUT, 90);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);

		$result = curl_exec($ch);

		curl_close($ch);
		return json_decode($result);
	}

	/* API Key Setter */
	public function setApiKey($apiKey)
	{
		$this->_apikey = $apiKey;
	}

	/* API Key Getter */
	public function getApiKey()
	{
		return $this->_apikey;
	}

	/* API private Key Setter */
	public function setApiSecret($apiSecret)
	{
		$this->_apisecret = $apiSecret;
	}

	/* API private Key Getter */
	public function getApiSecret()
	{
		return $this->_apisecret;
	}

	public function spaceManage($string)
	{
		$string = preg_replace('/\s+/', '%20', $string);
		return $string;
	}

	public function upper($string){
		$string = strtoupper($string);
		return $string;
	}
}


?>