@extends('admin/dashboard')

@section('page_title', 'Admin')

@section('container')


<h2>Admins</h2>
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
     <a href="{{url('admin/manage_admin')}}">
        <button type="button" class="btn btn-success">
            Add SubAdmin
        </button>
    </a>  

          <div class="container mt-3">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Email</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($data as $list)
      <tr>
        <td>{{$list->id}}</td>
        <td>{{$list->email}}</td>
        <td>{{$list->name}}</td>
        <td>
             <a href="{{url('admin/manage_admin/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
             <a href="{{url('admin/admindelete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>
      </tr>
       @endforeach
     
    </tbody>
  </table>
</div>
       
@endsection

