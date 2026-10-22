<?php
define('NOMBRE_CENTRO', 'CIFP Carlos III');

$curriculos = [
    ['alumno' => 'Ana López',    'ciclo' => 'DAW',  'video' => 'https://youtu.be/curriculo1'],
    ['alumno' => 'Marcos Pérez', 'ciclo' => 'DAM',  'video' => 'https://youtu.be/curriculo2'],
    ['alumno' => 'Laura García', 'ciclo' => 'ASIR', 'video' => 'https://youtu.be/curriculo3'],
    ['alumno' => 'Youssef Lamine', 'ciclo' => 'DAW', 'video' => 'https://youtu.be/curriculo4'],
    ];


  function mostrarCurriculo(array $curriculo) {
    foreach($curriculo as $valor){  
    echo `<li>`, $valor['alumno'], `</li>`, ' — ', $valor['ciclo'],' — <a href="', $valor['video'], '">vídeo</a></li></br>';
    }
  }


mostrarCurriculo($curriculos);
