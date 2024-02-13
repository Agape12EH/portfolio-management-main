<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>

            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Crear el Cliente</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <form method='POST' action='{{ route('customers.store') }}'>
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nombre del Cliente</label>
                                    <input type="name" name="name" class="form-control border border-2 p-2"
                                        value='{{ old('name') }}'>
                                    @error('email')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Tipo de Cliente</label>
                                    <select name="type" id="type"
                                        class="form-control border border-2 p-2 w-full" required>
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
                                        value='{{ old('dni') }}'>
                                    @error('dni')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Direcion de Residencia</label>
                                    <input type="text" name="address" class="form-control border border-2 p-2"
                                        value='{{ old('address') }}'>
                                    @error('address')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Telefono</label>
                                    <input type="text" name="phone" class="form-control border border-2 p-2"
                                        value='{{ old('phone') }}'>
                                    @error('address')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Codeudor (Opcional)</label>
                                    <select name="customer_id" id="customer_id"
                                        class="form-control border border-2 p-2 w-full">
                                        <option value="">Seleccione un Codeudor </option>
                                        @foreach ($codebtors as $codebtor)
                                            <option value="{{ $codebtor->id }}">{{ $codebtor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Correo Electronico</label>
                                    <input type="text" name="email" class="form-control border border-2 p-2"
                                        value='{{ old('email') }}'>
                                    @error('address')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>


                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Submit</button>
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
