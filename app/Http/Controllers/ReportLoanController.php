<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanItem;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportLoanController extends Controller {
    public function generateReport() {

        $data = [
            'loans' => Loan::all(),
        ];
        $pdf = Pdf::loadView('reports.reportLoan', $data);

        return $pdf->download('invoice.pdf');
    }

    public function generateOneReport(Loan $loan) {

        $data = [
            'payloads'=>LoanItem::where('loan_id', $loan->id)->get()->pluck('payload'),
            'loan' => $loan,
        ];
        $pdf = Pdf::loadView('reports.reportLoanOne', $data);



        return $pdf->download('invoice.pdf');
    }
}
