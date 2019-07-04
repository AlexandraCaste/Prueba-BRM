<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
    public function salePdf($total_price, $products)
    {
    	$products = json_decode($products);
    	$pdf = PDF::loadView('pdfs/invoice', compact('total_price', 'products'));
    	return $pdf->stream('Facturación.pdf');
    }
}
