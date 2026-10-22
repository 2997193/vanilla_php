<?php
    session_start();

    if (isset($_GET["limpiar"])) {
        session_destroy();
        header("Location: calculadoraGET.php");
        exit;
    }

    if (!isset($_SESSION["numero1"])) {
        $_SESSION["numero1"] = "";
        $_SESSION["numero2"] = "";
        $_SESSION["operador"] = "";
    }

    if (isset($_GET["numero"])) {
        if ($_SESSION["operador"] == "") {
            $_SESSION["numero1"] .= $_GET["numero"];
        } else {
            $_SESSION["numero2"] .= $_GET["numero"];
        }
    }

    if (isset($_GET["operador"])) {
        $_SESSION["operador"] = $_GET["operador"];
    }

    $simbolo = $_SESSION["operador"];
    if ($simbolo == "mas") $simbolo = "+";
    if ($simbolo == "menos") $simbolo = "-";
    if ($simbolo == "por") $simbolo = "*";
    if ($simbolo == "entre") $simbolo = "/";

    if (isset($_GET["igual"])) {
        switch ($_SESSION["operador"]) {
            case "mas":
                $resultado = $_SESSION["numero1"] + $_SESSION["numero2"];
                break;
            case "menos":
                $resultado = $_SESSION["numero1"] - $_SESSION["numero2"];
                break;
            case "por":
                $resultado = $_SESSION["numero1"] * $_SESSION["numero2"];
                break;
            case "entre":
                $resultado = $_SESSION["numero2"] == 0 ? "ERROR" : $_SESSION["numero1"] / $_SESSION["numero2"];
                break;
            default:
                $resultado = "ERROR";
        }
    } else {
        $resultado = $_SESSION["numero1"] . $simbolo . $_SESSION["numero2"];
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
                            <span class="avatar"><img src="https://es.calcuworld.com/wp-content/uploads/sites/2/2013/02/matematicas-150x150.png" alt="" /></span>
                            <h2>Calculadora B&aacute;sica</h2>
                            <form name="calculator">
                            <!-- Escribe el resultado como valor de la propiedad value -->
                                <input type="textfield" name="ans" value="<?php echo $resultado; ?>" readonly>
                                <br>
                                <a href="?numero=1">1</a>
                                <a href="?numero=2">2</a>
                                <a href="?numero=3">3</a>
                                <a href="?operador=mas">+</a>
                                <br>
                                <a href="?numero=4">4</a>
                                <a href="?numero=5">5</a>
                                <a href="?numero=6">6</a>
                                <a href="?operador=menos">-</a>
                                <br>
                                <a href="?numero=7">7</a>
                                <a href="?numero=8">8</a>
                                <a href="?numero=9">9</a>
                                <a href="?operador=por">*</a>
                                <br>
                                <a href="?numero=0">0</a>
                                <a href="?limpiar=1">c</a>
                                <a href="?operador=entre">/</a>
                                <a href="?igual=1">=</a>
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
                            <li>Copyright Jane Doe</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                        </ul>
                    </footer>

            </div>

        <!-- Scripts -->
        <!-- Curso 2024/2025 -->

            <script>
                if ('addEventListener' in window) {
                    window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
                    document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
                }
            </script>

    </body>
</html>
