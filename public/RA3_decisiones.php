<?php

  $grado = 'Superior';

  if ($grado === 'Superior') {
    echo '<p>Ciclo de Grado Superior: da acceso a la universidad.</p>';
  } elseif ($grado === 'Medio') {
    echo '<p>Ciclo de Grado Medio: da acceso a un Grado Superior.</p>';
  } else {
    echo '<p>Grado desconocido.</p>';
  }

  $videoCurriculum = 'https://youtu.be/curriculo1';
  $textoCurriculum = '';

  if ($videoCurriculum !== '' && $textoCurriculum !== '') {
    echo '<p>Currículo completo</p>';
  } elseif ($videoCurriculum !== '' || $textoCurriculum !== '') {
    echo '<p>Currículo incompleto</p>'; 
  } else {
    echo '<p>Currículo vacío</p>';
  }

    $codFamilia = 'INF';

  $familia = match ($codFamilia) {
    'INF'   => 'Informática y Comunicaciones',
    'ADG'   => 'Administración y Gestión',
    'COM'   => 'Comercio y Marketing',
    default => 'Familia desconocida',
  };

  echo '<p>Familia profesional: ', $familia, '</p>';

  $grado = 'Superior';
  $titulo = $grado === 'Superior' ? 'Técnico Superior' : 'Técnico';
  echo '<p>Titulación: ', $titulo, '</p>';

  $curriculo = ['alumno' => 'Ana López', 'ciclo' => 'DAW'];
  echo '<p>Vídeo: ', $curriculo['video'] ?? 'Sin vídeo de presentación', '</p>';

$publicado = true;
if ($publicado):
  echo '<p class="estado">Currículo publicado</p>';
else: 
  echo '<p class="estado">Currículo en borrador</p>';
endif; 

// Sintaxis alternativa: if (condición): ... else: ... endif.
// Con $publicado = true se muestra "Currículo publicado" en Ctrl+U no aparece
// el parafo "Currículo en borrador" porque no se ejecuta

// En PHP se convierten en false: false, 0, 0.0, -0.0, '', '0', [], null
// y valores no definidos por eso if ('0') muestra "no": la cadena '0' es
// el único texto que PHP considera false. En cambio if ('0.0') muestra "sí":
// '0.0' no es una cadena vacía ni la cadena exacta '0'.
?>