<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>App Name - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="fixed top-0 right-0 border-b border-indigo-500 w-full  px-6 py-4 flex  bg-white">
          <div> <svg  class="fill-current text-indigo-500" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path  d="M17.492 15.432c-.433 0-.855-.087-1.253-.259l.467-1.082c.25.107.514.162.786.162.222 0 .441-.037.651-.11l.388 1.112c-.334.118-.683.177-1.039.177zm-10.922-.022c-.373 0-.741-.066-1.093-.195l.407-1.105c.221.081.451.122.686.122.26 0 .514-.05.754-.148l.447 1.09c-.382.157-.786.236-1.201.236zm8.67-.783l-1.659-.945.583-1.024 1.66.945-.584 1.024zm-6.455-.02l-.605-1.011 1.639-.981.605 1.011-1.639.981zm3.918-1.408c-.243-.101-.5-.153-.764-.153-.23 0-.457.04-.674.119l-.401-1.108c.346-.125.708-.188 1.075-.188.42 0 .83.082 1.217.244l-.453 1.086zm7.327-.163c-.534 0-.968.433-.968.968 0 .535.434.968.968.968.535 0 .969-.434.969-.968 0-.535-.434-.968-.969-.968zm-16.061 0c-.535 0-.969.433-.969.968 0 .535.434.968.969.968s.969-.434.969-.968c0-.535-.434-.968-.969-.968zm18.031-.832v6.683l-4 2.479v-4.366h-1v4.141l-4-2.885v-3.256h-2v3.255l-4 2.885v-4.14h-1v4.365l-4-2.479v-13.294l4 2.479v3.929h1v-3.927l4-2.886v4.813h2v-4.813l1.577 1.138c-.339-.701-.577-1.518-.577-2.524l.019-.345-2.019-1.456-5.545 4-6.455-4v18l6.455 4 5.545-4 5.545 4 6.455-4v-11.618l-.039.047c-.831.982-1.614 1.918-1.961 3.775zm2-8.403c0-2.099-1.9-3.801-4-3.801s-4 1.702-4 3.801c0 3.121 3.188 3.451 4 8.199.812-4.748 4-5.078 4-8.199zm-5.5.199c0-.829.672-1.5 1.5-1.5s1.5.671 1.5 1.5-.672 1.5-1.5 1.5-1.5-.671-1.5-1.5zm-.548 8c-.212-.992-.547-1.724-.952-2.334v2.334h.952z"/></svg></div>
           <div class="flex flex-row-reverse w-full">
            @if (Route::has('login'))
              
                    @auth
                      <div> <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a></div>  
                      <div class="px-4"><form method="POST" action="{{ route('logout') }}">
                        @csrf

                         <a href="{{ route('logout') }}" class="text-sm text-gray-700 underline" onclick="event.preventDefault();this.closest('form').submit();">
                            logout
                         </a>
                    </form></div> 
                      <div class=""> <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name}}"> </div>
                    @else
                       <div><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></div> 
                       

                        @if (Route::has('register'))
                          <div class="px-4"><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></div>  
                        @endif
                    @endauth
               
            @endif
           </div>
        </div>
        
        <main class="py-14 my-2 ">
            @yield('content')
        </main>
            
    </body>
</html>
