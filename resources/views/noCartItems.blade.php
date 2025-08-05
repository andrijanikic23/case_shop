@extends("cartLayout")

@section("content")

    <article class="container d-flex col-8 flex-column justify-content-center align-items-center vh-100">
        <h1>Your cart is empty!</h1>
        <a href="{{ route('welcome') }}">Back to homepage</a>
    </article>

@endsection
