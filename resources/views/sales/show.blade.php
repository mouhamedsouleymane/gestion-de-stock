<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h2"><i class="bi bi-receipt"></i> Facture {{ $sale->invoice_number }}</h1>
            <div>
                <a href="{{ route('sales.pdf', $sale) }}" class="btn btn-success" target="_blank">
                    <i class="bi bi-file-earmark-pdf"></i> Télécharger PDF
                </a>
                <a href="{{ route('sales.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </x-slot>

    <div class="card shadow">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Informations client</h5>
                    <p><strong>Nom:</strong> {{ $sale->customer_name }}</p>
                    @if($sale->customer_phone)
                        <p><strong>Téléphone:</strong> {{ $sale->customer_phone }}</p>
                    @endif
                </div>
                <div class="col-md-6 text-end">
                    <h5>Informations facture</h5>
                    <p><strong>N° Facture:</strong> {{ $sale->invoice_number }}</p>
                    <p><strong>Date:</strong> {{ $sale->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Vendeur:</strong> {{ $sale->user->name }}</p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Produit</th>
                            <th>Référence</th>
                            <th>Quantité</th>
                            <th>Prix unitaire</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sale->saleItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->product->reference }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->unit_price, 0) }} FCFA</td>
                            <td>{{ number_format($item->total_price, 0) }} FCFA</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-dark">
                        <tr>
                            <th colspan="4" class="text-end">Total général:</th>
                            <th>{{ number_format($sale->total_amount, 0) }} FCFA</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>