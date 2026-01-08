@extends("layout")

@section("title", "About")

<style>
    @media only screen and (min-width:768px) and (max-width:991.98px) {
        .textSize {
            font-size: 1.8rem;
        }

    }
</style>

@section("content")
    <article class="container d-flex flex-column col-8 col-md-10 textSize" style="margin-top:150px;">
        <div class="p-3">
            <h1>Welcome to MaskeShop.rs!</h1>
            <p>We specialize in high-quality iPhone cases designed to protect your device while adding style and personality. Our mission is to combine durability with sleek design, offering you reliable protection without compromising on looks. With attention to detail and premium materials, we ensure your iPhone stays safe and stands out. Thank you for choosing us to safeguard your device!On our site, you can also find a range of additional iPhone accessories, such as charger adapters, headphones, and more.</p>
        </div>

        <div class="text-center">
            <img class="col-8 vh-80" src="{{ asset('/images/logo.png') }}">
        </div>

    </article>

@endsection
