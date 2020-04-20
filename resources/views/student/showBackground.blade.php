@extends('layouts.app')
@section('title')
  Show My Background
@endsection
@section('content')



<div class="container">
   
    
    <div class="col-md-8">
    
        <table class="table table-hover border-2" id="table">
            <thead class="head">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>status</th>
                </tr>
            </thead>
                <tbody class="tbody">
                    @foreach ($background as $backgrounds)
                    <tr>
     
                <td>{{$backgrounds->id}}</td>

                <td> <a href="/files/{{ Auth::user()->name }}/{{$backgrounds->path}}" download="{{$backgrounds->path}}">{{$backgrounds->path}}</a></td>
                    <td>{{$backgrounds->status}}</td>
                </tr>

                    @endforeach


                </tbody>
        </table>
    </div>
</div>


@endsection