<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function invoice(Sale $sale)
    {
        $sale->load('saleItems.product', 'user');
        
        $html = view('pdf.invoice', compact('sale'))->render();
        
        // Utilisation de wkhtmltopdf si disponible, sinon HTML simple
        if ($this->isWkhtmltopdfAvailable()) {
            return $this->generateWithWkhtmltopdf($html, $sale->invoice_number);
        }
        
        // Fallback: retourner le HTML avec styles print
        return response($html)
            ->header('Content-Type', 'text/html')
            ->header('Content-Disposition', 'inline; filename="facture-' . $sale->invoice_number . '.html"');
    }
    
    private function isWkhtmltopdfAvailable()
    {
        return false; // Désactivé pour éviter les dépendances
    }
    
    private function generateWithWkhtmltopdf($html, $invoiceNumber)
    {
        // Code pour wkhtmltopdf si nécessaire
    }
}