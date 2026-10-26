<?php
const URL_DEFECTO = "https://miro.medium.com/max/4800/1*r2fR_OBcBCSUtfLLaTX3JA.png";
//la idea es que si no hay post muestre cookie y si no que se muestre la imagen por defecto y lo almaceno en una variabel
$imagen = $_POST['ans'] ?? $_COOKIE['img'] ?? URL_DEFECTO;

//si hay post se almacena en cookie y se muestra la imagen de la cookie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //cambio de verificacion 'ans' para poder usar los sliders de colores sin tener que poner nada en el input
    
    if (strlen($_POST['ans']) > 0) {
        //si hay post se almacena en cookie y se muestra la imagen de la cookie 
        //si saco el setcookie de aqui se guardaria con un valor vcio
        $url = $_POST['ans'];
        $cookie_name = "img";
        $cookie_value = $_POST['ans'];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 15), "/"); // 86400 = 1 dia
    } else {
        $url = $_COOKIE['img'] ?? URL_DEFECTO;
    }

    //seccion colores
    $rojo = $_POST['rojo'];
    $verde = $_POST['verde'];    
    $azul = $_POST['azul'];
    //establecemos las cookies para los colores
    setcookie("rojo", $rojo, time() + (86400 * 15), "/");
    setcookie("verde", $verde, time() + (86400 * 15), "/");
    setcookie("azul", $azul, time() + (86400 * 15), "/");
    $color = "rgb($rojo, $verde, $azul)";
}else{
    //si no hay post se muestra la imagen de la cookie(s es qeu la recibo) o la imagen por defecto
    $url = $_COOKIE['img'] ?? URL_DEFECTO;
    //lo mismo para los colores, si no hay post se muestra el color de la cookie o el color blanco por defecto
    $rojo = $_COOKIE['rojo'] ?? 255;
    $verde = $_COOKIE['verde'] ?? 255;
    $azul = $_COOKIE['azul'] ?? 255;
    $color = "rgb($rojo, $verde, $azul)";
}
    
?>

<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Identity by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="Referrer" content="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="https://html5up.net/uploads/demos/identity/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="https://html5up.net/uploads/demos/identity/assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main">
        <header>
            <span class="avatar"><img src="<?= $url ?>" alt="" width="256px"/></span>
            <h2>Elecci&oacute;n de colores</h2>
            <form name="calculator" action="" method="post">
                <!-- Escribe el resultado como valor de la propiedad value -->
                <input type="textfield" name="ans" value=""  style="background-color:<?= $color ?>">
                <br>
                <label for="rojo">Rojo:</label>
                <input type="range" name="rojo" value="<?= $rojo ?>" min="0" max="255">
                <label for="verde">Verde:</label>
                <input type="range" name="verde" value="<?= $verde ?>" min="0" max="255">
                <label for="azul">Azul:</label>
                <input type="range" name="azul" value="<?= $azul ?>" min="0" max="255">
                <input type="submit" value="Mostrar color">
                <input type="reset" value="Cancelar">
            </form>

        </header>

        <footer>
            <ul class="icons">
            </ul>
        </footer>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <ul class="copyright">
            <li>&copy; Jane Doe</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </footer>

</div>

<!-- Scripts -->
<script>
    if ('addEventListener' in window) {
        window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
        document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
    }
</script>

</body>
</html>
<!-- Documento HTML-->
