<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Browsershot\Browsershot;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $title = 'MAJIKROOM';
        $date = date('Y-m-d');
        $invoices = Invoice::with(['client', 'reservation'])->get(); // Charger les relations client et réservation
    
        $pdf = Pdf::loadView('pdf_template', compact('title', 'date', 'invoices'));
        
        $output = $pdf->output();
    
        return new Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>  'inline; filename=test.pdf',
        ]);
    }
} 
