@extends('admin/dashboard')

@section('page_title', 'Manage Announcement')

@section('container')

<!-- Start Back button -->
   <div class="overview-wrap">
    <h2 class="title-1">Announcement</h2>
    <a href="{{url('admin/announcements')}}" class="au-btn au-btn-icon au-btn--blue">
        <i class="zmdi zmdi-plus "></i>Back</a>
</div>
<!-- End Back Button -->
<!-- Start Form -->
          <div class="card">
            <div class="card-body">
                 <form action="{{route('admin.manage_announcements')}}"  method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$id}}"/>
                  
                      @csrf
                    <div class="mb-3">
                      <label  class="form-label">Photo</label>
                      <input type="file" class="form-control" id="images" placeholder="Enter Your Photo" name="images"  value="{{$images}}">
                       @error('images')
                                <p class="error_message">{{$message}}</p>
                      @enderror
                    </div>
                
                    <div class="mb-3">
                      <label  class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" value="{{$name}}">
                       @error('name')
                                <p class="error_message">{{$message}}</p>
                       @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Date</label>
                      <input type="date" class="form-control" id="startdate" placeholder="Enter Your Date" name="startdate" value="{{$startdate}}">
                       @error('startdate')
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
                      <input type="text" class="form-control" id="location" placeholder="Enter Your Topic" name="topic" value="{{$topic}}">
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

