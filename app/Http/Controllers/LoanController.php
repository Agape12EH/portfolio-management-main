<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Customer;
use App\Models\LoanItem;
use AmortizationController;
use App\Enums\CustomerType;
use Illuminate\Http\Request;

require 'AmortizationTable/AmortizationController.php';
class LoanController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {

        return view('loans.index', [
            'loans' => Loan::with('customer')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('loans.create', [
            'customers' => Customer::where('type', CustomerType::NATURAL)
            ->orWhere('type', CustomerType::FISCALIA)
            ->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $loan = new Loan();

        $loan->amount = $request->amount;
        $fees=$request->input('fees');
        $loan->fees =intval($fees, 10);
        $taxes=$request->input('taxes');
        $loan->taxes = floatval($taxes);
        $loan->customer_id = $request->customer_id;

        $loan->save();

        $amortizationController = new AmortizationController();

        $amortizationTables = $amortizationController->generateAmortization($loan->amount, $loan->fees, $loan->taxes);

        $loanAmortization = new LoanItem([
            'payload'=>$amortizationTables,
            'version'=>0,
            'loan_id'=>$loan->id,
        ]);

        $loanAmortization->save();

        return redirect('/loans');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan) {
        $loanItems = LoanItem::where('loan_id', $loan->id)->get()->pluck('payload');

         //dd($loanItems);
        //die;
        return view('loans.show', [
            'loan' => $loan,
            'payloads' => $loanItems,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan) {
        return view('loans.edit', [
            'loan' => $loan,
            'customers' => Customer::where('type', CustomerType::NATURAL)
            ->orWhere('type', CustomerType::FISCALIA)
            ->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan) {
        $loan->update($request->all());

        $amortizationController = new AmortizationController();
        $amortizationTables = $amortizationController
            ->generateAmortization($request->amount, $request->fees, $request->taxes);

        // Buscar el registro en la tabla LoanItem correspondiente al loan_id
        $loanItem = LoanItem::where('loan_id', $loan->id)->first();

        // Si existe el registro, actualizar el campo payload
        if ($loanItem) {
            $loanItem->update(['payload' => $amortizationTables]);
        } else {
            // Si no existe, crear un nuevo registro
            $loanAmortization = new LoanItem([
                'payload' => $amortizationTables,
                'version' => 0,
                'loan_id' => $loan->id,
            ]);

            $loanAmortization->save();
        }

        return redirect('/loans');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan) {}
}
