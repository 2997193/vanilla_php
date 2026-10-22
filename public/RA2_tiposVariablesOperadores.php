<?php
   $codCiclo  = "DAW";     
   $horas     = 2000;      
   $notaCorte = 8.75;      
   $activo    = true;      

   echo '<p>', $codCiclo, ' — ', $horas, ' horas — nota de corte ', $notaCorte, '</p>';

   echo '<pre>';
   var_dump($codCiclo, $horas, $notaCorte, $activo);
   echo '</pre>'; 

   define("NOMBRE_CENTRO", "CIFP Carlos III");
   define("CODIGO_CENTRO", "30012345");

   $horasTotales  = 2000;
   $horasCursadas = 1350;
   echo '<p>Horas restantes: ', $horasTotales - $horasCursadas, '</p>';

   $codCiclo = "10";   // string
   $idCiclo  = 10;     // int

   echo '<pre>';
   var_dump($codCiclo == $idCiclo);    // ¿qué esperas? = true, debido a que lo transforma y compara
   var_dump($codCiclo === $idCiclo);   // ¿y aquí? = false
   echo '</pre>';

   echo NOMBRE_CENTRO;
   echo CODIGO_CENTRO;
   
   /*
echo 1 <=> 2;   // -1  (izquierdo menor)
echo '</br>';
echo 2 <=> 2;   //  0  (iguales)
echo '</br>';
echo 3 <=> 2;   //  1  (izquierdo mayor)
 echo '</br>';
echo "a" <=> "b"; // -1  (orden alfabético)
echo '</br>';
echo 1.5 <=> 1.5; //  0


echo '</br>';
echo '</br>';

//ejemplo con mi codigo
echo '</br>';
echo $codCiclo <=> $idCiclo; // 0 - iguales
echo '</br>';
echo $horasCursadas <=> $horasTotales; // -1 izq menor 
echo '</br>';
echo $horasTotales <=> $horasCursadas; // 1 izq mayor
echo '</br>';
echo "a" <=> "b"; -1 alfabetico
echo '</br>';
echo "z" <=> "a"; 1 al reves
*/


?>