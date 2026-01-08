@php use Illuminate\Support\Facades\Session; @endphp
@extends("layout")

@section("title", "Add product - MaskeShop.rs")

@section("content")

    <form class="container d-flex flex-column justify-content-center align-items-center"
          style="margin-top:150px;gap:20px;" method="POST" action="{{ route('product.added') }}">
        {{ csrf_field() }}
        <div class="d-flex flex-column">
            @if(Session::has("success"))
                <p class="text-success">{{ Session::get("success") }}</p>
            @endif
        </div>
        <div class="d-flex flex-column form-group col-10 col-lg-8 col-md-12">
            <label id="productName">Product name</label>
            <input class="form-control input-sm" id="productName" name="name" type="text"
                   placeholder="Enter product name">
        </div>
        <div class="d-flex flex-column form-group col-10 col-lg-8 col-md-12">
            <label id="description">Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Description"
                      rows="5"></textarea>
        </div>
        <div class="d-flex flex-column form-group col-10 col-lg-8 col-md-12">
            <label id="price">Price</label>
            <input class="form-control input-sm" id="price" name="price" type="number" step="0.01"
                   placeholder="Enter product price">
        </div>
        <div class="d-flex flex-column form-group col-10 col-lg-8 col-md-12">
            <label id="image">Image url</label>
            <input class="form-control input-sm" id="image" name="imageUrl" type="text" placeholder="Enter image url">
        </div>
        <div class="d-flex flex-column form-group col-10 col-lg-8 col-md-12">
            <select name="category">
                <option disabled selected>Select product category</option>
                <option>Phone case</option>
                <option>Charger</option>
                <option>Headset</option>
            </select>
        </div>
        <div class="d-flex flex-column form-group col-10 col-lg-8 col-md-12">
            <label id="stock">Stock</label>
            <input class="form-control input-sm" id="stock" name="stock" type="number" placeholder="Enter stock">
        </div>

        <button class="btn btn-primary form-group col-6 col-lg-4 col-md-12">Save product</button>
    </form>

@endsection
