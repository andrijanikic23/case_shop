@extends("cartLayout")


@section("content")

    <article class="container col-8 d-flex flex-row gap-5 mt-5">
        <div>
            <img src="{{ asset('images/logo.png') }}" style="height:200px; width:200px;">
            <div class="mt-3 d-flex flex-column" style="gap:0px;">
                <p><i class="fa-solid fa-briefcase"></i> Type: <span class="bg-secondary rounded"> {{ $career["type"] }} </span></p>
                <p><i class="fa-solid fa-location-dot"></i> Location: <span class="bg-secondary rounded"> {{ $career["location"] }} </span></p>
                <p><i class="fa-solid fa-laptop"></i> Category: <span class="bg-secondary rounded">{{ \App\Http\JobHelper::departmentName($career["department_id"]) }}</span></p>
                @if($career["salary"] !== null)
                    <p><i class="fa-solid fa-money-bill"></i> <span class="bg-secondary rounded"> {{ $career["type"] }} </span></p>
                @else
                    <p><i class="fa-solid fa-money-bill"></i> Competitive salary</p>
                @endif
                <p><i class="fa-solid fa-calendar-check"></i> We accept applications until <span class="bg-secondary rounded"> {{ $career["deadline"] }} </span></p>
            </div>

        </div>

        <div>
            <h1>{{ $career["title"] }}</h1>
            <h3 class="mt-2">Position description:  {{ $career["description"] }}</h3>
            @error("fullName")
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error("email")
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @if(\Illuminate\Support\Facades\Session::has("success"))
                <p class="text-success">{{ \Illuminate\Support\Facades\Session::get("success") }}</p>
            @endif
            <form class="d-flex flex-column" method="POST" action="{{ route('application.confirmed') }}">
                {{ csrf_field() }}
                <input type="hidden" name="jobId" value="{{ $career["id"] }}">
                <label for="fullName">Full name</label>
                <input type="text" name="fullName" placeholder="enter your full name">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Enter your email">
                <label for="cvPath">CV path</label>
                <input type="text" name="cvPath" placeholder="Enter your CV path">
                <label for="message">Message</label>
                <textarea type="text" name="message" placeholder="Message" style="height:150px;"></textarea>
                <button class="btn btn-success mt-3">Apply</button>
            </form>

        </div>

    </article>

@endsection
