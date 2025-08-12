@php use App\Http\JobHelper; @endphp
@extends("cartLayout")

@section("title", "Job openings - MaskeShop.rs")

@section("head")
    <style>
        .searchApplyButton {
            background-color: black;
            color: #70d6d4;
        }

        .searchApplyButton:hover {
            background-color: #5151ef;
            color: white;
        }

        .keywordsInput {
            background-color: #5151ef;
            height: 50px;
            font-size: 20px;
        }

        .selects {
            background-color: #5151ef;
            height: 50px;
            font-size: 20px;
        }

    </style>

@endsection

@section("content")

    <article class="container col-8 mb-3">
        <h1 class="text-center">Find a Job</h1>
        <div class="row justify-content-center align-items-center gap-3"
             style="background-color:#5151ef; height:200px;">
            <form class="col-11" method="POST" action="{{ route('job.search') }}">
                {{ csrf_field() }}
                @error("type")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error("keywords")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row mb-2">
                    <div class="col-12">
                        <input class="form-control keywordsInput rounded" name="keywords" type="text"
                               placeholder="Keywords">
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-4">
                        <select class="form-select selects" name="type">
                            <option selected disabled>Choose type of work</option>
                            <option value="full-time">Full-time</option>
                            <option value="part-time">Part-time</option>
                            <option value="internship">Internship</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <select class="form-select selects" name="department">
                            <option selected disabled>Choose department</option>
                            <option value="1">IT</option>
                            <option value="2">HR</option>
                            <option value="3">Marketing</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <button class="searchApplyButton w-100" style="height:50px;">SEARCH JOBS</button>
                    </div>
                </div>
            </form>
        </div>
    </article>



    @foreach($careers as $career)
        <article class="container col-8 border-top border-bottom py-3">
            <div class="row align-items-center">
                <div class="col-5 d-flex flex-row gap-2">
                    <img src="{{ asset('images/logo.png') }}" style="height:100px; width:100px;">
                    <div>
                        <h3>{{ $career["title"] }}</h3>
                        <p>{{ $career["location"] }}</p>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <p>{{ JobHelper::departmentName($career["department_id"]) }}</p>
                    <p>{{ $career["type"] }}</p>
                </div>
                <div class="col-3 d-flex justify-content-center">
                    <form method="GET" action="{{ route('job.info') }}" style="width:100%;">
                        {{ csrf_field() }}
                        <input name="careerId" type="hidden" value="{{ $career['id'] }}">
                        <button class="searchApplyButton w-100" style="max-width:200px;">Apply</button>
                    </form>
                </div>
            </div>
        </article>
    @endforeach

@endsection
