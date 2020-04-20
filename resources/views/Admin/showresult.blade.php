@extends('layouts.app')
@section('title')
Show all Student Result
@endsection
@section('content')


<div class="container">
   
    
<div class="col-md-8">
    
        
    <table class="table table-hover border-2" id="table">
       
         
        <thead class="head">
            <tr>
                <th>ID</th>
                <th>To Department</th>
                <th>Min persent </th>
                <th>Student persent</th>
                <th>Status </th>
            </tr>
        </thead>
        <tbody class="tbody">
            @foreach ($all as $alls)
        
            <tr>
            <td>{{$alls->stu_id}}</td>
            <td>{{$alls->department_id}}</td>
            <td>{{$alls->min_per}}</td>
            <td>{{$alls->stu_per}}</td>
            <td>{{$alls->status}}</td>


         
            </tr>    
            @endforeach
  
        </tbody>
    </table>
    
</div>
</div>


    @endsection

