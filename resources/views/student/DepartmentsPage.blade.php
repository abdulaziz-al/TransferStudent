@extends('layouts.app')
@section('title')
  All Department  
@endsection
@section('content')

<div class="container">
    <div class="col-md-8">
        <div class="tab">

        <table class="table table-hover border-2" id="table1">
            <thead class="head">
                <tr>
                    <td>Id:</td>
                    <td>Department:</td>
                    <td>chose:</td>
                    
                </tr>
            </thead>
            <tbody class="body">
               
                @foreach ($department as $departments)
                
                    
                    
                <tr>

                <td><input type="text"name="id[]" value="{{$departments->id}}" readonly hidden />
                     <input type="text"name="count[]" value=" {{$i}}" readonly hidden />  {{$i++}}</td>

                    <td><input type="text"name="name[]" value="{{$departments->name}}" read only hidden />{{$departments->name}}</td>
                    <td><input type="checkbox" name="check-tab1"></td>

                </tr>

                @endforeach


        </table>
        </div>

        <div class="tab tab-btn" >
            <button onclick="tab1_To_tab2();" class="btnmove1">>>>>></button>
            <button onclick="tab2_To_tab1();" class="btnmove2"><<<<<</button>
        </div>


            <div class="tab">
                <form class="form-inline" id="formGPA" method="POST" action="{{route('selectDepartment')}}"  enctype="multipart/form-data" >
                    @csrf 
        <table  class="table table-hover border-2" id="table2">
            <thead class="head">
                <tr>
                    <td>Id:</td>
                    <td>Department:</td>
                    
                    <td>chose:</td>
                    
                </tr>
            </thead>
     


        </table>
        

        <input type="submit" name="table" />
    
    </form>
        </div>









    </div>
    </div>
    @endsection