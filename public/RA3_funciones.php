<?php
declare(strict_types=1);
require_once __DIR__ . '/../src/RA3_funciones.php';

 $curriculos = [
     ['alumno' => 'Marcos Pérez', 'ciclo' => 'DAM',  'video' => 'https://youtu.be/curriculo2'],
     ['alumno' => 'Laura García', 'ciclo' => 'ASIR', 'video' => null],
     ['alumno' => 'Ana López',    'ciclo' => 'DAW',  'video' => 'https://youtu.be/curriculo1'],
 ];
 ?>
 <p>Horas restantes: <?= horasRestantes(2000, 1350) ?></p>
 <p>Titulación: <?= titulacion() ?></p>
 <ul>
   <?php foreach (ordenarPorAlumno($curriculos) as $curriculo): ?>
     <li class="curriculo"><?= $curriculo['alumno'] ?> — <?= enlaceVideo($curriculo['video']) ?></li>
   <?php endforeach; ?>
 </ul>
 <?php
/*Con strict_types en la pagina, '2000' da TypeError: espera un int sin el PHP lo convierte y devuelve 650 
strict_types afecta a las llamadas.*/
?>