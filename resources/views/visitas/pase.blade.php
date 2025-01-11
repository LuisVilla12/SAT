<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Bienes y Equipo de Cómputo</title>
</head>
<body style="font-family: sans-serif; margin: 0; padding: 0;">
    <div style="margin: ;">
        <div style="overflow: hidden;">
            <img src="{{ asset('img/header.png') }}" style="width: 50%; float: left;" alt="">
            <div style="text-align: right; font-size: 9px; float: right;">
                <p style="margin: 0px">Administracion General de Recursos y Servicios</p>
                <p style="margin: 0px">Administración Central de Operación de Recursos y Servicios</p>
                <p style="margin: 0px">Administración de Operación de Recursos y Servicios “4”</p>
                <p style="margin: 0px">Subadministración de Recursos y Servicios en Veracruz</p>
                <p style="margin: 0px">Departamento de Bienes y Servicios</p>
            </div>
        </div>
    </div>
    <div style="text-align: center; margin-bottom: 5px;">
        <h2 style="font-size: 1.5rem; font-weight: bold; color: #4a5568;">REGISTRO DE ENTRADA</h2>
    </div>
    <form style="background-color: #ffffff; margin: 0 auto;">
        <!-- Tabla para la sección de Fecha y Nombre -->
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%;">
                    <label for="fecha" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">FECHA: {{ $registro->fecha_visita }}</label>
                    <br>
                    <br>
                    <label for="nombre" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">NOMBRE: {{ $registro->name_persona }}</label>
                </td>
                <td style="width: 50%;">
                    <label for="fecha" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">ADMINISTRACIÓN: ADSC DE VERACRUZ 1</label>
                    <br>
                    <br>
                    <label for="nombre" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">ÁREA: {{ $registro->area }}</label>
                </td>
            </tr>
        </table>
        <table style="width: 100%;margin-top: 10px">
            <tr>
                <td style="width: 50%;">
                    <label for="observaciones" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">MOTIVO DE VISITA: {{ $registro->motivo_visita }}</label>
                    <br>
                </td>
                <td style="width: 50%;">
                    <label for="observaciones" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">OBSERVACIONES: {{ $registro->comentarios }}</label>

                    <br>
                </td>
            </tr>
        </table>

        <!-- Tabla para la sección de Hora Entrada y Hora Salida -->
        <table style="width: 100%;margin-top: 10px ">
            <tr>
                <td style="width: 50%; ">
                    <label for="hora_salida" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">HORA ENTRADA: {{ $registro->hora_entrada }}</label>

                </td>
                <td style="width: 50%;">
                    <label for="hora_salida" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">HORA SALIDA: {{ $registro->hora_salida ?? 'Sin Registro' }}</label>
                </td>
            </tr>
        </table>

        <!-- Firmas -->
        <table style="width: 100%; border-spacing: 10px; margin-top: 40px;">
            <tr>
                <td style="width: 25%; text-align: center;">
                    <label for="">_________________________</label>
                    <br>
                    <label style="font-size: 13px; font-weight: 500; color: #4a5568; text-transform: uppercase;">FIRMA DEL PORTADOR AL INGRESAR</label>
                </td>
                <td style="width: 25%; text-align: center;">
                    <label for="">_________________________</label>
                    <br>
                    <label style="font-size: 13px; font-weight: 500; color: #4a5568; text-transform: uppercase;">FIRMA DEL PORTADOR AL SALIR</label>
                </td>
                <td style="width: 25%; text-align: center;">
                    <br>
                    <label for="">_________________________</label>
                    <br>
                    <label style="font-size: 13px; font-weight: 500; color: #4a5568; text-transform: uppercase;">NOMBRE Y FIRMA DE REVISIÓN GUARDIA SEGURIDAD (ENTRADA)</label>
                </td>
                <td style="width: 25%; text-align: center;">
                    <br>
                    <label for="">_________________________</label>
                    <br>
                    <label style="font-size: 13px; font-weight: 500; color: #4a5568; text-transform: uppercase;">NOMBRE Y FIRMA DE REVISIÓN GUARDIA SEGURIDAD (SALIDA)</label>
                </td>
            </tr>
        </table>
    </form>
    {{-- COPIA --}}
    <div style="margin-top:40px;">
        <div style="overflow: hidden;">
            <img src="{{ asset('img/header.png') }}" style="width: 50%; float: left;" alt="">
            <div style="text-align: right; font-size: 9px; float: right;">
                <p style="margin: 0px">Administracion General de Recursos y Servicios</p>
                <p style="margin: 0px">Administración Central de Operación de Recursos y Servicios</p>
                <p style="margin: 0px">Administración de Operación de Recursos y Servicios “4”</p>
                <p style="margin: 0px">Subadministración de Recursos y Servicios en Veracruz</p>
                <p style="margin: 0px">Departamento de Bienes y Servicios</p>
            </div>
        </div>
    </div>
    <div style="text-align: center; margin-bottom: 5px;">
        <h2 style="font-size: 1.5rem; font-weight: bold; color: #4a5568;">REGISTRO DE ENTRADA</h2>
    </div>
    <form style="background-color: #ffffff; margin: 0 auto;">
        <!-- Tabla para la sección de Fecha y Nombre -->
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%;">
                    <label for="fecha" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">FECHA: {{ $registro->fecha_visita }}</label>
                    <br>
                    <br>
                    <label for="nombre" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">NOMBRE: {{ $registro->name_persona }}</label>
                </td>
                <td style="width: 50%;">
                    <label for="fecha" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">ADMINISTRACIÓN: ADSC DE VERACRUZ 1</label>
                    <br>
                    <br>
                    <label for="nombre" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">ÁREA: {{ $registro->area }}</label>
                </td>
            </tr>
        </table>
        <table style="width: 100%;margin-top: 10px">
            <tr>
                <td style="width: 50%;">
                    <label for="observaciones" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">MOTIVO DE VISITA: {{ $registro->motivo_visita }}</label>
                    <br>
                </td>
                <td style="width: 50%;">
                    <label for="observaciones" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">OBSERVACIONES: {{ $registro->comentarios }}</label>

                    <br>
                </td>
            </tr>
        </table>

        <!-- Tabla para la sección de Hora Entrada y Hora Salida -->
        <table style="width: 100%;margin-top: 10px ">
            <tr>
                <td style="width: 50%; ">
                    <label for="hora_salida" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">HORA ENTRADA: {{ $registro->hora_entrada }}</label>

                </td>
                <td style="width: 50%;">
                    <label for="hora_salida" style="font-size: 0.875rem; font-weight: 500; color: #4a5568; text-transform: uppercase;">HORA SALIDA: {{ $registro->hora_salida ?? 'Sin Registro' }}</label>
                </td>
            </tr>
        </table>

        <!-- Firmas -->
        <table style="width: 100%; border-spacing: 10px; margin-top: 40px;">
            <tr>
                <td style="width: 25%; text-align: center;">
                    <label for="">_________________________</label>
                    <br>
                    <label style="font-size: 13px; font-weight: 500; color: #4a5568; text-transform: uppercase;">FIRMA DEL PORTADOR AL INGRESAR</label>
                </td>
                <td style="width: 25%; text-align: center;">
                    <label for="">_________________________</label>
                    <br>
                    <label style="font-size: 13px; font-weight: 500; color: #4a5568; text-transform: uppercase;">FIRMA DEL PORTADOR AL SALIR</label>
                </td>
                <td style="width: 25%; text-align: center;">
                    <br>
                    <label for="">_________________________</label>
                    <br>
                    <label style="font-size: 13px; font-weight: 500; color: #4a5568; text-transform: uppercase;">NOMBRE Y FIRMA DE REVISIÓN GUARDIA SEGURIDAD (ENTRADA)</label>
                </td>
                <td style="width: 25%; text-align: center;">
                    <br>
                    <label for="">_________________________</label>
                    <br>
                    <label style="font-size: 13px; font-weight: 500; color: #4a5568; text-transform: uppercase;">NOMBRE Y FIRMA DE REVISIÓN GUARDIA SEGURIDAD (SALIDA)</label>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
