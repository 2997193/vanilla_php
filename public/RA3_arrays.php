 <?php
   $curriculos = [
    ['alumno' => 'Ana López',    'ciclo' => 'DAW',  'video' => 'https://youtu.be/curriculo1'],
    ['alumno' => 'Marcos Pérez', 'ciclo' => 'DAM',  'video' => 'https://youtu.be/curriculo2'],
    ['alumno' => 'Laura García', 'ciclo' => 'ASIR', 'video' => 'https://youtu.be/curriculo3'],
    ];

   $ciclos = ['DAW', 'DAM'];
   $ciclos[] = 'ASIR';

   echo '<p>Número de ciclos: ', count($ciclos), '</p>';
   echo '<p>', in_array('SMR', $ciclos, true) ? 'SMR ofertado' : 'SMR no ofertado', '</p>';
   
   $ciclo = [
    'codCiclo' => 'DAW',
    'nombre'   => 'Desarrollo de Aplicaciones Web',
    'modulos'  => [
      '0612' => 'Desarrollo web en entorno cliente',
      '0613' => 'Desarrollo web en entorno servidor',
      '0614' => 'Despliegue de aplicaciones web',
      '0615' => 'Diseño de interfaces web',
    ],
  ];
    echo '<ul>';
  foreach ($ciclo['modulos'] as $codigo => $nombre) {
    echo '<li class="modulo">', $codigo, ' — ', $nombre, '</li>';
  }
  echo '</ul>';
  echo '<pre>';
  print_r($ciclo);
  echo '</pre>';

    $alumnos = array_column($curriculos, 'alumno');
    sort($alumnos);
    echo '<p>Alumnos: ', implode(', ', $alumnos), '</p>';
    //0

  [$primero, $segundo] = ['DAW', 'DAM', 'ASIR'];
  ['alumno' => $alumno, 'ciclo' => $codCiclo] = $curriculos[1];
  echo '<p>Segundo currículo: ', $alumno, ' (', $codCiclo, ')</p>';
for($i = 0; $i < count($curriculos); $i++){
['alumno' => $alumno, 'ciclo' => $codCiclo] = $curriculos[$i];
echo '<p>',$i,' currículo: ', $alumno, ' (', $codCiclo, ')</p>';

}
  $copia = $curriculos;
  $copia[] = ['alumno' => 'Pablo Ruiz', 'ciclo' => 'DAW', 'video' => ''];
  echo '<p>Original: ', count($curriculos), ' · Copia: ', count($copia), '</p>';

  $notas = ['Marcos Pérez' => 7.25, 'Laura García' => 9, 'Ana López' => 8.5];
  $notasSort = $notas;
  $notasAsort = $notas;
  $notasKsort = $notas;
  sort($notasSort);
  asort($notasAsort);
  ksort($notasKsort);
  echo '<pre>';
  print_r($notasSort);
  print_r($notasAsort);
  print_r($notasKsort);
  echo '</pre>';

  // sort ordena por valor y cambia las claves a 0, 1, 2.
  // asort ordena por valor y conserva las claves.
  // ksort ordena por clave, o sea, por nombre.
  // Con sort se pierden los nombres, asi que ya no sabemos de quien es cada nota.
 ?>

