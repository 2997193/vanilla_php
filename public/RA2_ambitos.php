<?php
  function mostrarCiclo() {
    $nombreCiclo = "Desarrollo de Aplicaciones Web";
    echo '<p>', $nombreCiclo, '</p>';
  }

  mostrarCiclo();

  // echo $nombreCiclo;   // Warning: Undefined variable $nombreCiclo, debido a que nesta dentro de la funcion y por eso no podemos.

  $totalCiclosMostrados = 0;

  function registrarVisita() {
    global $totalCiclosMostrados;
    $totalCiclosMostrados++;
  }

  registrarVisita();
  registrarVisita();
  registrarVisita();

  echo '<p>Ciclos mostrados: ', $totalCiclosMostrados, '</p>';   // 3

  define('NOMBRE_CENTRO', 'CIFP Carlos III');


  function pie() {
    // Sin "global": las constantes son accesibles en cualquier ámbito
    echo '<footer>', NOMBRE_CENTRO, '</footer>';
  }

  pie();
    function contadorVisitas() {
    static $visitas = 0;
    $visitas++;
    echo '<p>Visita número ', $visitas, '</p>';
  }

  contadorVisitas();   // Visita número 1
  contadorVisitas();   // Visita número 2
  contadorVisitas();   // Visita número 3
  
  registrarVisita();
  registrarVisita();
  registrarVisita();
  //¿Qué son las variables superglobales de PHP? 
  //Por ejemplo las de post y get, con ellas "recogemos" los valores que pueden provenir de otros sitios.
?>