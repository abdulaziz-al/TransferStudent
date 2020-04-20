@extends('layouts.app')
@section('title')
  Coming Student 
@endsection
@section('content')


<div class="container">
   
    
    @foreach  (array_slice($new, 0 , 1 ) as $news)
    <div class="la">

<div>minimum Percente: {{$news[0]->min_per}}%

@endforeach

<div class="col-md-8">

    <table class="table table-hover border-2" id="tables">
       
         
        <thead class="head">
            <tr>
                <th>ID</th>
                <th>Student name</th>
                <th>Previous Department</th>
                <th>Email</th>
                <th>Percente</th>

                
            </tr>
        </thead>
        <tbody class="tbody">
            @foreach ($new as $news)
        
            <tr>
            <td>{{$news[0]->stu_id}}</td><!-- ID stu -->
            <td>{{$news[2]}}</td><!-- Student name --> 
           <td>{{$news[1]}}</td><!-- Department pervious  -->
           <td>{{$news[3]}}</td>
           <td>{{$news[0]->stu_per}}%</td>
    
           
          

    
         
            </tr>    
            @endforeach
  
        </tbody>
    </table>
</div></div>
</div>
</div>


    @endsection

