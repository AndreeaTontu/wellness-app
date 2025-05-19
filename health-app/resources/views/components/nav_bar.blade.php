<header>  
  <!--logo-->
    <nav class="navbar">
      <div class="nav-left">
        <a class="logo" href="/health">Formidable Well</a>
        <ul class="nav-links">
          
          <li><a href="/health">Home</a></li>
          @can('edit')
          <li><a href="/admin/create">Add new record</a></li>
          @endcan
          @cannot('edit')
          @auth
          <li><a href="/history">History</a></li>
          @endauth
          @endcannot
        
          @guest
          <li><a href="/login">Log In</a></li>
          <li><a href="/register">Sign Up</a></li>
          @endguest
          <li class="about"> <a href="/health/about">About</a> </li>
        </ul>
      </div>

        @auth
          <div class="logged_user">
            <span>Logged in as {{Auth::user()->name}}</span>
            <form method='POST' action='/logout'>
                @csrf
                <button class="logout_botton" type='submit'>Logout</button>
            </form>
          </div>
        @endauth
    </nav> 
</header>