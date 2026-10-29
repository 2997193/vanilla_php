<?php
declare(strict_types=1);

 require_once __DIR__ . '/../src/RA4_comun.php';

 iniciarSesion();
 $usuario = exigirLogin();

 $mensaje = $_SESSION['mensaje'] ?? null;
 unset($_SESSION['mensaje']);

 /*
 Al acceder directamente a perfil sin iniciar sesion nos ridirige automaticamnete a login. 
 codigo de estado al entrar a perfil es 302 Found, y la respuesta tiene un location = RA4_login.php;
---
 al entrar con un email correcto y una contraseña incorrecta, me da una respuesta que añade a la web un <p> que dice Email o contraseña incorrectos.
 Lo mismo ocurre si fallamos en el correo pero no la contraseña, mismo mensaje para no dar pistas de cual ha fallado. 
---
antes de entrar el valor de phpsseid= 3e4133ef8c0dc6c6b1dc686454633bb1
despues de entrar= 7149692b314c27e7c351c52adff6776a

------|TERMINAR EJERCICIOS|------    
 */
 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
   <meta charset="UTF-8">
   <title>Mi área — <?= NOMBRE_CENTRO ?></title>
 </head>
 <body>
   <h1><?= NOMBRE_CENTRO ?> — Mi área</h1>

   <?php if ($mensaje !== null): ?>
     <p class="exito"><?= e($mensaje) ?></p>
   <?php endif; ?>

   <p>Usuario: <?= e($usuario['firstName'] . ' ' . $usuario['lastName']) ?></p>
   <p>Email: <?= e($usuario['email']) ?></p>
   <p>Rol: <?= e($usuario['rol']) ?></p>

   <form action="RA4_logout.php" method="post">
     <button type="submit">Cerrar sesión</button>
   </form>
 </body>
 </html>
 