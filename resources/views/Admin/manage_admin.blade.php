@extends('admin/dashboard')

@section('page_title', 'Manage Admin')

@section('container')

<!-- Start Back button -->
   <div class="overview-wrap">
    <h2 class="title-1">Manage Admins</h2>
    <a href="{{url('admin/admins')}}" class="au-btn au-btn-icon au-btn--blue">
        <i class="zmdi zmdi-plus "></i>Back</a>
</div>
<!-- End Back Button -->

<!-- Start Form -->
          <div class="card">
            <div class="card-body">
                  <form action="{{route('create.admins')}}"  method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$id}}"/>
                      @csrf
                    <div class="mb-3">
                      <label  class="form-label">Email address</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" value="{{$email}}">
                       @error('email')
                                <p class="error_message">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" placeholder="Enter Your Password" name="password" >
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>
        
<!-- End Form -->

@endsection

