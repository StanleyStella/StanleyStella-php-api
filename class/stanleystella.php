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

class Stst {

	// The API base HOST
	const API_SCHEME = 'http';
	const API_HOST = 'api.stanleystella.com';
	const API_PRODUCTS_PATH = 'api/v1/products';

	// The public API Key
	private $_apikey;

	// Default construct
	public function __construct($config)
	{
		if (is_array($config)) {
			$this->setApiKey($config['apiKey']);
			$this->setApiSecret($config['apiSecret']);
		} elseif (is_string($config)) {
			$this->setApiKey($config);
		} else {
			throw new Exception('Error: __construct() - Configuration data is missing.');
		}
	}

	// Search by id
	public function searchById ($value, $offset, $limit)
	{
		return $this->search([ 'id' => $value ], $offset, $limit);
	}

	// Search by colorName
	public function searchByColor ($value, $offset, $limit)
	{
		return $this->search([ 'colorName' => $value ], $offset, $limit);
	}

	// Search by colorTypeName
	public function searchByColorCode ($value, $offset, $limit)
	{
		return $this->search([ 'colorCode' => $value ], $offset, $limit);
	}

	// Search by colorTypeName
	public function searchByColorType ($value, $offset, $limit)
	{
		return $this->search([ 'colorCategoryName' => $value ], $offset, $limit);
	}

	// Search by fitName
	public function searchByFit ($value, $offset, $limit)
	{
		return $this->search([ 'fitName' => $value ], $offset, $limit);
	}

	// Search by genderCode
	public function searchByGender ($value, $offset, $limit)
	{
		return $this->search([ 'genderCode' => $value ], $offset, $limit);
	}

	// Search by sizeName
	public function searchBySize ($value, $offset, $limit)
	{
		return $this->search([ 'sizeName' => $value ], $offset, $limit);
	}

	// Search by rangeName
	public function searchByRange ($value, $offset, $limit)
	{
		return $this->search([ 'rangeName' => $value ], $offset, $limit);
	}

	// Search with any filters
	public function search ($filters, $offset, $limit)
	{
		$filters['offset'] = $offset;
		$filters['limit'] = $limit;

		$url = (
			self::API_SCHEME .
			'://' .
			self::API_HOST .
			'/' .
			self::API_PRODUCTS_PATH .
			'?' .
			http_build_query($filters)
		);
		
		$headerData = [
			'Authorization: Bearer ' . $this->getApiKey() . '',
			'Content-Type: application/json'
		];

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headerData);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
		curl_setopt($ch, CURLOPT_TIMEOUT, 90);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);

		$result = curl_exec($ch);

		curl_close($ch);

		return json_decode($result);
	}

	// API Key Setter
	public function setApiKey ($apiKey)
	{
		$this->_apiKey = $apiKey;
	}

	// API Key Getter
	public function getApiKey ()
	{
		return $this->_apiKey;
	}

	// API Secret Setter
	public function setApiSecret ($apiSecret)
	{
		$this->_apiSecret = $apiSecret;
	}

	// API Secret Getter
	public function getApiSecret ()
	{
		return $this->_apiSecret;
	}
}

?>
