<?php


  require_once 'vendor/autoload.php';

  
$dados = require 'dados.php';

$contador = count($dados);
echo "Número de países: $contador\n";


 

 $upperCase = fn(array $paises)=> mb_convert_case($paises['pais'],MB_CASE_UPPER );

 $novoArray = fn()=>array_map($upperCase,$dados);



 /*
$novoArray = array_map(function(array $paises){

     $paises['pais'] = mb_convert_case($paises['pais'],MB_CASE_UPPER );

     return $paises;
    
},$dados);
*/
    

//var_dump($novoArray);




// Conceito com callback

// Função para verificar espaço
function verificaEspaco(array $paises){


     return strpos($paises['pais'],' ' ) !== false;
}

// Função resumida
 $verificaEspaço = fn(array $paises)=> strpos($paises['pais'],' ' ) !==false;

$arrayComFiltro = fn()=> array_filter($dados, $verificaEspaço );

//var_dump($arrayComFiltro);


function pipe(callable ...$function){
        
   return fn($valor)=>array_reduce($function,fn($valorAcumulado , $funcaoAtual)=>$funcaoAtual($valorAcumulado),$valor);

}


//$pipe = pipe($novoArray,$arrayComFiltro);




$pipe  = pipe($novoArray, $arrayComFiltro);
 $dados =$pipe($dados);

 var_dump($dados);
exit();



//inicio

function medalhas(int $acumulativa, int $medalhas){

     return   $acumulativa + $medalhas;
 }

/*

$brasil = $dados[0];

echo array_reduce($brasil['medalhas'],function(int $acumulativa, int $medalhas){

    return   $acumulativa + $medalhas;
},0);

*/


 array_reduce($novoArray,function(int $acumula, array $pais){

     return   $acumula + array_reduce($pais['medalhas'],'medalhas',0);
 },0);


 //fim



 $teste =  usort($novoArray,function(array $teste1, array $teste2){

    $teste1 = $teste1['medalhas'];
    $teste2 = $teste2['medalhas'];

       $medalhasOuro = $teste1['ouro'] <=> $teste2['ouro'];
       $medalhasPrata = $teste1['prata'] <=> $teste2['prata'];

    return $medalhasOuro !==0 ? $medalhasOuro:($medalhasPrata !==0 ? $medalhasPrata: $teste1['bronze'] <=> $teste2['bronze']);

 });

 //var_dump($teste);