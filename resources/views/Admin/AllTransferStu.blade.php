@extends('layouts.app')

@section('content')


<div class="container">
   
    
<div class="col-md-8">

    <table class="table table-hover border-2" id="table">
        <thead class="head">
            <tr>
                <th>ID</th>
                <th>Student name</th>
                <th>Previous Department</th>
                <th>To Department</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="tbody">
            <tr>
                <td>1</td>
                <td>Clark</td>
                <td>Kent</td>
                <td>clarkkent@mail.com</td>
                <td>Accept</td>
                
            </tr>      
        </tbody>
    </table>
</div>
</div>


    @endsection

