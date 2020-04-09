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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    
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
                        <img src="/image/uqu.png" id="uquimage" alt="#">
                
                    
            </div>
            </nav>
            
                <div class='menu'>
                   
                    <span class='toggle'>
                        
                        <i>@yield('iconTitil') </i>
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
                            <li >
                                <a  href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

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
            
            
            
            </div>
         


          
                
                        
                    @yield('content')

    

                   





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

         
</body>
</html>
#