<x-app-layout>
    <x-slot name="header">
        <h1 class="h2"><i class="bi bi-speedometer2"></i> Tableau de bord</h1>
    </x-slot>

    <!-- Cartes de statistiques -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Produits</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProducts ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-box-seam fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ventes du mois</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $monthlySales ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-cart-check fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Stock faible</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $lowStockProducts ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-exclamation-triangle fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Chiffre d'affaires</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalRevenue ?? 0, 0) }} FCFA</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-currency-euro fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions rapides -->
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-lightning"></i> Actions rapides</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-block">
                                <i class="bi bi-plus-circle"></i> Nouveau produit
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('sales.create') }}" class="btn btn-success btn-block">
                                <i class="bi bi-cart-plus"></i> Nouvelle vente
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('categories.create') }}" class="btn btn-info btn-block">
                                <i class="bi bi-tag"></i> Nouvelle catégorie
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('products.index') }}" class="btn btn-warning btn-block">
                                <i class="bi bi-search"></i> Voir stock
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger"><i class="bi bi-exclamation-triangle"></i> Alertes stock</h6>
                </div>
                <div class="card-body">
                    @if(isset($lowStockItems) && $lowStockItems->count() > 0)
                        @foreach($lowStockItems as $product)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{ $product->name }}</strong> - Stock: {{ $product->stock_quantity }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">Aucune alerte de stock pour le moment.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
    .border-left-primary { border-left: 0.25rem solid #4e73df !important; }
    .border-left-success { border-left: 0.25rem solid #1cc88a !important; }
    .border-left-warning { border-left: 0.25rem solid #f6c23e !important; }
    .border-left-info { border-left: 0.25rem solid #36b9cc !important; }
    .text-primary { color: #4e73df !important; }
    .text-success { color: #1cc88a !important; }
    .text-warning { color: #f6c23e !important; }
    .text-info { color: #36b9cc !important; }
    .fa-2x { font-size: 2em; }
    </style>
</x-app-layout>
