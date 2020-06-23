<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Solicitud de permiso administrativo</title>
</head>
<body>

    <p>Se ha solicitado una nueva solicitud de permiso</p>
    <p>Estos son los datos de la solicitud </p>
    <li>rut: {{ $RecordSolicitud->rut }}</li>
    <li>Detalle: {{ $RecordSolicitud->detalle }}</li>
    <li>Reemplazo: {{ $RecordSolicitud->reemplazo }}</li>
    <li>Fecha hasta: {{ $RecordSolicitud->fecha_desde }}</li>
    <li>Fecha desde: {{ $RecordSolicitud->fecha_hasta }}</li>
 
</body>
</html>
