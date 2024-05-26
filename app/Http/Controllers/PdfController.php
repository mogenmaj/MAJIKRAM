<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $products= Product::get();
        $data= [
            'title' => 'funda of Web IT',
            'date' => date('Y/m/d'),
            'products' => $products
                   ]
        $pdf = Pdf::loadView('pdf.generate-product-pdf', $data);
        return $pdf->download('invoice.pdf');
    }
}
