@extends('admin/dashboard')

@section('page_title', 'Users')

@section('container')


<h2>Admins</h2>
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif 

          <div class="container mt-3">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Images</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>About</th>
        <th>Inters</th>
        <th>Church</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $lists)
      <tr>
        <td>{{$lists->id}}</td>
        <td>{{$lists->image}}</td>
        <td>{{$lists->name}}</td>
        <td>{{$lists->phone}}</td>
        <td>{{$lists->address}}</td>
        <td>{{$lists->about}}</td>
        <td>{{$lists->inters}}</td>
         <td>{{$lists->church}}</td>
      </tr>
       @endforeach
     
    </tbody>
  </table>
</div>
       
@endsection

