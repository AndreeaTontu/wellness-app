<x-layout title="Show the recommendations.">
    <!-- Show recommendations to the user after entering the health problem-->
    <div>
        @auth
        <h2>{{ $healthProblem->name }}</h2>  <!-- Shows health problem name -->

        <p>Description: {{ $healthProblem->description }}</p> <!-- Shows description -->

        <!-- Check if recommendations exist-->
        @if($recommendation)
            <h3> Please have a look to our recommendations based on your health problem.</h3>
            <ul>
                <li><strong>Diet:</strong> {{$recommendation->diet}}</li>
                <li><strong>Holistic activities:</strong> {{$recommendation->holistic_activities}}</li>
                <li><strong>Remedies:</strong> {{$recommendation->natural_remedies}}</li>
            </ul>
         <!-- If no recommendations exist print this message -->
        @else
            <p>No recommendation found for this condition.</p>
        @endif
        @endauth
    </div>

</x-layout>
