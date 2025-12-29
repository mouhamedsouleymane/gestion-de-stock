<x-app-layout>
    <x-slot name="header">
        <h1 class="h2"><i class="bi bi-exclamation-triangle text-warning"></i> Produits en stock faible</h1>
    </x-slot>

    @if($lowStockProducts->count() > 0)
        <div class="alert alert-warning" role="alert">
            <i class="bi bi-exclamation-triangle"></i>
            <strong>Attention !</strong> {{ $lowStockProducts->count() }} produit(s) nécessitent un réapprovisionnement.
        </div>

        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-warning">
                            <tr>
                                <th>Référence</th>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Stock actuel</th>
                                <th>Stock minimum</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lowStockProducts as $product)
                            <tr class="{{ $product->stock_quantity == 0 ? 'table-danger' : 'table-warning' }}">
                                <td>{{ $product->reference }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <span class="badge {{ $product->stock_quantity == 0 ? 'bg-danger' : 'bg-warning' }}">
                                        {{ $product->stock_quantity }}
                                    </span>
                                </td>
                                <td>{{ $product->min_stock }}</td>
                                <td>
                                    @if($product->stock_quantity == 0)
                                        <span class="badge bg-danger">Rupture</span>
                                    @else
                                        <span class="badge bg-warning">Stock faible</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i> Réapprovisionner
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Statistiques rapides -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6>Produits en rupture</h6>
                                <h3>{{ $lowStockProducts->where('stock_quantity', 0)->count() }}</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-x-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-dark">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6>Stock faible</h6>
                                <h3>{{ $lowStockProducts->where('stock_quantity', '>', 0)->count() }}</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-exclamation-triangle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6>Total produits</h6>
                                <h3>{{ $lowStockProducts->count() }}</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-box-seam fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card shadow">
            <div class="card-body text-center py-5">
                <i class="bi bi-check-circle text-success" style="font-size: 4rem;"></i>
                <h3 class="mt-3 text-success">Excellent !</h3>
                <p class="text-muted">Aucun produit n'est en stock faible pour le moment.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    <i class="bi bi-box-seam"></i> Voir tous les produits
                </a>
            </div>
        </div>
    @endif

    <style>
    .fa-2x { font-size: 2em; }
    </style>
</x-app-layout>