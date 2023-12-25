@extends('admin/dashboard')

@section('page_title', 'Manage Admin')

@section('container')

<!-- Start Back button -->
   <div class="overview-wrap">
    <h2 class="title-1">Church Profile</h2>
    <a href="{{url('admin/church')}}" class="au-btn au-btn-icon au-btn--blue">
        <i class="zmdi zmdi-plus "></i>Back</a>
</div>
<!-- End Back Button -->
<!-- Start Form -->
          <div class="card">
            <div class="card-body">
                  <form action="{{route('admin.process')}}"  method="post" enctype="multipart/form-data">
                   <input type="hidden" name="id" value="{{$id}}"/>
                      @csrf
                    <div class="mb-3">
                      <label  class="form-label">Photo</label>
                      <input type="file" class="form-control" id="photo" placeholder="Enter Your Photo" name="photo"  value="{{$photo}}">
                       @error('photo')
                                <p class="error_message">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" value={{$email}}>
                       @error('email')
                                <p class="error_message">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" placeholder="Enter Your Password" name="password"  value={{$password}}>
                       @error('password')
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
                      <label  class="form-label">About Short</label>
                      <input type="text" class="form-control" id="aboutshort" placeholder="Enter Your About Short" name="aboutshort" value="{{$aboutshort}}">
                       @error('aboutshort')
                                <p class="error_message">{{$message}}</p>
                       @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">About Long</label>
                      <input type="text" class="form-control" id="aboutlong" placeholder="Enter Your About Long" name="aboutlong" value="{{$aboutlong}}">
                       @error('aboutlong')
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
                      <label  class="form-label">Time</label>
                      <input type="time" class="form-control" id="starttime" placeholder="Enter Your Time" name="starttime" value="{{$starttime}}">
                       @error('starttime')
                                <p class="error_message">{{$message}}</p>
                       @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>
        
<!-- End Form -->


@endsection

