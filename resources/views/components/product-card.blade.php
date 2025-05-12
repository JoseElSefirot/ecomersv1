<div class="col-md-4 mb-3">
    <div class="card">
        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">${{ number_format($product->price, 2) }}</p>
            <form action="{{ url('/buy') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-beauty">Comprar</button>
            </form>
        </div>
    </div>
</div>
