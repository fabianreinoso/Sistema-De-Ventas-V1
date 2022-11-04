<?php

include '../bd/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT pro.promocion, pro.duracion , pro.id_cliente, cli.nombre , cli.apellido ,cli.direccion, cli.email , cli.telefono , cli.rfc
  FROM promociones pro
  INNER JOIN clientes cli ON cli.id_cliente = pro.id_cliente
  WHERE pro.id = ?;");
$sentencia->execute([$codigo]);
$cliente = $sentencia->fetch(PDO::FETCH_OBJ);

    $url = 'https://whapi.io/api/send';
    $data = [
        "app" => [
            "id" => '51901293802',
            "time" => '1654728819',
            "data" => [
                "recipient" => [
                    "id" => '51'.$cliente->telefono
                ],
                "message" => [[
                    "time" => '1654728819',
                    "type" => 'text',
                    "value" => 'Estimado(a) *'.strtoupper($cliente->nombre).' '.strtoupper($cliente->apellido).' '.'* No se pierda *'.strtoupper($cliente->promocion).'* valido solo *'.$cliente->duracion.'*'
                ]]
            ]
        ]
    ];
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    header('Location: agregarPromocion.php?codigo='.$cliente->id_cliente);
?>
