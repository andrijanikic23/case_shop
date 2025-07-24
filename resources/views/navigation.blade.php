<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">Maskeshop.rs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Homepage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="productsDropdown"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                        <li><a class="dropdown-item" href="{{ route('product.add') }}">Add product</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.cases', ['categoryId' => 1]) }}">iPhone Cases</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.chargers', ['categoryId' => 2]) }}">Chargers</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.headsets', ['categoryId' => 3]) }}">Headphones</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>

            </ul>
        </div>
        <div class="d-flex ms-auto">
            <ul class="navbar-nav pe-2">
                <li class="nav-item">
                    <a href="/cart" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </li>
                <li class="nav-item ps-2">
                    <a href="/cart" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
