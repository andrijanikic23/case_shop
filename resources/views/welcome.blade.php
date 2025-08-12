@extends("layout")

@section("title", "Home")

@section("content")

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/logo.png" class="d-block w-100" style="height:1000px;" alt="First slide">
            </div>
            <div class="carousel-item">
                <img src="images/logo2.png" class="d-block w-100" style="height:1000px;" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img src="images/iphone_cases_background.jpg" class="d-block w-100" style="height:1000px;" alt="Third slide">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


@endsection
