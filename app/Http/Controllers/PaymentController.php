<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanItem;
use Illuminate\Http\Request;

class PaymentController extends Controller {
    public function create($loan, $cuota) {
        $loan = Loan::findOrFail($loan);

        $loanItem = LoanItem::where('loan_id', $loan->id)
                        ->orderBy('version', 'desc')
                        ->firstOrFail();

        $payload = $loanItem->payload;

        $cuotaData = collect($payload)->firstWhere('cuota', $cuota);

        if ($cuotaData) {
            return view('payments.create', [
                'payload' => $cuotaData,
                'loan' => $loan,
                'cuota' => $cuota,
            ]);
        }

        return redirect()->route('error')->with('message', 'La cuota no fue encontrada.');

    }

    public function store(Request $request) {
        $valorPagado = $request->input('valor_pagado');
        $monto = $request->input('amount');
        $cuota = $request->input('cuota');
        $loanId = $request->input('loan_id');

        switch (true) {
            case $valorPagado == $monto:
                // Caso 1: Valor pagado igual al monto
                $loanItem = LoanItem::where('loan_id', $loanId)
                    ->where('payload->cuota', $cuota)
                    ->first();

                if ($loanItem) {
                    $payload = $loanItem->payload;
                    $payload[0][$cuota]['pagado'] = true;
                    //$payload['cuota'][$cuota]['monto_pagado'] = $monto;
                    $loanItem->payload = $payload;
                    $loanItem->save();
                }
                break;

            case $valorPagado > $monto:
                // Caso 2: Valor pagado mayor al monto
                // Lógica adicional aquí
                break;

            case $valorPagado < $monto:
                // Caso 3: Valor pagado menor al monto
                // Lógica adicional aquí
                break;

            default:
                // Caso por defecto
                // Lógica adicional aquí
                break;
        }


    }
}
