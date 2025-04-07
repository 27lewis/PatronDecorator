<!DOCTYPE html>
<html lang="es">
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Tipo cono: <select name="tipo">
                <option>Sencillo</option>
                <option>Doble</option>
            </select>
            <br><br>
            <input type="checkbox" name="SalsaChocolate">Salsa de Chocholate
            <br><br>
            <input type="checkbox" name="Fresas">Fresas
            <br><br>
            <input type="checkbox" name="GalletaOreo">Galleta Oreo
            <br><br>
            <input type="submit" value="Ordernar">

        </form>


        <?php

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                require "Clases.php";
                $tipo = $_POST['tipo'];
                $helado = null;
                if($tipo == "Sencillo"){
                    $helado = new ConoSencillo();
                }else{
                    $helado = new ConoDoble();
                }

                if(isset($_POST['SalsaChocolate'])){
                    $helado = new SalsaChocholate($helado);
                }
                if(isset($_POST['Fresas'])){
                    $helado = new Fresas($helado);
                }
                if(isset($_POST['GalletaOreo'])){
                    $helado = new GalletaOreo($helado);
                }
                echo "<br>" . $helado->getDescripcion() . " vale " . $helado->getPrecio();
            }
        ?>


    </body>
</html>




