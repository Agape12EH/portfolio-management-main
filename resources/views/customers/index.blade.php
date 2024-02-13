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
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-success shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Tabla de Clientes</h6>
                            </div>
                            <div class="text-end pt-1 px-r">
                                <a href="{{ route('customers.create') }}"
                                    class="btn btn-lg bg-gradient-secondary btn-sm w-10 mt-2 mb-0">
                                    <span class="material-icons text-sm me-2">create</span> Crear Cliente
                                </a>
                            </div>
                            <div class="text-end pt-1 px-r">
                                <a href="{{ route('reportcustomer.index') }}"
                                    class="btn btn-lg bg-gradient-secondary btn-sm w-12 mt-2 mb-0">
                                    <span class="material-symbols-outlined text-sm me-2">
                                        picture_as_pdf
                                    </span>Generar Reporte
                                </a>
                            </div>
                            <div class="text-end pt-1 px-r input-group input-group-outline">
                                <label class="form-label">Type here...</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ">
                                                Tipo
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                Cliente</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 me-1 ">
                                                Documento</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Telefono</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 me-1">
                                                Direccion</th>
                                            {{-- <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 me-1">
                                                Codeudor</th> --}}
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                                Estado</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                                Mis Prestamos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>
                                                    <p class="text-sm text-center font-weight-bold mb-0 ">
                                                        {{ $customer->type->name }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{ $customer->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 ">{{ $customer->dni }}</p>
                                                </td>
                                                <td>
                                                    <span class="text-xs font-weight-bold">{{ $customer->phone }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-xs font-weight-bold">{{ $customer->address }}</span>
                                                </td>
                                                {{-- <td>
                                                    <span class="text-xs font-weight-bold">
                                                        {{ $customer->codebtor }}
                                                    </span>
                                                </td> --}}
                                                <td class="align-middle text-center text-sm ">
                                                    <span class="badge badge-sm bg-gradient-danger">Naranja</span>
                                                </td>
                                                <td class="align-middle text-end">
                                                    <div class="text-center">
                                                        <a href="{{ route('customers.show', $customer) }}"
                                                            class="btn btn-lg bg-gradient-light btn-sm w-40 mt-2 mb-0">
                                                            <span class="material-icons text-sm me-2">reply</span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{ $customers->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
