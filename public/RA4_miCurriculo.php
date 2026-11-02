<?php
declare(strict_types=1);
require_once __DIR__ . '/../src/RA4_comun.php';

 iniciarSesion();
 $usuario = exigirRol('alumno'); //exigo explicitamente el rol alumno con la funcion creada, hace uso esa funcion de exigir login, y esa misma hace uso de usuarioActual que nos da un return $_SESSION['usuario'] ?? null

 $ciclos    = catalogoCiclos();
 $validador = new ValidadorCurriculo($ciclos);
 $nombre    = $usuario['firstName'] . ' ' . $usuario['lastName'];
 $errores   = [];

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // El alumno sale de la sesión, nunca del formulario: cada uno, solo su currículo.
     $datos = [
         'alumno' => $nombre,
         'ciclo'  => $_POST['ciclo'] ?? '',
         'video'  => $_POST['video'] ?? '',
     ];
     $errores = $validador->validar($datos);

     if ($errores === []) {
         $guardado = $validador->crearCurriculo($datos, 1);
         $_SESSION['curriculo'] = [
             'alumno' => $guardado->alumno,
             'ciclo'  => $guardado->ciclo->codCiclo,
             'video'  => $guardado->videoCurriculum ?? '',
         ];
         $_SESSION['mensaje'] = 'Currículo guardado.';

         header('Location: RA4_miCurriculo.php', true, 303);
         exit;
     }
 } else {
     // Al editar, el formulario parte de lo guardado.
     $datos = $_SESSION['curriculo'] ?? ['alumno' => $nombre, 'ciclo' => '', 'video' => ''];
 }

 // Uno por alumno, como User y Curriculo en la aplicación: el id siempre es 1.
 $curriculo = isset($_SESSION['curriculo'])
     ? $validador->crearCurriculo($_SESSION['curriculo'], 1)
     : null;

 // Formulario si no hay currículo, si se ha pedido editar o si hay errores que mostrar.
 $editando = $curriculo === null || isset($_GET['editar']) || $errores !== [];

 $mensaje = $_SESSION['mensaje'] ?? null;
 unset($_SESSION['mensaje']);

 //4.4
 //Al proceder a dar de alta el curriculo de ana, si es exitoso, me da un 303 y me redirige a miCurriculo.
 //Al querer editar mi curriculo, el metodo de la solicitud es un get, este me da mi curriculo con los datos mios escritos que puedo modificar
 // cambio el ciclo de daw a dam y le doy a guardar , vuelve a hacer un 303 y redirigir pero ahora con los cambios gaurdados.
 //vuelvo a al panel de editar y pruebo a meter <input name="alumno" value="Otra Persona"> en dentro del formulario ese campo
 //al añadri forzosamente en f12 se visualiza en el navegador con "Otra persona" escrito dentro del input
 //al pulsar a guardar, el curriculo me sigue diciendo [Currículo guardado. Ana López (DAM)
 //El nombre sigue saliendo ana lopez porq ue no coge los valores desde el input si no desde = usuario['firstName'] . ' ' . $usuario['lastName']
 //AL cerrar sesion y volver a iniciar sesion con ana, no puedo acceder a mi curriculo,me dira = Todavía no tienes currículo: rellena el formulario para darlo de alta.
 // al cerrar sesion, hacemos uso de RA4_LOGOUT, esta tiene un session_destroy(), destruye toda la informacion asociada a la session actual, por eso al acceder de vuelta no existe

 //tras iniciar sesion con elena y forzar el ingreso a RA4_miCurriculo.ph
 //me devuelve un codigo 403, este nos bloquea el acceso, y la pagina solo nos muestra un "No tienes permiso para ver esta página." lo consigue haciendo uso del exit()
 //¿Qué diferencia hay entre los códigos de estado 401 y 403? ¿Por qué una página web redirige al login en lugar de responder 401?
 //401 Unauthorized vs 403 Forbidden, la diferencia principal es en la logica de ejecucion, el 401 podriamos acceder con la opcion de que te vuelvas a reautenticar con credenciales validas en cambio el 403 no, entinde y procesa la peticion pero no permite el acceso y no la opcion de reatenticar 

 
 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
   <meta charset="UTF-8">
   <title>Mi currículo — <?= NOMBRE_CENTRO ?></title>
 </head>
 <body>
   <h1><?= NOMBRE_CENTRO ?> — Mi currículo</h1>

   <?php if ($mensaje !== null): ?>
     <p class="exito"><?= e($mensaje) ?></p>
   <?php endif; ?>

   <?php if (!$editando): ?>
     <p><?= e($curriculo->descripcion()) ?></p>
     <p>Ciclo: <?= e($curriculo->ciclo->nombre) ?> — titulación de <?= e($curriculo->ciclo->titulacion()) ?></p>
     <p>Vídeo:
       <?php if ($curriculo->videoCurriculum !== null): ?>
         <a href="<?= e($curriculo->videoCurriculum) ?>">ver vídeo</a>
       <?php else: ?>
         sin vídeo
       <?php endif; ?>
     </p>
     <p><a href="RA4_miCurriculo.php?editar=1">Editar mi currículo</a></p>
   <?php else: ?>
     <?php if ($curriculo === null): ?>
       <p>Todavía no tienes currículo: rellena el formulario para darlo de alta.</p>
     <?php endif; ?>

     <?php if ($errores !== []): ?>
       <ul class="errores">
         <?php foreach ($errores as $error): ?>
           <li><?= e($error) ?></li>
         <?php endforeach; ?>
       </ul>
     <?php endif; ?>

     <form action="RA4_miCurriculo.php" method="post">
       <p>Alumno: <?= e($nombre) ?></p>
       <p>
         <label>Ciclo
           <select name="ciclo">
             <option value="">— Elige un ciclo —</option>
             <?php foreach ($ciclos as $codigo => $ciclo): ?>
               <option value="<?= e($codigo) ?>" <?= ($datos['ciclo'] ?? '') === $codigo ? 'selected' : '' ?>><?= e($ciclo->descripcion()) ?></option>
             <?php endforeach; ?>
           </select>
         </label>
       </p>
       <p>
         <label>Vídeo de presentación (opcional)
           <input name="video" type="url" value="<?= e($datos['video'] ?? '') ?>">
         </label>
       </p>
       <button type="submit">Guardar</button>
     </form>
   <?php endif; ?>

   <p><a href="RA4_perfil.php">Volver a mi área</a></p>
 </body>
 </html>