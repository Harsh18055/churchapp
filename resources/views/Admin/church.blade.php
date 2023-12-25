@extends('admin/dashboard')

@section('page_title', 'Church Profile')

@section('container')


<h2>Church Profile</h2>
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
     <a href="{{url('admin/manage_church')}}">
        <button type="button" class="btn btn-success">
            Add Church Profile
        </button>
    </a>  

          <div class="container mt-3">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Email</th>
        <th>Name</th>
        <th>About Short</th>
        <th>About Long</th>
        <th>Location</th>
        <th>Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
   @foreach($data as $list)
      <tr>
        <td>{{$list->id}}</td>
        <td><img src="{{asset('assets/chrch/'.$list->photo)}}" style="height: 150px; width: 150px;"  alt=""> </td>
        <td>{{$list->email}}</td>
        <td>{{$list->name}}</td>
        <td>{{$list->aboutshort}}</td>
        <td>{{$list->aboutlong}}</td>
        <td>{{$list->location}}</td>
        <td>{{$list->starttime}}</td>
        <td>
             <a href="{{url('admin/manage_church/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
             <a href="{{url('admin/churchdelete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>
      </tr>
       @endforeach

    </tbody>
  </table>
</div>
       
@endsection

