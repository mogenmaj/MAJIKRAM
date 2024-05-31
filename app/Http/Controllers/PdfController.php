<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $title = 'MAJIKROOM';
        $date = date('Y-m-d');
        $invoices = Invoice::all();
        $clients = Client::all();
        $pdf = Pdf::loadView('pdf_template', compact('title', 'date', 'invoices', 'clients'));
        return $pdf->download('invoice_report.pdf');
    }
} 
