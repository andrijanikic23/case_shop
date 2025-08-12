@extends("cartLayout")


@section("content")
    <form class="container col-8" method="POST" action="{{ route('job.posted') }}">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter job title">
        </div>
        <div class="mb-3">
            <label id="description">Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Description"
                      rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" id="location" placeholder="Enter location">
        </div>
        @error("type")
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <select class="mb-3" name="type">
            <option selected disabled>Choose type of work</option>
            <option value="full-time">Full-time</option>
            <option value="part-time">Part-time</option>
            <option value="internship">Internship</option>
        </select>
        <br>
        <select class="mb-3" name="department">
            <option selected disabled>Choose department</option>
            <option value="IT">IT</option>
            <option value="HR">HR</option>
            <option value="Marketing">Marketing</option>
        </select>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" name="salary" class="form-control" id="salary" placeholder="Enter salary">
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="date" name="deadline" class="form-control" id="deadline" placeholder="Enter deadline">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
