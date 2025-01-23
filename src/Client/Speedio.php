<?php

namespace src\Client;

class Speedio 
{
    /**
     * URL base da API
     * @var string
     */
    const URL_BASE = 'https://api-publica.speedio.com.br';

    /**
     * @param string $cnpj
     * @return [type]
     */
    public function consultarCNPJ($cnpj){
        return $this->get('/buscarcnpj?cnpj=' .$cnpj);    
    }

    public function get($resource){

        $endpoint = self::URL_BASE.$resource;
        
        //INICIA O CURL
        $curl = curl_init();

    curl_setopt_array( $curl, [
        CURLOPT_URL => $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'GET'
    ]);
    
    $response = curl_exec($curl);

    curl_close($curl);

    $responseArray = json_decode($response, true);

    return is_array($responseArray) ? $responseArray : [];
}

}