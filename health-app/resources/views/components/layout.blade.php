<!-- The master page or tempate that will base all the pages.
It defines the structure of the page -->
<!DOCTYPE html>
<html>
  <head>
    <title>{{$title}}</title> <!-- This variable display a custom title -->
    <!-- Specifying character encoding for good rendering text using meta tag -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!-- Linking the style.css file -->
    <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" />
  </head>
  <body>
  <div>
    <!-- Calling the nav bar from the blade component for all pages -->
    <x-nav_bar/>  
    <!-- Main content of each page. -->
    <main class="main"> 
      <!-- Display specific content of all pages using Laravel "slot" variable,
       e.g home, about page etc.-->
         <!-- A succes message of the history deletion. -->
         @if(session('message'))
        <div class="alert-success">
            {{ session('message') }}
        </div>
        @endif
    {{ $slot }} 
    </main>
    <!-- Display the footer to all pages -->
    <x-footer/> 
  </div>
  </body>
</html>