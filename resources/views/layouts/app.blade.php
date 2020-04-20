<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- test new alert ajax -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">


    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
   
</head>
<body>

    @include('sweetalert::alert')

    
            <div class="container">
              
                <nav id="nav">
                    <div class="innertube">
                        <img src="/image/uqu.png" id="uquimage" alt="#" />
                @if ( Auth::user()  != null )
                <h4 class="hh">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </h4>
                <hr><h4 class="hh">
                                    @yield('title')</h4>
 
                                @else 


            
                @endif
                    
            </div>
            </nav>
            <!--- I'm here   ----->
            
                <div class='menu'>
                   
                    <span class='toggle'>
                        
                        <i></i>
                        <i></i>
                        <i></i>
                        
                        
                      </span>

                      <div class='menuContent'>
                        

                <ul>
                 
                        <!-- Authentication Links -->
                        @guest
                            <li>
                                <a style="color: black" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a style="color: black"  href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @if(Auth::user()->role_id==3)
                            <li><a href="/profile" style="color: black">My Profile </a></li>
                            <li><a href="/allDepartment" style="color: black">Show all Department</a>  </li>
                            <li><a href="/background" style="color: black">Show My Background</a>   </li>
                            <li><a href="/StuResult" style="color: black">Result</a>   </li>
                            
                            @elseif(Auth::user()->role_id==2)
                            <li><a href="/info" style="color: black">My Profile </a></li>
                            <li><a href="/department" style="color: black"> My Department</a>  </li>
                            <li><a href="/ResultStudent" style="color: black">Coming Students</a>  </li>
                            <li><a href="/headbackgound" style="color: black">Show Students Background</a>   </li>
                            @elseif(Auth::user()->role_id==1)
                            <li><a href="/showallstu" style="color: black">Show all Transfar student  </a></li>
                            <li><a href="/alldep" style="color: black">Show All Department wieghted </a>  </li>
                            <li><a href="/showResult" style="color: black">Show Result</a>  </li>

                        @endif
                            <li >

                                <div>
                                    <a style="color: black" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
            
            
            
         


          
                        
                    @yield('content')

    

                   


                </div>



<script>
  $('.toggle').on('click', function() {
  $('.menu').toggleClass('active');
});
  
</script>

<script>

    $(document).ready(function() {
        for(var $i = 0 ; $i <= 5 ; $i++){

const $valueSpan = $(".valueSpan"+$i);
const $value = $('#slider'+$i);
$valueSpan.html($value.val());
$value.on('input change', () => {

$valueSpan.html($value.val())
});
}
});


</script>
 <script>
            
            function tab1_To_tab2()
            {
                var table1 = document.getElementById("table1"),
                    table2 = document.getElementById("table2"),
                    checkboxes = document.getElementsByName("check-tab1");
            console.log("Val1 = " + checkboxes.length);
                 for(var i = 0; i < checkboxes.length; i++)
                     if(checkboxes[i].checked)
                        {
                            // create new row and cells
                            var newRow = table2.insertRow(table2.length),
                                cell1 = newRow.insertCell(0),
                                cell2 = newRow.insertCell(1),
                                cell3 = newRow.insertCell(2);
                               var num = table1.rows[i+1].cells[1].innerHTML;
                            // add values to the cells
                            cell1.innerHTML = table1.rows[i+1].cells[0].innerHTML;
                            cell2.innerHTML =   table1.rows[i+1].cells[1].innerHTML;
                           
                            cell3.innerHTML = "<input type='checkbox' value name='check-tab2'>";
                           
                            // remove the transfered rows from the first table [table1]
                            var index = table1.rows[i+1].rowIndex;
                            table1.deleteRow(index);
                            // we have deleted some rows so the checkboxes.length have changed
                            // so we have to decrement the value of i
                            i--;
                           console.log(checkboxes.length);
                        }
            }
            
            
            function tab2_To_tab1()
            {
                var table1 = document.getElementById("table1"),
                    table2 = document.getElementById("table2"),
                    checkboxes = document.getElementsByName("check-tab2");
            console.log("Val1 = " + checkboxes.length);
                 for(var i = 0; i < checkboxes.length; i++)
                     if(checkboxes[i].checked)
                        {
                            // create new row and cells
                            var newRow = table1.insertRow(table1.length  ),
                                cell1 = newRow.insertCell(0),
                                cell2 = newRow.insertCell(1),
                                cell3 = newRow.insertCell(2);
                            // add values to the cells
                            cell1.innerHTML = table2.rows[i+1].cells[0].innerHTML;
                            cell2.innerHTML = table2.rows[i+1].cells[1].innerHTML;
                            cell3.innerHTML = "<input type='checkbox' name='check-tab1'>";
                           
                            // remove the transfered rows from the second table [table2]
                            var index = table2.rows[i+1].rowIndex;
                            table2.deleteRow(index);
                            // we have deleted some rows so the checkboxes.length have changed
                            // so we have to decrement the value of i
                            i--;
                           console.log(checkboxes.length);
                        }
            }
            
        </script>    
         
</body>
</html>
