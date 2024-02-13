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
    <h1>Reporte de Préstamos</h1>

    <table>
        <thead>
            <tr>
                <th>Monto</th>
                <th>Cliente</th>
                <th>Codeudor</th>
                <th>Cuotas</th>
                <th>Taza</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <!-- Itera sobre los préstamos y muestra los datos en la tabla -->
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->amount }}</td>
                    <td>{{ $loan->customer->name }}</td>
                    <td>{{ $loan->customer->codeudor ?? 'N/A' }}</td>
                    <td> {{$loan->fees}} </td>
                    <td>
                        <span class="text-xs font-weight-bold">
                            @if ($loan->taxes === 0.01)
                                1%
                            @elseif($loan->taxes === 0.02)
                                2%
                            @elseif($loan->taxes === 0.03)
                                3%
                            @elseif($loan->taxes === 0.04)
                                4%
                            @elseif($loan->taxes === 0.05)
                                5%
                            @elseif($loan->taxes === 0.06)
                                6%
                            @elseif($loan->taxes === 0.07)
                                7%
                            @elseif($loan->taxes === 0.08)
                                8%
                            @elseif($loan->taxes === 0.09)
                                9%
                            @elseif($loan->taxes === 0.1)
                                10%
                            @else
                                manejo de casos no especificados
                            @endif
                        </span>
                    </td>
                    <td>{{ $loan->state }}</td>
                    <!-- Muestra más datos según sea necesario -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
