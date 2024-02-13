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
                                        <a href="{{ route('customers.destroy', $customer) }}"
                                            class="text-gray-500 hover:text-gray-700" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Generar Reporte">
                                            <i class="fas fa-file-pdf text-lg"></i>
                                        </a>
                                        <a href="{{ route('customers.edit', $customer) }}"
                                            class="text-gray-500 hover:text-gray-700" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Editar Cliente">
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
                                    <p class="text-base text-gray-600">{{ $customer->name }}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Número Direccion:</h6>
                                    <p class="text-base text-gray-600">{{ $customer->address }}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Correo Electrónico:</h6>
                                    <p class="text-base text-gray-600">{{ $customer->email }}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Monto Prestado:</h6>
                                    <p class="text-base text-gray-600">{{ $customer->loans()->amount ?? 'N/A'}}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Cédula:</h6>
                                    <p class="text-base text-gray-600">{{ $customer->dni }}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Teléfono:</h6>
                                    <p class="text-base text-gray-600">{{ $customer->phone }}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Tipo de Cliente:</h6>
                                    <p class="text-base text-gray-600">{{ $customer->type->name }}</p>
                                </div>
                                <div class="col-md-6 border-b border-gray-200 pb-3">
                                    <h6 class="text-lg font-semibold text-gray-700">Codeudor:</h6>
                                    <p class="text-base text-gray-600">{{ $customer->codebtor()->name ?? 'N/A'}}</p>
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
