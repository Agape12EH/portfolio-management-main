<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4"> </div>

            <div class="container mx-auto">
                <div class="mt-6">
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <!-- Encabezado -->
                        <div class="bg-gray-100 px-4 py-3 border-b border-gray-200">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="text-lg font-semibold text-gray-700">Información del Cliente</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('reportoneloan.index', $loan) }}"
                                            class="text-gray-500 hover:text-gray-700" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Generar Reporte">
                                            <i class="fas fa-file-pdf text-lg"></i>
                                        </a>
                                        <a href="{{ route('loans.edit', $loan) }}"
                                            class="text-gray-500 hover:text-gray-700" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Editar Préstamo">
                                            <i class="fas fa-user-edit text-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Datos del cliente -->
                        <div class="px-4 py-3">
                            <div class="row">
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Nombre:</h6>
                                    <p class="text-base text-gray-600">{{ $loan->customer->name }}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Número Direccion:</h6>
                                    <p class="text-base text-gray-600">{{ $loan->customer->address }}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Correo Electrónico:</h6>
                                    <p class="text-base text-gray-600">{{ $loan->customer->email }}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Monto Prestado:</h6>
                                    <p class="text-base text-gray-600">{{ $loan->amount }}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Cédula:</h6>
                                    <p class="text-base text-gray-600">{{ $loan->customer->dni }}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Teléfono:</h6>
                                    <p class="text-base text-gray-600">{{ $loan->customer->phone }}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Número de Cuotas:</h6>
                                    <p class="text-base text-gray-600">{{ $loan->fees }}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Taza:</h6>
                                    <p class="text-base text-gray-600">{{ $loan->taxes }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <div class="flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-6">
                        <!-- Primera tabla -->
                        <div class="w-full md:w-7/12">
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <div class="bg-gray-100 px-4 py-3 border-b border-gray-200">
                                    <h6 class="text-lg font-semibold text-gray-700">Tabla de Pagos</h6>
                                </div>
                                <div class="p-4">
                                    <!-- Contenido de la primera tabla -->
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ">
                                                    Fecha
                                                </th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                    numero de cuotas</th>
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
                                                            {{ $item['cuota'] ?? '' }}
                                                        </p>
                                                    </td>

                                                    <td>
                                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                                            $ {{ $item['abonoCapital'] ?? '' }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                                            $ {{ $item['abonoIntereses'] ?? '' }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                                            $ {{ $item['total'] ?? '' }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                                            {{ $item['fechaPago'] ?? '' }}
                                                        </p>
                                                    </td>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        <a href="{{ route('payments.create', ['loan' => $loan->id, 'cuota' => $item['cuota']]) }}"
                                                            class="btn btn-lg bg-gradient-success btn-sm w-40 mt-2 mb-0">
                                                            <span class="material-icons text-sm me-2">reply</span>
                                                        </a>
                                                    </th>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        {{-- <tfoot>
                                            <tr>
                                                 <th colspan="2"></th> <!-- Celdas vacías para compensar las columnas -->
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Capital</th>
                                                <td class="text-sm text-center font-weight-bold">
                                                    //{{ sum($payloads[0]['abonoCapital']) }}
                                                </td>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Intereses</th>
                                                <td class="text-sm text-center font-weight-bold">
                                                   // {{ $payloads[0]->sum('abonoIntereses') }}
                                                </td>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Préstamo</th>
                                                <td class="text-sm text-center font-weight-bold">
                                                    {{ $payloads[0]->sum('total') }}
                                                </td>
                                                <th></th> <!-- Celda vacía para compensar las columnas -->
                                            </tr>
                                        </tfoot> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Segunda tabla -->
                        <div class="w-full md:w-5/12">
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <div class="bg-gray-100 px-4 py-3 border-b border-gray-200">
                                    <h6 class="text-lg font-semibold text-gray-700">Resumen de Pagos</h6>
                                </div>
                                <div class="p-4">
                                    <!-- Contenido de la segunda tabla -->
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ">
                                                    Fecha
                                                </th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                    numero de cuotas</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Valor Cuota</th>
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
                                                            {{ $item['cuota'] ?? '' }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                                            $ {{ $item['total'] ?? '' }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        {{-- <tfoot>
                                            <tr>
                                                <th colspan="2"></th> <!-- Celdas vacías para compensar las columnas -->
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Capital</th>
                                                <td class="text-sm text-center font-weight-bold">
                                                    //{{ sum($payloads[0]['abonoCapital']) }}
                                                </td>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Intereses</th>
                                                <td class="text-sm text-center font-weight-bold">
                                                   // {{ $payloads[0]->sum('abonoIntereses') }}
                                                </td>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Préstamo</th>
                                                <td class="text-sm text-center font-weight-bold">
                                                    {{ $payloads[0]->sum('total') }}
                                                </td>
                                                <th></th> <!-- Celda vacía para compensar las columnas -->
                                            </tr>
                                        </tfoot> --}}
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    </div>
    <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
