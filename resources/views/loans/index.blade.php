<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <div class="bg-gradient-success shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Tabla de Prestamos</h6>
                                </div>
                            </div>
                            <div class="flex justify-between items-center pt-1 px-r row">
                                <div class="space-x-2 col-md-8">
                                    <a href="{{ route('loans.create') }}" class="btn btn-lg bg-gradient-secondary btn-sm w-14">
                                        <span class="material-icons text-sm me-1">create</span> Crear Prestamo
                                    </a>
                                    <a href="{{ route('reportloan.index') }}" class="btn btn-lg bg-gradient-secondary btn-sm w-12">
                                        <span class="material-symbols-outlined text-sm me-1">picture_as_pdf</span>Generar Reporte
                                    </a>
                                </div>
                                <div class="input-group input-group-outline col-md-4">
                                    <input type="text" class="form-control" placeholder="Buscar...">
                                    <button class="btn bg-gradient-secondary btn-sm">
                                        <span class="material-icons">search</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <!-- Código de la tabla omitido para mantener el enfoque en la mejora visual -->
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ">
                                                    Monto
                                                </th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                    Cliente</th>
                                                <th <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                    Codeudor</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 me-1 ">
                                                    Cuotas</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Interes</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Estado</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                                    Destalles</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($loans as $loan)
                                                <tr>
                                                    <td>
                                                        <p class="text-sm text-center font-weight-bold mb-0 ">
                                                            {{ $loan->amount }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">{{ $loan->customer->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-bold mb-0 ">
                                                            {{ $loan->customer->customer_id->name ?? 'N/A' }}</p>
                                                    </td>
                                                    <td>
                                                        <span class="text-xs font-weight-bold">
                                                            {{ $loan->fees }}
                                                        </span>
                                                    </td>
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
                                                    <td>
                                                        <span class="text-xs font-weight-bold">
                                                            {{ $loan->fees }}
                                                        </span>
                                                    </td>
                                                    {{-- <td>
                                                        <span
                                                            class="text-xs font-weight-bold">{{ $customer->address }}</span>
                                                    </td> --}}
                                                    {{-- <td>
                                                        <span class="text-xs font-weight-bold">
                                                            {{ $customer->codebtor }}
                                                        </span>
                                                    </td> --}}
                                                    {{-- <td class="align-middle text-center text-sm ">
                                                        <span class="badge badge-sm bg-gradient-danger">Naranja</span>
                                                    </td> --}}
                                                    <td class="align-middle text-end">
                                                        <div class="text-center">
                                                            <a href="{{ route('loans.show', $loan) }}"
                                                                class="btn btn-lg bg-gradient-light btn-sm w-40 mt-2 mb-0">
                                                                <span class="material-icons text-sm me-2">reply</span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </table>
                            </div>
                            {{ $loans->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
