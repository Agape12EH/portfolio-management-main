<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Enums\CustomerType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('customers.index', [
            'customers' => Customer::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
       // dd(CustomerType::toArray());
        return view('customers.create', [
            'codebtors' =>Customer::where ('type', CustomerType::CODEUDOR)->get(),
            'types' => CustomerType::toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->type = $request->type;
        $customer->dni = $request->dni;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->customer_id = $request->customer_id;
        $customer->save();
        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer) {
        return view('customers.show', [
            'customer' => $customer,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer) {

        return view('customers.edit', [
            'customer' => $customer,
            'types' => CustomerType::toArray(),
            'codebtors' =>Customer::where ('type', CustomerType::CODEUDOR)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer) {
        $customer->name = $request->name;
        $customer->type = $request->type;
        $customer->dni = $request->dni;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->customer_id = $request->customer_id;
        $customer->save();
        return redirect('/customers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer) {
        $customer->delete();
        return redirect('/customers');
    }

    public function search(Request $request) {
        $customers = Customer::where('name', 'like', '%' . $request->name . '%')->get();
        return view('customers.index', [
            'customers' => $customers,
        ]);
    }
}
