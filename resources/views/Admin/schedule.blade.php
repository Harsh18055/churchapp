@extends('admin/dashboard')

@section('page_title', 'Schedule')

@section('container')


<h2>Schedule</h2>
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
     <a href="{{url('admin/manage_schedule')}}">
        <button type="button" class="btn btn-success">
            Add Schedule
        </button>
    </a>  

          <div class="container mt-3">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Image</th>
        <th>Date</th>
        <th>Location</th>
        <th>About</th>
        <th>Topic</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
   @foreach($scheduledata as $lists)
      <tr>
        <td>{{$lists->id}}</td>
        <td>{{$lists->name}}</td>
        <td><img src="{{asset('assets/schedule/'.$lists->thumbnail)}}" style="height: 150px; width: 150px;"  alt=""> </td>
        <td>{{$lists->enddate}}</td>
        <td>{{$lists->location}}</td>
        <td>{{$lists->about}}</td>
        <td>{{$lists->topic}}</td>
        <td>
             <a href="{{url('admin/manage_schedule/')}}/{{$lists->id}}"><button type="button" class="btn btn-success">Edit</button></a>
             <a href="{{url('admin/scheduledelete/')}}/{{$lists->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>
      </tr>
       @endforeach

    </tbody>
  </table>
</div>
       
@endsection

