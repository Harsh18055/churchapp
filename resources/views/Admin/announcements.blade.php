@extends('admin/dashboard')

@section('page_title', 'Announcement')

@section('container')


<h2>Announcements</h2>
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
     <a href="{{url('admin/manage_announcements')}}">
        <button type="button" class="btn btn-success">
            Add Announcements
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
   @foreach($accountt as $list)
      <tr>
        <td>{{$list->id}}</td>
        <td><img src="{{asset('assets/accountes/'.$list->images)}}" style="height: 150px; width: 150px;"  alt=""></td>
        <td>{{$list->name}}</td>
        <td>{{$list->startdate}}</td>
        <td>{{$list->about}}</td>
        <td>{{$list->topic}}</td>
        <td>
             <a href="{{url('admin/manage_announcements/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
             <a href="{{url('admin/announcementsdelete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>
        
      </tr>
       @endforeach

    </tbody>
  </table>
</div>
       
@endsection

