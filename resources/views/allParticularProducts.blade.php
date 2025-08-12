@extends("layout")

@section("title", \App\Http\ProductsHelper::getTitle($categoryId))

@section("content")

        <form class="container col-6" style="margin-top:80px;" method="GET" action="{{ route('product.search') }}">
            <div class="d-flex flex-column">
                @if(\Illuminate\Support\Facades\Session::has("error"))
                    <p class="text-danger">{{ \Illuminate\Support\Facades\Session::get("error") }}</p>
                @endif
            </div>
            <div class="mb-3">
                {{ csrf_field() }}
                <label for="searchCases" class="form-label">Search for products</label>
                <input type="text" class="form-control" name="product" value="{{ request('product') }}" id="searchCases" aria-describedby="searchHelp" placeholder="Search">
                <input type="hidden" name="categoryId" value="{{ $categoryId }}">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <br>

        <article class="container d-flex flex-wrap align-items-center justify-content-center" style="gap:10px;">
                @foreach($products as $product)
                    <div class="card col-3 bg-secondary">
                        <img src="{{ $product['image_url'] }}" class="card-img-top" style="height:320px;" alt="Case image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product["name"] }}</h5>
                            <p class="card-text">{{ $product["description"] }}</p>
                            <p class="card-text">{{ $product["price"] }}RSD</p>
                            <a href="{{ route('product.view', ["product" => $product["id"]]) }}" class="btn btn-primary">View product</a>
                        </div>
                    </div>
                @endforeach
            </article>


@endsection
