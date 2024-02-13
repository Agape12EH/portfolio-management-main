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
                                <h6 class="mb-3">Crear Prestamo</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <form method='POST' action='{{ route('loans.update', $loan->id) }}'>
                            @csrf @method('PUT')
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Monto de Prestamo: </label>
                                    <input type="float" name="amount" class="form-control border border-2 p-2"
                                        value='{{ old('amount', $loan) }}'>
                                    @error('amount')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Cuotas: </label>
                                    <select name="fees" id="fees"
                                        class="form-control border border-2 p-2 w-full">
                                        <option value="{{$loan->fees}}">{{$loan->fees}}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    @error('name')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>


                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Intereses: </label>
                                    <select name="taxes" id="taxes"
                                        class="form-control border border-2 p-2 w-full">
                                        <option value="{{$loan->taxes}}">{{$loan->taxes}} </option>
                                        <option value="0.01">1%</option>
                                        <option value="0.02">2%</option>
                                        <option value="0.03">3%</option>
                                        <option value="0.04">4%</option>
                                        <option value="0.05">5%</option>
                                        <option value="0.06">6%</option>
                                        <option value="0.07">7%</option>
                                        <option value="0.08">8%</option>
                                        <option value="0.09">9%</option>
                                        <option value="0.10">10%</option>

                                    </select>
                                    @error('name')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>


                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Cliente: </label>
                                    <select name="customer_id" id="customer_id"
                                        class="form-control border border-2 p-2 w-full">
                                        <option value="{{$loan->customer_id}}">{{$loan->customer->name }} </option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>


                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Actualizar</button>
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
