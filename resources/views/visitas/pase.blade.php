<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pase de Visita</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; margin: 0 auto; }
        h1 { text-align: center; }
        .detalle { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pase de Visita</h1>
        <p><strong>Nombre del visitante:</strong> {{ $visita->name_persona }}</p>
        <!-- Agrega cualquier otra información relevante de la visita -->
    </div>
</body>
</html>
