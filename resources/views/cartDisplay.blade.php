@extends("cartLayout")


@section("content")

    @foreach($cartItems as $item)
        <article class="container col-8 d-flex flex-column flex-wrap bg-secondary mb-3">
            <div class="d-flex" style="gap:15px;">
                <img class="w-30 p-3" style="height:200px; width:200px;" src="{{ $item["image_url"] }}" alt="Image of iphone case">
                <div class="d-flex flex-column flex-wrap justify-content-center">
                    <h1>{{ $item["product_name"] }}</h1>
                    <h5>Desired quantity -> {{ $item["quantity"] }}</h5>
                    <h5>Price -> {{ $item["price"] }}RSD</h5>
                    <form action="{{ route('cart.minus') }}" method="POST" style="display:inline;">
                        {{ csrf_field() }}
                        <input name="productId" type="hidden" value="{{ $item['product_id'] }}">
                        <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer;"><i class="fa-solid fa-square-minus fa-2x"></i></button>
                    </form>

                </div>
            </div>

        </article>

    @endforeach

    <article class="container col-8 d-flex flex-row flex-wrap bg-info p-2" style="gap: 300px;">
        <h1>Total price: {{ $totalPrice }}RSD</h1>
        <form method="POST" action="{{ route('order.finished') }}">
            {{ csrf_field() }}
            <input name="totalPrice" type="hidden" step="0.01" value="{{ $totalPrice }}">
            <button class="btn btn-dark fs-5" style="width:200px; height:50px;">Order items</button>
        </form>
    </article>
@endsection
