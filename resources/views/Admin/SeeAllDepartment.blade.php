@extends('layouts.app')
@section('title')
   Wieghted of All Departments
@endsection
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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="btnmodel">set GPA and sets</button>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">default GPA and Sets</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-inline" id="formGPA" method="POST" action="{{ route('setdefault') }}" enctype="multipart/form-data" >
                @csrf

              <div class="form-group">
                <label class="col-form-label">GPA</label>
                <input type=" text" placeholder="GPA" name="GPA" >  
            </div>
              <div class="form-group">
                <label  class="col-form-label">sets</label>
                <input type=" text" placeholder="Sets" name="Sets" >
            </div>
            <input type="submit" class="btn btn-primary" value="set">

        </form>
          </div>
        </div>
      </div>
    </div>





</div>
</div>


    @endsection

