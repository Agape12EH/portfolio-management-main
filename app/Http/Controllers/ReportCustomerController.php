<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Customer;
use App\Models\LoanItem;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportCustomerController extends Controller {
    public function generateReport() {
        $data = [
            'customers' => Customer::all(),

        ];

        // Carga la vista y genera el PDF
        return PDF::loadView('reports.reportCustomer', $data)
        ->setPaper('legal', 'landscape')
        ->download('invoice.pdf');

    }

    public function generateOneReport(Customer $customer) {

        $data = [
            'loans' => Loan::where('customer_id', $customer->id)->get(),
            'payloads'=>LoanItem::where('loan_id', $customer->loans()->id)->get()->pluck('payload'),
            'customer' => $customer,
        ];
        $pdf = Pdf::loadView('reports.reportCustomerOne', $data);



        return $pdf->download('invoice.pdf');
    }
}
