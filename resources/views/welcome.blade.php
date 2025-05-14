<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Shop - @yield('title', 'Tienda de Maquillaje')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
            background-color: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: #fff;
        }

        .search-form .form-control::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .search-form .search-icon {
            position: absolute;
            left: 15px;
            top: 10px;
            color: rgba(255,255,255,0.7);
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
            color: rgba(255,255,255,0.7);
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
            background-color: rgba(255,255,255,0.1);
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
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
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

        /* Estilos adicionales para la página de bienvenida */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E"), linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 50px;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }

        .feature-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .feature-card .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .feature-card .card-body {
            padding: 1.5rem;
        }

        .feature-card .card-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark-color);
        }

        .feature-card .card-text {
            color: #666;
            margin-bottom: 20px;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background-color: rgba(255, 107, 129, 0.1);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .testimonial-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            padding: 30px;
        }

        .testimonial-card .quote {
            font-size: 1.1rem;
            font-style: italic;
            margin-bottom: 20px;
            color: #555;
        }

        .testimonial-card .customer {
            display: flex;
            align-items: center;
        }

        .testimonial-card .customer img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }

        .testimonial-card .customer-info h5 {
            margin-bottom: 0;
            font-weight: 600;
            font-size: 1rem;
        }

        .testimonial-card .customer-info p {
            margin-bottom: 0;
            font-size: 0.9rem;
            color: #777;
        }

        .testimonial-card .rating {
            color: #ffc107;
            margin-bottom: 15px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-title h2:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
        }

        .section-title p {
            color: #777;
            max-width: 700px;
            margin: 0 auto;
        }

        .product-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .product-card .card-img-top {
            height: 250px;
            object-fit: cover;
        }

        .product-card .card-body {
            padding: 1.5rem;
        }

        .product-card .card-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--dark-color);
        }

        .product-card .price {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .product-card .rating {
            color: #ffc107;
            margin-bottom: 15px;
        }

        .newsletter-section {
            background-color: var(--secondary-color);
            padding: 60px 0;
            margin: 80px 0;
        }

        .newsletter-form .form-control {
            border-radius: 25px 0 0 25px;
            border: none;
            padding: 12px 20px;
            height: auto;
        }

        .newsletter-form .btn {
            border-radius: 0 25px 25px 0;
            padding: 12px 25px;
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }

            .hero-section {
                padding: 50px 0;
            }

            .hero-section h1 {
                font-size: 2rem;
            }

            .hero-section p {
                font-size: 1rem;
            }

            .newsletter-form .form-control,
            .newsletter-form .btn {
                border-radius: 25px;
                margin-bottom: 10px;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                        <input class="form-control me-2" type="search" placeholder="Buscar productos..." aria-label="Search">
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
                                {{-- <a class="nav-link cart-icon" href="{{ route('cart.show') }}"> --}}
                                    <i class="fas fa-shopping-bag fa-lg"></i>
                                    <span class="cart-badge">
                                        {{ \App\Models\Cart::where('user_id', auth()->id())->sum('quantity') }}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle me-1"></i> {{ auth()->user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Mi Perfil</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-box me-2"></i> Mis Pedidos</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-heart me-2"></i> Favoritos</a></li>
                                    <li><hr class="dropdown-divider"></li>
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
                </div>
            </div>
        </nav>
        <!-- Barra de categorías -->
        <div class="category-nav">
            <div class="container">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <button class="nav-link active" id="all-products-btn" onclick="showAllProducts()">Todos los productos</button>
                    </li>
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <button class="nav-link" onclick="showProducts('{{ $category->id }}', this)">
                                {{ $category->name }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </header>

    <main class="container py-4">
        <div id="product-cards" class="row"></div>
        <!-- Alertas -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Contenido principal -->
        <div class="container py-4">
            @if(isset($product))
                @include('product.buy', ['product' => $product])
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h5>Beauty Shop</h5>
                    <p style="color: rgba(255,255,255,0.7);">Tu tienda de confianza para productos de belleza y maquillaje de alta calidad.
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
            {{-- <hr class="mt-4 mb-3" style="border-color: rgba(255,255,255,0.1);"> --}}
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p style="color: rgba(255,255,255,0.7);">&copy; {{ date('Y') }} Beauty Shop. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
        function clearActiveButtons() {
            document.querySelectorAll('.nav-link').forEach(btn => btn.classList.remove('active'));
        }

        function showAllProducts() {
            clearActiveButtons();
            document.getElementById('all-products-btn').classList.add('active');

            fetch('/api/products')
                .then(response => response.json())
                .then(data => {
                    const productCards = document.getElementById('product-cards');
                    productCards.innerHTML = '';

                    if (data.length > 0) {
                        data.forEach(product => {
                            const card = `
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img src="${product.image}" class="card-img-top" alt="${product.name}" style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title">${product.name}</h5>
                                            <p class="card-text">$${product.price}</p>
                                            <a href="/products/${product.id}" class="btn btn-beauty">Comprar</a>
                                        </div>
                                    </div>
                                </div>
                            `;
                            productCards.innerHTML += card;
                        });
                    } else {
                        productCards.innerHTML = '<p>No hay productos disponibles.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching products:', error);
                    const productCards = document.getElementById('product-cards');
                    productCards.innerHTML = '<p>Error al cargar productos.</p>';
                });
        }

        function showProducts(categoryId, btn) {
            clearActiveButtons();
            btn.classList.add('active');

            fetch(`/api/categories/${categoryId}/products`)
                .then(response => response.json())
                .then(data => {
                    const productCards = document.getElementById('product-cards');
                    productCards.innerHTML = '';

                    if (data.length > 0) {
                        data.forEach(product => {
                            const card = `
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img src="${product.image}" class="card-img-top" alt="${product.name}" style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title">${product.name}</h5>
                                            <p class="card-text">$${product.price}</p>
                                            <a href="/products/${product.id}" class="btn btn-beauty">Comprar</a>
                                        </div>
                                    </div>
                                </div>
                            `;
                            productCards.innerHTML += card;
                        });
                    } else {
                        productCards.innerHTML = '<p>No hay productos en esta categoría.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching products:', error);
                    const productCards = document.getElementById('product-cards');
                    productCards.innerHTML = '<p>Error al cargar productos.</p>';
                });
        }

        // Load all products on page load
        document.addEventListener('DOMContentLoaded', () => {
            showAllProducts();
        });
    </script>
</body>
</html>