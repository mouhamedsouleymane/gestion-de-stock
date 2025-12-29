<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h2"><i class="bi bi-cart-check"></i> Ventes</h1>
            <a href="{{ route('sales.create') }}" class="btn btn-success">
                <i class="bi bi-cart-plus"></i> Nouvelle vente
            </a>
        </div>
    </x-slot>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>N° Facture</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->invoice_number }}</td>
                            <td>{{ $sale->customer_name }}</td>
                            <td>{{ $sale->created_at->format('d/m/Y H:i') }}</td>
                            <td><strong>{{ number_format($sale->total_amount, 0) }} FCFA</strong></td>
                            <td>
                                <a href="{{ route('sales.show', $sale) }}" class="btn btn-sm btn-outline-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('sales.pdf', $sale) }}" class="btn btn-sm btn-outline-success" target="_blank">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                </a>
                                <form method="POST" action="{{ route('sales.destroy', $sale) }}" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Confirmer la suppression?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>