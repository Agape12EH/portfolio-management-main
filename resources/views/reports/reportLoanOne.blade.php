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

    <div class="row no-gutters">
        <div class="col-12 col-xl-6">
            <div class="card card-plain h-100">
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-lg text-dark">Nombre:</strong>
                            <strong class="text-base text-dark">
                                &nbsp; {{ $loan->customer->name }}
                            </strong>
                        </li>
                        <!-- Resto del contenido -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <div class="card card-plain h-100">
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-lg text-dark">Cedula:</strong>
                            <strong class="text-base text-dark">
                                &nbsp; {{ $loan->customer->dni }}
                            </strong>
                        </li>
                        <!-- Resto del contenido -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-md-12 p-0">
            <div class="card card-body mx-3 mx-md-4 mt-n6 p-0">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th
                                    class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ">
                                    Fecha
                                </th>
                                <th
                                    class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ">
                                    Fecha de Pago
                                </th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                    numero de cuota</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                    Abono Capital</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 me-1 ">
                                    Abono Intereses</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Valor Cuota</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Fecha de Pago</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    semaforo
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payloads[0] as $item)
                                <tr>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                            {{ $item['fecha'] ?? '' }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                            {{ $item['fechaPago'] ?? '' }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                            {{ $item['cuota'] ?? '' }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                            {{ $item['abonoCapital'] ?? '' }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                            {{ $item['abonoIntereses'] ?? '' }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                            {{ $item['total'] ?? '' }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                            {{ $item['fechaPago'] ?? '' }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                            {{ $item['semaforo'] ?? '' }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 p-0">
            <div class="card card-body mx-3 mx-md-4 mt-n6 p-0">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th
                                    class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ">
                                    Fecha
                                </th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                    Cuota
                                </th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                    Valor Cuota
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($payloads[0] as $item)
                                <tr>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                            {{ $item['fecha'] ?? 'TOTAL' }}

                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                            {{ $item['cuota'] ?? '' }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                            {{ $item['total'] ?? '' }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
