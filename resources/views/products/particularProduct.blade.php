@extends("layout")

@section("content")

    <article class="container d-flex flex-wrap col-12 border border-5 rounded border-secondary bg-secondary" style="margin-top: 80px;">
        <img class="col-6" src="{{ $product['image_url'] }}" alt="Product image">
        <div class="d-flex flex-column col-6 p-5">
            @if(\Illuminate\Support\Facades\Session::has("success"))
                <p class="text-success">{{ \Illuminate\Support\Facades\Session::get("success") }}</p>
            @endif
            <h1 class="text-white">{{ $product["name"] }}</h1>
            <h3>{{ $product["description"] }}</h3>
            <p><i class="fa-solid fa-sack-dollar"></i> Price -> {{ $product["price"] }}RSD</p>
            <p>Stock -> {{ $product["stock"] }}</p>
            <form method="POST" action="{{ route('cart.add') }}">
                {{ csrf_field() }}
                <label for="quantity">Quantity -> </label>
                <input type="number" name="quantity" placeholder="Enter desired quantity">
                <br>
                <input type="hidden" name="productId" value="{{ $product['id'] }}">
                <br>
                <input type="hidden" name="singleProductPrice" value="{{ $product['price'] }}">
                <input type="hidden" name="imageUrl" value="{{ $product['image_url'] }}">
                <input type="hidden" name="productName" value="{{ $product['name'] }}">
                <button class="btn btn-primary">Add to cart</button>
            </form>

            <br>


            <form method="POST" action="{{ route('review.stars') }}">
                {{ csrf_field() }}
                <textarea type="text" name="comment" placeholder="Leave us a comment about this product" style="width:400px; height:200px;"></textarea>
                <br>
                <label for="rating">Rate this product</label>
                <select name="rating">
                    <option disabled selected>Pick here</option>
                    <option value="1">★☆☆☆☆</option>
                    <option value="2">★★☆☆☆</option>
                    <option value="3">★★★☆☆</option>
                    <option value="4">★★★★☆</option>
                    <option value="5">★★★★★</option>
                </select>
                <input name="productId" type="hidden" value="{{ $product["id"] }}">
                <input name="userId" type="hidden" value="{{ \Illuminate\Support\Facades\Auth::id() }}">

                <button type="submit">Share review</button>
            </form>
        </div>

    </article>


    @php

    @endphp

    <article class="container d-flex flex-wrap mt-5" style="gap:5px;">
        <h1 class="d-flex col-12">Clients Reviews</h1>
        @foreach($reviews as $review)
            <div class="col-5 w-20 d-flex flex-column border border-white" style="height:200px;">
                <p class="p-3">{{ $review["comment"] }}</p>
                <div class="d-flex flex-row justify-content-start align-items-end">
                    <img class="rounded-circle" style="width:50px; height:50px;" src="https://i.pinimg.com/474x/07/c4/72/07c4720d19a9e9edad9d0e939eca304a.jpg">
                    <h5 class="p-3">{{ $review->user->name }}</h5>
                    <h3 class="p-3" class="">{{ \App\Http\ReviewsHelper::getStarsNumber($review["rating"]) }}</h3>
                </div>
            </div>
        @endforeach
    </article>

@endsection


