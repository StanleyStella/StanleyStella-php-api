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
    const API_URL = 'https://api.instagram.com/v1/';

    /* The public API Key. */
    private $_apikey;

    /* The Private API key */
    private $_apisecret;

    /* Default construct  */
    public function __construct($config)
    {
        if (is_array($config)) {
            // if you want to access user data
            $this->setApiKey($config['apiKey']);
            $this->setApiSecret($config['apiSecret']);
        } elseif (is_string($config)) {
            // if you only want to access public data
            $this->setApiKey($config);
        } else {
            throw new StanleyStellaException('Error: __construct() - Configuration data is missing.');
        }
    }

    /* Search by id */
    public function searchById($value){

    }

    /* Search by colorName */
    public function searchByColor($value){

    }

    /* Search by colorCategoryName */
    public function searchByColorCategory($value){

    }

    /* Search by colorTypeName */
    public function searchByColorType($value){

    }

    /* Search by fitName */
    public function searchByFit($value){

    }

    /* Search by genderName */
    public function searchByGender($value){

    }

    /* Search by rangeName */
    public function searchByRange($value){

    }

    /* Search by sizeName */
    public function searchBySize($value){

    }

    /* Search by certificationName */
    public function searchByCertification($value){

    }

    /* Mixed search */
    public function searchMixed($array){

    }

    public function callApi($params){
    	/* Create the call */
		$opts = array(
		  'http'=>array(
		    'method'=>"GET",
		    'header'=>"Authorization: Bearer ".$this->getApiKey().""
		  )
		);

		$context = stream_context_create($opts);

		/* Open the file using the HTTP headers set above */
		$result = file_get_contents(self::API_URL.'/api/v1/products?', false, $context);

		return $result;
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
}


?>