<?php
declare(strict_types=1);
require_once __DIR__ . '/Curriculo.php';

 /**
  * Cuenta cuántos currículos hay de cada ciclo.
  *
  * @param list<Curriculo> $curriculos
  * @return array<string, int> Código del ciclo => número de currículos, en orden de aparición.
  */
 function contarPorCiclo(array $curriculos): array
 {
     $cuenta = [];
     foreach ($curriculos as $curriculo) {
         $codigo = $curriculo->ciclo->codCiclo;
         $cuenta[$codigo] = isset($cuenta[$codigo]) ? ++$cuenta[$codigo] : 1;
     }

     return $cuenta;
 }

 /** Porcentaje (redondeado a entero) que representa $parte sobre $total. */
 function porcentaje(int $parte, int $total): int
 {
        if ($total === 0) {
        return 0;
    }

     return (int)( ($parte / $total ) * 100); 
     // si total es 0 devuelve  Uncaught DivisionByZeroError es una excpecion predefinida que se lanza al intentar dividir por cero
     //Podria ocurrir que el array sea vacio y el total sea 0, en ese caso se podria devolver 0 o lanzar una excepcion personalizada
     //para proteger que no sea 0 se podria hacer un if y lanzar una excepcion personalizada que diga que el total no puede ser 0, o devolver 0 como porcentaje
     //el como proceder depende de lo que se quiera hacer en la aplicacion, podriamos decidir que si no hay curriculos, el porcentaje es 0
     //se podria hacer un if ($total === 0) return 0; }antes dla division para evitar la excepcion y devolver 0 como porcentaje
 }