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
            <tr>
                <td>1</td>
                <td>Clark</td>
                <td>Kent</td>
                <td>clarkkent@mail.com</td>
                <td>Accept</td>
                <td>Kent</td>
                <td>clarkkent@mail.com</td>
                <td colspan="4">Accept</td>
                
            </tr>
            <tr>
                <td>2</td>
                <td>John</td>
                <td>Carter</td>
                <td>johncarter@mail.com</td>
                <td>Reject</td>

                <td>Carter</td>
                <td>johncarter@mail.com</td>
                <td>Reject</td>

                
            </tr>            
        </tbody>
    </table>
</div>
</div>


    @endsection

