@extends("cartLayout")

@section("content")

    <article class="container d-flex col-8 flex-column justify-content-center align-items-center vh-100">
        <h1>Thank you for your order! It will be delivered within 5 days.</h1>
        <a href="{{ route('welcome') }}">Back to homepage</a>
    </article>

@endsection
