<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Beauty Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary-color: #ff6b81;
            --secondary-color: #f8f9fa;
            --accent-color: #ff4757;
            --dark-color: #2f3542;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            color: #333;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-color) !important;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .btn-beauty {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            border-radius: 25px;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }

        .btn-beauty:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: white;
        }

        .search-form {
            position: relative;
        }

        .search-form .form-control {
            border-radius: 25px;
            padding-left: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .search-form .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-form .search-icon {
            position: absolute;
            left: 15px;
            top: 10px;
            color: rgba(255, 255, 255, 0.7);
        }

        .category-nav {
            background-color: var(--secondary-color);
            padding: 10px 0;
        }

        .category-nav .nav-link {
            color: var(--dark-color);
            font-weight: 500;
            padding: 8px 15px;
            border-radius: 20px;
            margin: 0 5px;
        }

        .category-nav .nav-link:hover,
        .category-nav .nav-link.active {
            background-color: var(--primary-color);
            color: white !important;
        }

        .cart-icon {
            position: relative;
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--accent-color);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 50px 0 20px;
        }

        .footer h5 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 20px;
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .footer-link:hover {
            color: var(--primary-color);
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .dropdown-menu {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: none;
            padding: 10px;
        }

        .dropdown-item {
            border-radius: 5px;
            padding: 8px 15px;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: var(--primary-color);
            color: white;
        }

        /* Estilos específicos para la página de producto */
        .product-hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E"), linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            padding: 20px 0;
            color: white;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .product-hero-section .breadcrumb {
            margin-bottom: 0;
            background: transparent;
        }

        .product-hero-section .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        .product-hero-section .breadcrumb-item.active {
            color: white;
        }

        .product-hero-section .breadcrumb-item+.breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.6);
        }

        .product-card {
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .product-image-wrapper {
            height: 100%;
            overflow: hidden;
            position: relative;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-image-wrapper:hover .product-image {
            transform: scale(1.05);
        }

        .product-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .product-image-wrapper:hover .product-image-overlay {
            opacity: 1;
        }

        .feature-item {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: var(--secondary-color);
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background-color: rgba(255, 107, 129, 0.1);
        }

        .feature-item i {
            font-size: 1.2rem;
            color: var(--primary-color);
            margin-right: 10px;
        }

        .quantity-selector .form-control {
            max-width: 80px;
        }

        .quantity-selector .btn {
            border-radius: 0;
        }

        .quantity-selector .btn:first-child {
            border-top-left-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

        .quantity-selector .btn:last-child {
            border-top-right-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }

        .product-tabs .nav-tabs {
            border-bottom: none;
        }

        .product-tabs .nav-link {
            border: none;
            color: var(--dark-color);
            font-weight: 500;
            padding: 12px 20px;
            border-radius: 10px 10px 0 0;
            transition: all 0.3s ease;
        }

        .product-tabs .nav-link:hover {
            color: var(--primary-color);
        }

        .product-tabs .nav-link.active {
            background-color: white;
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
        }

        .product-card-small {
            border-radius: 10px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .product-card-small:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .product-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
        }

        .product-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 200px;
        }

        .product-img-wrapper img {
            transition: transform 0.5s ease;
            height: 100%;
            object-fit: cover;
        }

        .product-card-small:hover .product-img-wrapper img {
            transform: scale(1.1);
        }

        .product-actions {
            position: absolute;
            bottom: -50px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 5px;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
        }

        .product-card-small:hover .product-actions {
            bottom: 0;
        }

        .product-actions .btn {
            width: 35px;
            height: 35px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .product-actions .btn:hover {
            background-color: var(--primary-color);
            color: white;
        }

        @media (max-width: 767.98px) {
            .product-hero-section {
                padding: 15px 0;
            }

            .product-image-wrapper {
                height: 300px;
            }
        }
    </style>
</head>

<body>
    <header>
        <!-- Barra de navegación principal -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--dark-color);">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="fas fa-spa me-2"></i>Beauty Shop
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Barra de búsqueda -->
                    <form class="search-form d-flex mx-auto" style="max-width: 400px;">
                        <i class="fas fa-search search-icon"></i>
                        <input class="form-control me-2" type="search" placeholder="Buscar productos..."
                            aria-label="Search">
                    </form>

                    <!-- Menú de usuario -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Iniciar Sesión
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i> Registrarse
                            </a>
                        </li>
                        @else
                        <li class="nav-item me-3">
                            {{-- <a class="nav-link cart-icon" href="{{ route('cart.index') }}"> --}}
                                <i class="fas fa-shopping-bag fa-lg"></i>
                                <span class="cart-badge">
                                    {{ \App\Models\Cart::where('user_id', auth()->id())->sum('quantity') ?? 0 }}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Mi Perfil</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-box me-2"></i> Mis Pedidos</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-heart me-2"></i> Favoritos</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                    <div class="category-nav">
                        <div class="container">
                            <ul class="nav justify-content-center">
                                {{-- @foreach ($categories ?? [] as $category)
                                <li class="nav-item">
                                    <a href="{{ route('categories.show', $category->id) }}" class="nav-link">
                                        {{ $category->name }}
                                    </a>
                                </li>
                                @endforeach --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Barra de categorías -->
    </header>

    <main>
        <!-- Hero section con fondo degradado y patrón -->
        <div class="product-hero-section">
            <div class="container">
                <nav aria-label="breadcrumb" class="py-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li> --}}
                        {{-- @if($product->category)
                        <li class="breadcrumb-item"><a href="{{ route('categories.show', $product->category->id) }}">{{
                                $product->category->name }}</a></li>
                        @endif --}}
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card product-card border-0 shadow-lg overflow-hidden">
                        <div class="row g-0">
                            <!-- Imagen del producto -->
                            <div class="col-md-6 position-relative">
                                <div class="position-absolute top-0 start-0 m-3 z-3">
                                    @if($product->featured)
                                    <span class="badge bg-primary rounded-pill px-3 py-2 me-2">Destacado</span>
                                    @endif
                                    @if($product->stock <= 5 && $product->stock > 0)
                                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2">¡Últimas
                                            unidades!</span>
                                        @endif
                                </div>
                                <div class="product-image-wrapper">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="product-image">
                                    <div class="product-image-overlay">
                                        <button class="btn btn-sm btn-light rounded-circle">
                                            <i class="fas fa-search-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Detalles del producto -->
                            <div class="col-md-6">
                                <div class="card-body p-4 p-md-5">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <span class="text-uppercase small fw-bold text-primary">
                                            {{ $product->category->name ?? 'Sin categoría' }}
                                        </span>
                                        <div>
                                            <button class="btn btn-sm btn-outline-secondary rounded-circle">
                                                <i class="far fa-heart"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary rounded-circle ms-2">
                                                <i class="fas fa-share-alt"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <h2 class="card-title fw-bold mb-3">{{ $product->name }}</h2>

                                    <div class="mb-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <h3 class="fw-bold text-primary mb-0">${{ number_format($product->price, 2)
                                                }}</h3>
                                            @if(isset($product->original_price) && $product->original_price >
                                            $product->price)
                                            <span class="ms-3 text-decoration-line-through text-muted">${{
                                                number_format($product->original_price, 2) }}</span>
                                            <span class="ms-2 badge bg-danger">
                                                {{ round((1 - $product->price / $product->original_price) * 100) }}% OFF
                                            </span>
                                            @endif
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                @for($i = 1; $i <= 5; $i++) <i
                                                    class="fas fa-star {{ $i <= ($product->rating ?? 5) ? 'text-warning' : 'text-muted' }} small">
                                                    </i>
                                                    @endfor
                                            </div>
                                            <span class="small text-muted">({{ $product->reviews_count ?? 0 }}
                                                reseñas)</span>
                                        </div>
                                    </div>

                                    <p class="card-text mb-4">{{ $product->description }}</p>

                                    <div class="mb-4">
                                        <div class="d-flex align-items-center">
                                            @if($product->stock > 0)
                                            <span class="badge bg-success rounded-pill px-3 py-2">
                                                <i class="fas fa-check-circle me-1"></i> En stock
                                            </span>
                                            @else
                                            <span class="badge bg-danger rounded-pill px-3 py-2">
                                                <i class="fas fa-times-circle me-1"></i> Agotado
                                            </span>
                                            @endif
                                            <span class="ms-3 small text-muted">{{ $product->stock }} unidades
                                                disponibles</span>
                                        </div>
                                    </div>

                                    <!-- Características del producto -->
                                    <div class="product-features mb-4">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <div class="feature-item">
                                                    <i class="fas fa-truck"></i>
                                                    <span>Envío gratis</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="feature-item">
                                                    <i class="fas fa-shield-alt"></i>
                                                    <span>Garantía de calidad</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="feature-item">
                                                    <i class="fas fa-exchange-alt"></i>
                                                    <span>Devolución fácil</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="feature-item">
                                                    <i class="fas fa-lock"></i>
                                                    <span>Pago seguro</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ route('product.processBuy', $product->id) }}" method="POST"
                                        class="mt-4">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="quantity" class="form-label fw-medium">Cantidad</label>
                                            <div class="input-group quantity-selector">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    onclick="decrementQuantity()">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="number" name="quantity" id="quantity" min="1"
                                                    max="{{ $product->stock }}" value="1" required
                                                    onchange="updateTotal()"
                                                    class="form-control text-center @error('quantity') is-invalid @enderror">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    onclick="incrementQuantity()">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            @error('quantity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div
                                            class="d-flex justify-content-between align-items-center mb-4 py-3 border-top border-bottom">
                                            <span class="fw-bold">Total</span>
                                            <span class="fw-bold text-primary" id="total-price">${{
                                                number_format($product->price, 2) }}</span>
                                        </div>

                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-beauty py-3">
                                                <i class="fas fa-shopping-cart me-2"></i> Comprar ahora
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary py-3">
                                                <i class="fas fa-heart me-2"></i> Añadir al carrito
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pestañas de información adicional -->
                    <div class="product-tabs mt-5">
                        <ul class="nav nav-tabs" id="productTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                    aria-selected="true">Descripción</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="specifications-tab" data-bs-toggle="tab"
                                    data-bs-target="#specifications" type="button" role="tab"
                                    aria-controls="specifications" aria-selected="false">Especificaciones</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                    type="button" role="tab" aria-controls="reviews" aria-selected="false">Reseñas ({{
                                    $product->reviews_count ?? 0 }})</button>
                            </li>
                        </ul>
                        <div class="tab-content p-4 bg-white shadow-sm rounded-bottom" id="productTabsContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <p>{{ $product->description }}</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget
                                    ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl.
                                    Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies
                                    nisl nisl eget nisl.</p>
                            </div>
                            <div class="tab-pane fade" id="specifications" role="tabpanel"
                                aria-labelledby="specifications-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Marca</th>
                                                <td>Beauty Shop</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Peso</th>
                                                <td>150g</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Dimensiones</th>
                                                <td>10 × 5 × 5 cm</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Ingredientes</th>
                                                <td>Agua, glicerina, extractos naturales</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">País de origen</th>
                                                <td>México</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-summary mb-4">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 text-center">
                                            <div class="display-4 fw-bold text-primary">4.8</div>
                                            <div class="mb-2">
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star-half-alt text-warning"></i>
                                            </div>
                                            <p class="text-muted">Basado en {{ $product->reviews_count ?? 12 }} reseñas
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="rating-bars">
                                                <div class="rating-bar d-flex align-items-center mb-2">
                                                    <span class="me-2">5</span>
                                                    <i class="fas fa-star text-warning me-2"></i>
                                                    <div class="progress flex-grow-1" style="height: 8px;">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 75%"></div>
                                                    </div>
                                                    <span class="ms-2">75%</span>
                                                </div>
                                                <div class="rating-bar d-flex align-items-center mb-2">
                                                    <span class="me-2">4</span>
                                                    <i class="fas fa-star text-warning me-2"></i>
                                                    <div class="progress flex-grow-1" style="height: 8px;">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 20%"></div>
                                                    </div>
                                                    <span class="ms-2">20%</span>
                                                </div>
                                                <div class="rating-bar d-flex align-items-center mb-2">
                                                    <span class="me-2">3</span>
                                                    <i class="fas fa-star text-warning me-2"></i>
                                                    <div class="progress flex-grow-1" style="height: 8px;">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 5%"></div>
                                                    </div>
                                                    <span class="ms-2">5%</span>
                                                </div>
                                                <div class="rating-bar d-flex align-items-center mb-2">
                                                    <span class="me-2">2</span>
                                                    <i class="fas fa-star text-warning me-2"></i>
                                                    <div class="progress flex-grow-1" style="height: 8px;">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 0%"></div>
                                                    </div>
                                                    <span class="ms-2">0%</span>
                                                </div>
                                                <div class="rating-bar d-flex align-items-center">
                                                    <span class="me-2">1</span>
                                                    <i class="fas fa-star text-warning me-2"></i>
                                                    <div class="progress flex-grow-1" style="height: 8px;">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 0%"></div>
                                                    </div>
                                                    <span class="ms-2">0%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <!-- Lista de reseñas -->
                                <div class="reviews-list">
                                    <div class="review-item mb-4 pb-4 border-bottom">
                                        <div class="d-flex">
                                            <img src="https://via.placeholder.com/50" alt="User"
                                                class="rounded-circle me-3">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h6 class="mb-0 me-2">María García</h6>
                                                    <small class="text-muted">- hace 2 días</small>
                                                </div>
                                                <div class="mb-2">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                </div>
                                                <p>¡Excelente producto! Lo he estado usando por una semana y ya veo
                                                    resultados. La textura es suave y se absorbe rápidamente.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="review-item mb-4 pb-4 border-bottom">
                                        <div class="d-flex">
                                            <img src="https://via.placeholder.com/50" alt="User"
                                                class="rounded-circle me-3">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h6 class="mb-0 me-2">Carlos Rodríguez</h6>
                                                    <small class="text-muted">- hace 1 semana</small>
                                                </div>
                                                <div class="mb-2">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="far fa-star text-warning"></i>
                                                </div>
                                                <p>Muy buen producto, aunque el envase podría ser mejor. El aroma es
                                                    agradable y cumple con lo prometido.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button class="btn btn-outline-primary">Ver todas las reseñas</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Productos relacionados -->
                    <div class="related-products mt-5">
                        <h3 class="fw-bold mb-4">También te puede interesar</h3>
                        <div class="row row-cols-2 row-cols-md-4 g-4">
                            @for($i = 1; $i <= 4; $i++) <div class="col">
                                <div class="card h-100 product-card-small border-0 shadow-sm">
                                    <div class="product-badge">
                                        @if($i == 1)
                                        <span class="badge bg-danger">-15%</span>
                                        @elseif($i == 3)
                                        <span class="badge bg-primary">Nuevo</span>
                                        @endif
                                    </div>
                                    <div class="product-img-wrapper">
                                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                            alt="Producto relacionado">
                                        <div class="product-actions">
                                            <button class="btn btn-sm btn-light rounded-circle" title="Vista rápida">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-light rounded-circle"
                                                title="Añadir al carrito">
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                            <button class="btn btn-sm btn-light rounded-circle"
                                                title="Añadir a favoritos">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title small fw-bold">Producto relacionado {{ $i }}</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text text-primary fw-bold mb-0">${{
                                                number_format($product->price * 0.9, 2) }}</p>
                                            <div class="small">
                                                <i class="fas fa-star text-warning"></i>
                                                <span class="text-muted">4.8</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h5>Beauty Shop</h5>
                    <p style="color: rgba(255,255,255,0.7);"    >Tu tienda de confianza para productos de belleza y maquillaje de alta calidad.
                    </p>
                    <div class="mt-3">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                {{-- <div class="col-md-3 mb-4">
                    <h5>Categorías</h5>
                    @foreach ($categories ?? [] as $category)
                    <a href="{{ route('categories.show', $category->id) }}" class="footer-link">{{ $category->name
                        }}</a>
                    @endforeach
                </div> --}}
                <div class="col-md-3 mb-4">
                    <h5>Información</h5>
                    <a href="#" class="footer-link">Sobre Nosotros</a>
                    <a href="#" class="footer-link">Contacto</a>
                    <a href="#" class="footer-link">Términos y Condiciones</a>
                    <a href="#" class="footer-link">Política de Privacidad</a>
                    <a href="#" class="footer-link">Preguntas Frecuentes</a>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Mi Cuenta</h5>
                    <a href="{{ route('login') }}" class="footer-link">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="footer-link">Registrarse</a>
                    {{-- <a href="{{ route('cart.index') }}" class="footer-link">Mi Carrito</a> --}}
                    <a href="#" class="footer-link">Mis Pedidos</a>
                    <a href="#" class="footer-link">Favoritos</a>
                </div>
            </div>
            <hr class="mt-4 mb-3" style="border-color: rgba(255,255,255,0.1);">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p style="color: rgba(255,255,255,0.7);" class="mb-0">&copy; {{ date('Y') }} Beauty Shop. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Funciones para incrementar/decrementar cantidad
        function incrementQuantity() {
            const input = document.getElementById('quantity');
            const max = parseInt(input.getAttribute('max'));
            const currentValue = parseInt(input.value);

            if (currentValue < max) {
                input.value = currentValue + 1;
                updateTotal();
            }
        }

        function decrementQuantity() {
            const input = document.getElementById('quantity');
            const currentValue = parseInt(input.value);

            if (currentValue > 1) {
                input.value = currentValue - 1;
                updateTotal();
            }
        }

        // Función para actualizar el precio total
        function updateTotal() {
            const quantity = parseInt(document.getElementById('quantity').value);
            const price = {{ $product->price }};
            const total = (quantity * price).toFixed(2);

            document.getElementById('total-price').textContent = '$' + new Intl.NumberFormat('es-MX').format(total);
        }
    </script>
</body>

</html>