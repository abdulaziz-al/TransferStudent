@extends('layouts.app')
@section('content')


<!-- 
الاسم 
الايميل 
رقم الجوال 
رئيس قسم ايش/ القسم بنسبة للطالب 
-->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">


<div class="card" id="cardd">
    <div class="card-body">

    <label>Name: {{$user->name}}</label>
    <br>
    <label>Email:{{$user->email}}</label>
    <br>
    <label >Phone:{{$user->phone}}</label>
        <br>
    <label >Background:<a href="/background">{{$stu->background}}</a></label>
        <br>                        
        <label >Location:{{$location->zones}}</label>
        <br>

    <label>Department: {{$department->name}}</label>
        <br>
        <a href="#" class="btn btn-primary" style="margin: auto">Edit</a>
    
      </div>




</div>


</div>
</div>



</div>


    
@endsection