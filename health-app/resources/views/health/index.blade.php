<x-layout title="Home">
     @guest <!-- Marks out code that will only be displayed to unauthenticated users--> 
    <div>
        <div>
            <h1>Welcome to our wellness app!</h1>
                <p> Please read more about who we are and what is the purpose of this application by clicking on the About page link.</p>
                <p> Your health is our priority. Please log in to get recommendations based on your health problem.</p>
                <p> Meanwhile, you can browse some of the health problem listed, and read their description.</p>
        </div>
        <!-- Listing the health problems to the guest users.-->
        @foreach ($health_conditions as $health_condition)
        <p> 
            <!-- This makes each health problem from the list as link-->
            <li class="health-list"><a href="/health/{{$health_condition->id}}">
                {{$health_condition->name}}
            </a>
            </li>
        </p>
        @endforeach   
    </div>

    <!-- Pagination Condition for Previous page -->
    @if ($health_conditions ->hasPages())
    <div class="pagination">
        <!-- Previous Page Link -->
        @if ($health_conditions ->onFirstPage())
            <a class="disabled"><span>{{ __('Previous') }}</span></a>
        @else
            <!-- If there are prev pages, previous link will be active-->
            <a href="{{$health_conditions ->previousPageUrl() }}" rel="prev">{{ __('Previous') }}</a></li>
        @endif
        
        <!-- Pagination Condition for Next page -->
        <!-- Next Page Link -->
        @if ($health_conditions ->hasMorePages())
            <!-- Active Next link if there are more pages. -->
            <a href="{{ $health_conditions ->nextPageUrl() }}" rel="next">{{ __('Next') }}</a></li>
        @else
            <!-- If the user is on the last page it will display Next as disabled -->
            <a class="disabled"><span>{{ __('Next') }}</span></a>
    
        @endif
    </div>
    @endif

    <div class= "page_info">
        <!-- This displays current page and the total of pages -->
        <p >{{ "Page " . $health_conditions ->currentPage() . "  of  " . $health_conditions ->lastPage() }}</p>
    </div>
    @endguest
                
    <!-- A welcame page to the logged in users with input form to add the health problem.-->
    @cannot('edit') <!-- We hide the input for admin -->
    @auth    <!-- Marks out code that will only be displayed to logged in users-->
    <div>
        <!-- Welcome the user with a message in print the user name -->
        <h2>Hello, welcome back {{Auth::user()->name}}!</h2>
        <!-- Adding the method and action defined in the route -->
        <form action='/health' method="POST">
            @csrf <!-- Security measure to protect the app from cross-site request forgery 
            (unauthorised commands peformed on behalf of logged in users)-->
            <div>
                <p> Please enter your health problem </p>
                <input class="input" type="text" name="health_problem" required>
                <button class="button" type="submit">Enter</button>
            </div>
        </form>
    </div>
    @endauth
    @endcannot

  <!-- Welcome page for the admin -->
  @auth  <!-- This can be viewd by authenticated user -->
    <!-- We tell the system that this is an admin with "can" directory -->
    @can('edit')
    <div>
    <!-- Welcome the admin with a message and print the user name -->
    <h2>Hello, welcome back {{Auth::user()->name}}!</h2>
            <p> To create new health records with recommendations, please go to <i>Add New Record</i>.</p>
            <p> If you encounter any issues, please get in touch with your manager.</p>
    </div>
    @endcan
    @endauth
</x-layout>
