@extends('layouts.app')
@section('title')
  Result Transfear  
@endsection
@section('content')


<div class="container">
   
    
<div class="col-md-8">
    
    <table class="table table-hover border-2" id="table">
       
         
        <thead class="head">
            <tr>
                <th>ID</th>
                <th>Student name</th>
                <th>To Department  </th>
                <th>Present</th>
                <th>Status </th>
            </tr>
        </thead>
        <tbody class="tbody">
            @foreach ($res as $ress)
        
            <tr>
        
            <td>{{$ress->stu_id}}</td>
            <td>{{Auth::user()->name}}</td>
            <td>{{$ress->department_id}}</td>
            <td>{{$ress->stu_per}}</td>
           <td>{{$ress->status}}</td>

          


         
            </tr>    
            @endforeach
  
        </tbody>
    </table>
    
</div>
</div>


    @endsection

