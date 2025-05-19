<x-layout title="Your Search History">
<!-- View for the user histories -->
    <h2>Your Condition and Recommendations History</h2>

    @auth <!-- Marks out code that will only be displayed to logged in users-->
        <!-- If history records exist, it will be visibile to the user -->
        @if($histories->isNotEmpty())
            <!-- Loop through each history -->
            @foreach($histories as $history)
            <div class="history-card">
                <!-- Health problem name and description if history is avilable -->
                <h3>{{ $history->healthCondition->name }}</h3>
                <p>{{ $history->healthCondition->description }}</p>
                    <!-- Recommendation list view if the history is availabe -->
                    <h4>Recommendations:</h4>
                    <ul>    
                        <li><strong>Diet:</strong> {{ $history->healthCondition->recommendation->diet }}</li>
                        <li><strong>Activities:</strong> {{$history->healthCondition->recommendation->holistic_activities }}</li>
                        <li><strong>Remedies:</strong> {{ $history->healthCondition->recommendation->natural_remedies }}</li>
                    </ul>
                    <!-- Adding the action defined in the route and method to submit the data -->
                    <form method='POST' action='/history/{{$history->id}}'>
                    <!-- Security measure to protect the app from cross-site request forgery
                    (unauthorised commands peformed on behalf of logged in users) -->
                    @csrf 
                    <!-- A Laravel method used to interpret the form as Delete request
                    because HTLM does not dupport Delete requests -->
                    @method('DELETE') 
                    <!-- Adding the Delete button -->
                    <button class="button" type='submit'>Delete</button>
                    </form>
             </div>
            @endforeach
            <!-- If no history records, a message will be displayed -->
            @else
                <p>There is no history available.</p> 
        @endif
    @endauth 
</x-layout>
