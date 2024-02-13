<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
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
                                            data-bs-placement="top" title="Eliminar Cliente">
                                            <i class="fas fa-trash text-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Datos del cliente -->
                        <div class="px-4 py-3">
                            <form method='POST' action='{{ route('customers.update', $customer->id) }}'>
                                @csrf @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 border-b border-gray-200 pb-3">
                                        <h6 class="text-lg font-semibold text-gray-700">Nombre:</h6>
                                        <input type="name" name="name"
                                            class=" border rounded-lg border-3 p-1 w-80"
                                            value='{{ old('name', $customer->name) }}'>
                                    </div>
                                    <div class="col-md-6 border-b border-gray-200 pb-3">
                                        <h6 class="text-lg font-semibold text-gray-700">Direccion:</h6>
                                        <input type="text" name="address" class="border rounded-lg border-3 p-1 w-80"
                                            value='{{ old('address', $customer->address) }}'>
                                    </div>
                                    <div class="col-md-6 border-b border-gray-200 pb-3">
                                        <h6 class="text-lg font-semibold text-gray-700">Correo Electrónico:</h6>
                                        <input type="text" name="email" class="border rounded-lg border-3 p-1 w-80"
                                            value='{{ old('email', $customer->email) }}'>
                                    </div>
                                    <div class="col-md-6 border-b border-gray-200 pb-3">
                                        <h6 class="text-lg font-semibold text-gray-700">Tipo de Cliente:</h6>
                                        <select name="type" id="type"
                                            class="border rounded-lg border-3 p-1 w-80" required>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->value }}"
                                                    {{ old('type') == $type ? 'selected' : '' }}>
                                                    {{ $type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 border-b border-gray-200 pb-3">
                                        <h6 class="text-lg font-semibold text-gray-700">Cédula:</h6>
                                        <input type="text" name="dni" class="border rounded-lg border-3 p-1 w-80"
                                            value='{{ old('dni', $customer->dni) }}'>
                                    </div>
                                    <div class="col-md-6 border-b border-gray-200 pb-3">
                                        <h6 class="text-lg font-semibold text-gray-700">Teléfono:</h6>
                                        <input type="text" name="phone" class="border rounded-lg border-3 p-1 w-80"
                                            value='{{ old('phone', $customer->phone) }}'>
                                    </div>
                                    <div class="col-md-6 border-b border-gray-200 pb-3">
                                        <h6 class="text-lg font-semibold text-gray-700">Codeudor (Opcional):</h6>
                                        <select name="customer_id" id="customer_id"
                                            class="border rounded-lg border-2 p-1 w-80">
                                            <option value="">Seleccione un Codeudor </option>
                                            @foreach ($codebtors as $codebtor)
                                                <option value="{{ $codebtor->id }}">{{ $codebtor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <button type="submit" class="btn bg-gradient-dark">Modificar</button>
                        </div>

                        </form>
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
{{-- <div class="card-body p-3">

    <form method='POST' action='{{ route('customers.update', $customer->id) }}'>
        @csrf @method('PUT')
        <div class="row">

            <div class="mb-3 col-md-6">
                <label class="form-label">Nombre del Cliente</label>
                <input type="name" name="name" class="form-control border border-2 p-2"
                    value='{{ old('name', $customer->name) }}'>
                @error('email')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Tipo de Cliente</label>
                <select name="type" id="type" class="form-control border border-2 p-2 w-full" required>
                    @foreach ($types as $type)
                        <option value="{{ $type->value }}"
                            {{ old('type') == $type ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('name')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Numero de Cedula</label>
                <input type="text" name="dni" class="form-control border border-2 p-2"
                    value='{{ old('dni', $customer->dni) }}'>
                @error('dni')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Direcion de Residencia</label>
                <input type="text" name="address" class="form-control border border-2 p-2"
                    value='{{ old('address', $customer->address) }}'>
                @error('address')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Telefono</label>
                <input type="text" name="phone" class="form-control border border-2 p-2"
                    value='{{ old('phone', $customer->phone) }}'>
                @error('address')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Codeudor (Opcional)</label>
                <select name="customer_id" id="customer_id" class="form-control border border-2 p-2 w-full">
                    <option value="">Seleccione un Codeudor </option>
                    @foreach ($codebtors as $codebtor)
                        <option value="{{ $codebtor->id }}">{{ $codebtor->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
            </div>


        </div>
        <button type="submit" class="btn bg-gradient-dark">Submit</button>
    </form>

</div> --}}
