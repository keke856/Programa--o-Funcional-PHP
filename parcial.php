<?php
  /*
  function dividirPor2($dividendo ,$divisor,){

       return $dividendo / $divisor;
  }


  echo dividirPor2(4,2);

  */

  /*
  function dividir($divisor):Closure{

    return fn ($dividendo)=> $divisor / $dividendo ;
  
  }

  echo dividir(4) (2);

  */



  /*
  function calcular($divisor) {
    return $divisor / 2;
 }
 

  function dividir(){

   return function($divisor){
       return  calcular($divisor);
    
     };
  
  }

  echo  dividir()(4).PHP_EOL;

  echo  dividir()(8).PHP_EOL;
  echo  dividir()(14).PHP_EOL;
*/


function calcular($divisor,$dividendo) {
    return  $dividendo / $divisor ;
 }
 


function dividir($divisor){

    return function($dividendo) use ($divisor){
        return  calcular($divisor,$dividendo);
     
      };
   
   }
 
   $dividir = dividir(2);
 
   
   echo $dividir(4).PHP_EOL;
   echo $dividir(8).PHP_EOL;
   echo $dividir(10).PHP_EOL;

   // arrow-functions:https://cursos.alura.com.br/extra/alura-mais/novidades-do-php-7-4-arrow-functions-c130