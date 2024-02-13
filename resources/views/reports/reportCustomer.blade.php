<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <!-- Aquí puedes incluir cualquier CSS adicional necesario para estilizar tu reporte -->
    <style>
        /* Estilos CSS para tu reporte */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte de Clientes</h1>

    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Cliente</th>
                <th>Documento</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Correo</th>
                <th>Codeudor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->type->name }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->dni }}</td>
                    <td> {{$customer->phone}} </td>
                    <td> {{$customer->address}} </td>
                    <td> {{$customer->email}} </td>
                    <td>{{$customer->codeudor ?? 'N/A'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
