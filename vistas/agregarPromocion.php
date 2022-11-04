<?php
session_start();
if (isset($_SESSION['usuario'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>categorias</title>
        <?php include "menu.php"; ?>
    </head>

    <body>

        <?php
        include_once "../bd/conexion.php";
        $codigo = $_GET['codigo'];

        $sentencia = $bd->prepare("select * from clientes where id_cliente = ?;");
        $sentencia->execute([$codigo]);
        $cliente = $sentencia->fetch(PDO::FETCH_OBJ);

        $sentencia_promocion = $bd->prepare("select * from promociones where id_cliente = ?;");
        $sentencia_promocion->execute([$codigo]);
        $promocion = $sentencia_promocion->fetchAll(PDO::FETCH_OBJ);
        //print_r($persona);
        ?>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            Ingresar datos para Promocion:  <br> <span class="text-primary"> <?php echo $cliente->nombre . ' ' . $cliente->apellido ?>  </span> 
                        </div>
                        <form class="p-4" method="POST" action="registrarPromocion.php">
                            <div class="mb-3">
                                <label class="form-label">Promocion: </label>
                                <input type="text" class="form-control" name="txtPromocion" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Duración de la Promocion: </label>
                                <input type="text" class="form-control" name="txtDuracion" autofocus required>
                            </div>
                            <div class="d-grid">
                                <input type="hidden" name="codigo" value="<?php echo $cliente->id_cliente; ?>">
                                <P></P>
                                <input type="submit" class="btn btn-primary" value="Registrar">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            Lista de Promociones
                        </div>
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Promocion</th>
                                        <th scope="col">Duracion</th>
                                        <th scope="col" colspan="3">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($promocion as $dato) {
                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $dato->id; ?></td>
                                            <td><?php echo $dato->promocion; ?></td>
                                            <td><?php echo $dato->duracion; ?></td>
                                            <td><a class="text-primary" href="enviarMensaje.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-cursor"></i></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>
<?php
} else {
    header("location:../index.php");
}
?>