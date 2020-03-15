@extends('layouts.app')

@section('content')


<div class="container">
   
    
<div class="col-md-8">

    <table class="table table-hover border-2" id="tabledep">
            
        <thead class="head">
            <tr>
                <th>Department</th>
                <th>weight Location</th>
                <th>weight Background</th>
                <th>weight Another Branch</th>
                <th>weight Exam</th>
                <th>weight Hours</th>
                <th>Sits</th>
                <th colspan="4">Note</th>
            </tr>
        </thead>
        <tbody class="tbody">
            @foreach ($department as $departments)
            <tr>
                

            <td>{{ $departments ->name}}</td>
                <td>{{ $departments ->weighted_of_location}}</td>
                <td>{{ $departments ->weighted_of_background}}</td>
                <td>{{ $departments ->weighted_for_another_branch}}</td>
                <td>{{ $departments ->weighted_for_exam}}</td>
                <td>{{ $departments ->weighted_for_hours}}</td>
                <td>{{ $departments ->sites}}</td>
                <td colspan="4">{{ $departments ->note}}</td>

            </tr>
            @endforeach

        </tbody>
    </table>
    <hr>
    <form class="form-inline" id="formGPA" method="POST" action="{{ route('setdefault') }}" enctype="multipart/form-data"  >
        @csrf
            <input type=" text" placeholder="GPA" name="GPA" >  
            <input type=" text" placeholder="Sets" name="Sets" >
            <input type="submit" class="btn btn-primary" value="set">
        </form>

</div>
</div>


    @endsection

