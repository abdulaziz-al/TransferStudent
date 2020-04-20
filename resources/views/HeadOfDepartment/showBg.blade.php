@extends('layouts.app')
@section('title')
  Student  Background  
@endsection
@section('content')



<div class="container">
   
    
    <div class="col-md-8">
    
        <table class="table table-hover border-2" id="table">
            <thead class="head">
                <tr>
                    <th>#</th>
                    <th>Student Name </th>
                    <th>Student Department </th>
                    <th>Background </th>
                    <th colspan="2">Action</th>
                    
                </tr>
            </thead>
                <tbody class="tbody">
                    @foreach ($new as $news)
                    <tr>
              <td> {{$news[0]->id}}</td>
              <td> {{$news[2]->name}}</td>
              
              <td> {{$news[3]->name}}</td>
               <td> <a href="/files/{{$news[2]->name}}/{{$news[1]->path}}"  download="{{$news[1]->path}}">
                 {{$news[1]->path}}    
            </a>
        </td>
             <td> 
                <form class="form-inline" id="formGPA" method="POST"
                 action="{{ route('Accept') }}"  enctype="multipart/form-data" >
                    @csrf
             <input type="text" name="ids" value="{{$news[1]->id}}" readonly hidden />
                    <input type="submit" name="submit" class="btn btn-success" value="Accept" />
                </form>

             </td>
             
             <td> 
                <form class="form-inline" id="formGPA" method="POST"
                 action="{{ route('Reject') }}"  enctype="multipart/form-data" >
                    @csrf
             <input type="text" name="id" value="{{$news[1]->id}}" readonly hidden />
                    <input type="submit" name="submit" class="btn btn-danger" value="Rejected" />
                </form>

             </td>
             
            
                </tr>

                    @endforeach


                </tbody>
        </table>
    </div>
</div>


@endsection