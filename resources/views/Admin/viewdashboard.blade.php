@extends('admin/dashboard')

@section('page_title', 'View Dashboard')

@section('container')



<h1>View Dashboard</h1>
<div class="container">
    
    <div class="box church-box">
        <h1 class="data">Church Profile</h1>
        <p class="world">{{$church}}</p>
    </div>

    <div class="box announcements-box">
        <h1 class="data">Announcements</h1>
        <p class="world">{{$announcements}}</p>
    </div>

    <div class="box schedule-box">
        <h1 class="data">Schedule</h1>
        <p class="world">{{$schedule}}</p>
    </div>

    <div class="box mass-intentions-box">
        <h1 class="data">Mass Intentions</h1>
        <p class="world">{{$mass}}</p>
    </div>
</div>



@endsection