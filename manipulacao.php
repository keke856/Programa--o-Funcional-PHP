<?php

$dados = require 'dados.php';

$contador = count($dados);
echo "Número de países: $contador\n";



$novoArray = array_map(function(array $paises){

     $paises['pais'] = mb_convert_case($paises['pais'],MB_CASE_UPPER );

     return $paises;
    
},$dados);

var_dump($novoArray);