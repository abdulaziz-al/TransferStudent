@extends('layouts.app')
@section('title')
  My Depratment 
@endsection
@section('content')

<div class="container">



    <div class="row">
        <div class="col-m-14 col-sm-8 col-md-6">


<div class="card" id="cardd">
  <div class="card-header">
<label>
  Weighted for :

</label>
    
  </div>

    <div class="card-body">
      <form class="form-inline" id="formGPA" method="POST" action="{{ route('department') }}"  enctype="multipart/form-data" >
        @csrf 
            
          <div class="d-flex justify-content-center my-4">
            <label>
               Location:
              <input id="slider1" class="border-0" type="range" min="0" max="50" name="location" value={{$department->weighted_of_location}}  />
            <span class="font-weight-bold text-primary ml-2 mt-1 valueSpan1"></span>
          </label>
          </div>
          <div class="d-flex justify-content-center my-4">
            <label >Branch :

              <input id="slider2" class="border-0" type="range" min="0" max="50" name="baranch" value={{$department->weighted_for_another_branch}} />
            <span class="font-weight-bold text-primary ml-2 mt-1 valueSpan2"></span>
          </label>
          </div>
          <div class="d-flex justify-content-center my-4">
            <label > Background:

              <input id="slider3" class="border-0" type="range" min="0" max="50" name="Background" value={{$department->weighted_of_background}} />
            <span class="font-weight-bold text-primary ml-2 mt-1 valueSpan3"></span>
          </label>
          </div>
          
          <div class="d-flex justify-content-center my-4">
            <label >Exam :
              <input id="slider4" class="border-0" type="range" min="0" max="50" name="exam" value={{$department->weighted_for_exam}} />
            <span class="font-weight-bold text-primary ml-2 mt-1 valueSpan4"></span>
          </label>
        
          </div>

          <div class="d-flex justify-content-center my-4">
            <label>Hours:
              <input id="slider5" class="border-0" type="range" min="0" max="50" name="horus" value={{$department->weighted_for_hours}} />
            <span class="font-weight-bold text-primary ml-2 mt-1 valueSpan5"></span>
          </label>

          </div>  
          <div class="d-flex justify-content-center my-4">
            <label>sits:
          <input type="number" name="sit" min="0"  step="1"/>
        </label>

      </div>  
          <div class="d-flex justify-content-center my-4">
            <div class="form-group shadow-textarea">
            <textarea name="note" id="notes" cols="25" rows="5"  placeholder="Wirte a note while you don't using  all 50%.... "></textarea>
            </div>
          </div>
           
          <input type="submit"  value="Submit"/>        

        </form>
    </div>
      
    </div>
    
</div>
</div>

</div>

    @endsection