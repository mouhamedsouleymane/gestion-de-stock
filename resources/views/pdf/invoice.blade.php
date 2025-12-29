<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Facture {{ $sale->invoice_number }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 20px; }
        .company { font-size: 24px; font-weight: bold; color: #333; }
        .invoice-info { display: flex; justify-content: space-between; margin-bottom: 30px; }
        .client-info, .invoice-details { width: 45%; }
        .invoice-details { text-align: right; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; font-weight: bold; }
        .total-row { background-color: #e9ecef; font-weight: bold; }
        .text-right { text-align: right; }
        .footer { margin-top: 50px; text-align: center; font-size: 12px; color: #666; }
        @media print {
            body { margin: 0; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="company">GESTION DE STOCK</div>
        <div>Magasin de Pièces Détachées Mécaniques</div>
    </div>

    <div class="invoice-info">
        <div class="client-info">
            <h3>Facturé à:</h3>
            <strong>{{ $sale->customer_name }}</strong><br>
            @if($sale->customer_phone)
                Tél: {{ $sale->customer_phone }}<br>
            @endif
        </div>
        <div class="invoice-details">
            <h3>Détails facture:</h3>
            <strong>N° {{ $sale->invoice_number }}</strong><br>
            Date: {{ $sale->created_at->format('d/m/Y H:i') }}<br>
            Vendeur: {{ $sale->user->name }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Référence</th>
                <th class="text-right">Qté</th>
                <th class="text-right">Prix unitaire</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sale->saleItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->reference }}</td>
                <td class="text-right">{{ $item->quantity }}</td>
                <td class="text-right">{{ number_format($item->unit_price, 0) }} FCFA</td>
                <td class="text-right">{{ number_format($item->total_price, 0) }} FCFA</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="4" class="text-right"><strong>TOTAL GÉNÉRAL:</strong></td>
                <td class="text-right"><strong>{{ number_format($sale->total_amount, 0) }} FCFA</strong></td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <p>Merci pour votre achat !</p>
        <p>Cette facture a été générée le {{ now()->format('d/m/Y à H:i') }}</p>
    </div>

    <div class="no-print" style="margin-top: 30px; text-align: center;">
        <button onclick="window.print()" style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Imprimer
        </button>
        <button onclick="window.close()" style="padding: 10px 20px; background: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer; margin-left: 10px;">
            Fermer
        </button>
    </div>
</body>
</html>