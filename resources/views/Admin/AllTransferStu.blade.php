@extends('layouts.app')
@section('title')
    All student Transfer
@endsection

@section('content')


<div class="container">
   
    
<div class="col-md-8">
<div class="sub">
    <form class="form-inline" id="formGPA" method="POST" action="{{route('ResultStudent')}}"  enctype="multipart/form-data" >
        @csrf 
        <input type="submit" value="Start"/>
    </form>
    <form class="form-inline" id="formGPA" method="POST" action="{{route('Minper')}}"  enctype="multipart/form-data" >
        @csrf 
        <input type="submit" value="Put the min persent "/>
    </form>
</div>
    <table class="table table-hover border-2" id="table">
       
         
        <thead class="head">
            <tr>
                <th>ID</th>
                <th>Student name</th>
                <th>Previous Department</th>
                <th>First Wish </th>
                <th>second wish</th>
                <th>Thred Wish </th>
            </tr>
        </thead>
        <tbody class="tbody">
            @foreach ($arr as $arrs)
        
            <tr>
            <td>{{$arrs[3]}}</td><!-- ID stu -->
            <td>{{$arrs[4]}}</td><!-- Student name --> 
           <td>{{$arrs[5]}}</td><!-- Department pervious  -->
           @foreach ($department as $departments)<!--First wish  -->
           @if ($departments->id == $arrs[0])
           <td>{{$departments->name}}</td>
           @endif
           @endforeach 

           @foreach ($department as $departments)<!--second wish  -->
           @if ($departments->id == $arrs[1] && $departments->id != 5)
           <td>{{$departments->name}}</td>
           @elseif($departments->id == $arrs[1]&& $departments->id == 5)
           <td>----</td>
           @endif
           @endforeach
           
          

           @foreach ($department as $departments)<!-- thred  wish  --> 
           @if ($departments->id == $arrs[2] && $departments->id != 5 )
           <td>{{$departments->name}}</td>
           @elseif( $departments->id == $arrs[2] && $departments->id == 5)

           <td>----</td>
           @endif
           @endforeach

         
            </tr>    
            @endforeach
  
        </tbody>
    </table>
    
</div>
</div>


    @endsection

