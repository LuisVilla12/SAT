<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pase de visita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin: 0 20px;
        }
        .content p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Detalle de Visita</h1>
    </div>
    <div class="content">
        <p><strong>ID:</strong> {{ $registro->id }}</p>
        <p><strong>Nombre de la Persona:</strong> {{ $registro->name_persona }}</p>
        <p><strong>Proveedor:</strong> {{ $proveedor->name_company }}</p>
        <p><strong>Área:</strong> {{ $registro->area }}</p>
        <p><strong>Fecha de Visita:</strong> {{ $registro->fecha_visita }}</p>
        <p><strong>Hora de Entrada:</strong> {{ $registro->hora_entrada }}</p>
        <p><strong>Hora de Salida:</strong> {{ $registro->hora_salida ?? 'Sin Registro' }}</p>
        <p><strong>Comentarios:</strong> {{ $registro->comentarios }}</p>
    </div>
</body>
</html>
