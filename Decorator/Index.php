<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="a.css">
    </head>
    <body>
        <h1>Heladeria Il Gelato</h1>
        <div class="Container">
            <img src="ppp323.webp"  alt="Helado">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label>Tipo cono:</label>
                <select name="tipo">
                    <option>Sencillo</option>
                    <option>Doble</option>
                </select>
                <br><br>
                <input type="checkbox" name="SalsaChocolate"> Salsa de Chocolate
                <br><br>
                <input type="checkbox" name="Fresas"> Fresas
                <br><br>
                <input type="checkbox" name="GalletaOreo"> Galleta Oreo
                <br><br>
                <input type="submit" value="Ordenar">
            </form>
        </div>

     

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                require "Clases.php";
                $tipo = $_POST['tipo'];
                $helado = $tipo == "Sencillo" ? new ConoSencillo() : new ConoDoble();

                if (isset($_POST['SalsaChocolate'])) {
                    $helado = new SalsaChocholate($helado);
                }
                if (isset($_POST['Fresas'])) {
                    $helado = new Fresas($helado);
                }
                if (isset($_POST['GalletaOreo'])) {
                    $helado = new GalletaOreo($helado);
                }

                $mensaje = $helado->getDescripcion() . " vale " . $helado->getPrecio();

                echo "<div class='mensaje-flotante'>$mensaje</div>";
            }
         ?>



    </body>
</html>




