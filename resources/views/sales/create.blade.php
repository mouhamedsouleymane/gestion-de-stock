<x-app-layout>
    <x-slot name="header">
        <h1 class="h2"><i class="bi bi-cart-plus"></i> Nouvelle vente</h1>
    </x-slot>

    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="{{ route('sales.store') }}" id="saleForm">
                @csrf
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Client</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Téléphone</label>
                        <input type="text" name="customer_phone" class="form-control">
                    </div>
                </div>

                <h5>Produits</h5>
                <div id="products-container">
                    <div class="row product-row mb-3">
                        <div class="col-md-5">
                            <select name="products[0][product_id]" class="form-select product-select" required>
                                <option value="">Sélectionner un produit</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}" data-stock="{{ $product->stock_quantity }}">
                                        {{ $product->name }} ({{ $product->reference }}) - Stock: {{ $product->stock_quantity }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="products[0][quantity]" class="form-control quantity-input" placeholder="Qté" min="1" required>
                        </div>
                        <div class="col-md-2">
                            <input type="number" step="0.01" name="products[0][unit_price]" class="form-control price-input" placeholder="Prix" required>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control total-input" placeholder="Total" readonly>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger remove-product">×</button>
                        </div>
                    </div>
                </div>

                <button type="button" id="add-product" class="btn btn-secondary mb-3">
                    <i class="bi bi-plus"></i> Ajouter produit
                </button>

                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h5>Total: <span id="grand-total">0.00 €</span></h5>
                                <input type="hidden" name="total_amount" id="total_amount" value="0">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-3">
                    <button type="submit" class="btn btn-success">Enregistrer vente</button>
                    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>

    <script>
    let productIndex = 1;
    
    document.getElementById('add-product').addEventListener('click', function() {
        const container = document.getElementById('products-container');
        const newRow = container.querySelector('.product-row').cloneNode(true);
        
        newRow.querySelectorAll('select, input').forEach(input => {
            input.name = input.name.replace('[0]', `[${productIndex}]`);
            input.value = '';
        });
        
        container.appendChild(newRow);
        productIndex++;
        attachEventListeners(newRow);
    });

    function attachEventListeners(row) {
        const productSelect = row.querySelector('.product-select');
        const quantityInput = row.querySelector('.quantity-input');
        const priceInput = row.querySelector('.price-input');
        const totalInput = row.querySelector('.total-input');
        const removeBtn = row.querySelector('.remove-product');

        productSelect.addEventListener('change', function() {
            const option = this.options[this.selectedIndex];
            priceInput.value = option.dataset.price || '';
            calculateRowTotal();
        });

        [quantityInput, priceInput].forEach(input => {
            input.addEventListener('input', calculateRowTotal);
        });

        removeBtn.addEventListener('click', function() {
            if (document.querySelectorAll('.product-row').length > 1) {
                row.remove();
                calculateGrandTotal();
            }
        });

        function calculateRowTotal() {
            const qty = parseFloat(quantityInput.value) || 0;
            const price = parseFloat(priceInput.value) || 0;
            const total = qty * price;
            totalInput.value = total.toFixed(2);
            calculateGrandTotal();
        }
    }

    function calculateGrandTotal() {
        let grandTotal = 0;
        document.querySelectorAll('.total-input').forEach(input => {
            grandTotal += parseFloat(input.value) || 0;
        });
        document.getElementById('grand-total').textContent = grandTotal.toFixed(2) + ' €';
        document.getElementById('total_amount').value = grandTotal.toFixed(2);
    }

    // Attach listeners to initial row
    attachEventListeners(document.querySelector('.product-row'));
    </script>
</x-app-layout>