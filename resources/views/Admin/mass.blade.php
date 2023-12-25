@extends('admin/dashboard')

@section('page_title', 'Mass Intentions')

@section('container')


<h2>Mass Intentions</h2>
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
     <a href="{{url('admin/mangemass')}}">
        <button type="button" class="btn btn-success">
            Add Mass Intentions
        </button>
    </a>  

          <div class="container mt-3">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Date</th>
        <th>About</th>
        <th>Topic</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
   @foreach($infomation as $list)
      <tr>
        <td>{{$list->id}}</td>
        <td><img src="{{asset('assets/mass/'.$list->images)}}" style="height: 150px; width: 150px;"  alt=""></td>
        <td>{{$list->name}}</td>
        <td>{{$list->startdate}}</td>
        <td>{{$list->about}}</td>
        <td>{{$list->topic}}</td>
        <td>
             <a href="{{url('admin/mangemass/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
             <a href="{{url('admin/massdelete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>
        
      </tr>
       @endforeach

    </tbody>
  </table>
</div>
       
@endsection

