<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   @include('partials.head')
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <aside class="col-auto col-md-3 col-xl-2 px-0 bg-blue">
                @include('partials.nav')
            </aside>
            
            <div class="col col-md-9 col-xl-10 ps-0">
                @include('partials.header')
            
                @include('partials.errors')
            <main id="main" class="main">
                @yield('content')
            </main>
       </div>
   </div>

   @include('partials.footer')
</body>

</html>