<?php

require __DIR__. '/vendor/autoload.php';

use src\WebService\Speedio;

$obSpeedio = new Speedio;


$resultado = $obSpeedio->consultarCNPJ('');

if(empty($resultado)) {
    die('Problemas ao consultar CNPJ');
}

if(isset($resultado['error'])){
    die($resultado['error']);
}
