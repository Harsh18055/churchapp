@extends('admin/dashboard')

@section('page_title', 'Schedule')

@section('container')

<!-- Start Back button -->
   <div class="overview-wrap">
    <h2 class="title-1">Schedule</h2>
    <a href="{{url('admin/schedule')}}" class="au-btn au-btn-icon au-btn--blue">
        <i class="zmdi zmdi-plus "></i>Back</a>
</div>
<!-- End Back Button -->
<!-- Start Form -->
          <div class="card">
            <div class="card-body">
                  <form action="{{route('admin.manage_schedule')}}"  method="post" enctype="multipart/form-data">
                   <input type="hidden" name="id" value="{{$id}}"/>
                      @csrf
                    <div class="mb-3">
                      <label  class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" value="{{$name}}">
                       @error('name')
                                <p class="error_message">{{$message}}</p>
                       @enderror
                    </div>
                     <div class="mb-3">
                      <label  class="form-label">Photo</label>
                      <input type="file" class="form-control" id="thumbnail" placeholder="Enter Your Photo" name="thumbnail"  value="{{$thumbnail}}">
                       @error('thumbnail')
                                <p class="error_message">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">date</label>
                      <input type="date" class="form-control" id="aboutshort" placeholder="Enter Your Date" name="enddate" value="{{$enddate}}">
                       @error('enddate')
                                <p class="error_message">{{$message}}</p>
                       @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Location</label>
                      <input type="text" class="form-control" id="location" placeholder="Enter Your Location" name="location" value="{{$location}}">
                       @error('location')
                                <p class="error_message">{{$message}}</p>
                       @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">About</label>
                      <input type="text" class="form-control" id="about" placeholder="Enter Your About" name="about" value="{{$about}}">
                       @error('about')
                                <p class="error_message">{{$message}}</p>
                       @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Topic</label>
                      <input type="text" class="form-control" id="topic" placeholder="Enter Your Topic" name="topic" value="{{$topic}}">
                       @error('topic')
                                <p class="error_message">{{$message}}</p>
                       @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>
        
<!-- End Form -->


@endsection

