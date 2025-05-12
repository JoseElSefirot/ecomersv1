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

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }

            .category-nav {
                overflow-x: auto;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .category-nav::-webkit-scrollbar {
                display: none;
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
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <button class="nav-link" onclick="showProducts('{{ $category->id }}')">
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
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h5>Beauty Shop</h5>
                    <p class="text-muted">Tu tienda de confianza para productos de belleza y maquillaje de alta calidad.</p>
                    <div class="mt-3">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Categorías</h5>
                    @foreach ($categories as $category)
                        <a href="#" class="footer-link">{{ $category->name }}</a>
                    @endforeach
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
                    <a href="#" class="footer-link">Iniciar Sesión</a>
                    <a href="#" class="footer-link">Registrarse</a>
                    <a href="#" class="footer-link">Mi Carrito</a>
                    <a href="#" class="footer-link">Mis Pedidos</a>
                    <a href="#" class="footer-link">Favoritos</a>
                </div>
            </div>
            <hr class="mt-4 mb-3" style="border-color: rgba(255,255,255,0.1);">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-muted">&copy; {{ date('Y') }} Beauty Shop. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <img src="https://via.placeholder.com/250x30" alt="Métodos de pago" class="img-fluid" style="max-height: 30px;">
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showProducts(categoryId) {
            fetch(`/api/categories/${categoryId}/products`)
                .then(response => response.json())
                .then(data => {
                    const productCards = document.getElementById('product-cards');
                    productCards.innerHTML = ''; // Limpiar tarjetas anteriores

                    if (data.length > 0) {
                        data.forEach(product => {
                            const card = `
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img src="${product.image}" class="card-img-top" alt="${product.name}" style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title">${product.name}</h5>
                                            <p class="card-text">$${product.price}</p>
                                            <button class="btn btn-beauty">Comprar</button>
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
    </script>
</body>
</html>