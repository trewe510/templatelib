<?php

require __DIR__ . '/vendor/autoload.php';

use src\Client\Speedio;

class CNPJConsultor
{
    private $speedio;

    public function __construct()
    {
        $this->speedio = new Speedio();
    }

    public function consultarCNPJ($cnpj)
    {
        $resultado = $this->speedio->consultarCNPJ($cnpj);

        if (empty($resultado)) {
            die('Problemas ao consultar CNPJ');
        }

        if (isset($resultado['error'])) {
            die($resultado['error']);
        }

        return $resultado;
    }
}

// Exemplo de uso
$consultor = new CNPJConsultor();
$resultado = $consultor->consultarCNPJ('');

if ($resultado) {
    // Processar o resultado
    print_r($resultado);
}
