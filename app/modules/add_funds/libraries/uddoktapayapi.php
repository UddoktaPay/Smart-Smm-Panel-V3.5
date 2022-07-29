<?php defined('BASEPATH') OR exit('No direct script access allowed');

class uddoktapayapi {
    
	private $api_key;
	private $api_url;
	
	
	
	public function __construct($api_key = null, $api_url = null) {
		if ($api_key != "" && $api_url != "") {
			$this->api_key = $api_key;
			$this->api_url = $api_url;
		}
	}

	/**
	 *
	 * Define Payment && Create payment.
	 *
	 */
	public function create_payment($data = ""){
	    // Setup request to send json via POST.
        $headers = [];
        $headers[] = "Content-Type: application/json";
        $headers[] = "RT-UDDOKTAPAY-API-KEY:" . $this->api_key;
    
        // Contact UuddoktaPay Gateway and get URL data
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response);
        return $result;

	}

	/**
	 *
	 * Execute payment 
	 *
	 */
	public function execute_payment(){

        $response = file_get_contents('php://input');

        if (!empty($response)) {

            // Decode response data
            $data     = json_decode($response, true);

            $apiKey = trim($this->api_key);
            $signature = trim($_SERVER['HTTP_RT_UDDOKTAPAY_API_KEY']);

            // Validate Signature
            if ($apiKey !== $signature) {
                return [
                    'status'    => false,
                    'message'   => 'Invalid API Signature.'
                ];
            }

            if (is_array($data)) {
                return $data;
            }
        }

        return [
            'status'    => false,
            'message'   => 'Invalid response from UddoktaPay API.'
        ];
	}
}








