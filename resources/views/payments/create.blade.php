<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"></div>

            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Registrar Pago</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form method='POST' action='{{ route('payments.store') }}'>
                            @csrf
                            <div class="row">
                                <input type="hidden" name="loan_id" value="{{ $loan->id }}">
                                <input type="hidden" name="cuota" value="{{ $cuota }}">
                                <div class="col-md-6 mb-4">
                                    <label for="cuota" class="block text-sm font-medium text-gray-700">Valor de la
                                        Cuota:</label>
                                    <p class="text-lg text-gray-900" name="amount" value="{{ $payload['total'] }}" >$ {{ $payload['total'] }}</p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="valor_pagado" class="block text-sm font-medium text-gray-700">Valor
                                        Recibido:</label>
                                    <input type="float" name="valor_pagado" id="valor_pagado"
                                        class="form-input border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2"
                                        value='{{ old('valor_pagado') }}'>
                                    @error('amount')
                                        <p class='text-sm text-red-500'>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gradient-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Pagar</button>
                        </form>
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
