<!-- The create view page for admin -->
<x-layout title="Add New Record">
    <!-- A heading -->
    <h2>Add New Health Problem and Recommendations</h2>

    <!-- The view of the succes message after record creation. -->
    @if(session('message'))
        <div class="alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="form"> 
        <!--  Form method and action -->
        <form method="POST" action="/admin">
        @csrf <!--This is Laravel cross-site request forgery to protect the application from malicious exploit.-->
            <!-- The health problem form -->
            <div class= "create-form">
                <h3>New Health Problem</h3>
                <!-- Labels and input of the form -->
                    <label for="name">Add Problem Name:</label>
                    <input class="input" type="text" name="name" value="{{ old('name')}}" required>
                    <label for="name">Add Description:</label>
                    <input class="input" name="description" value="{{ old('name')}}"  required>
            </div>
            <!-- The recommendation form -->
            <div class= "create-form">
                <h3>Initial Recommendation</h3>
                <!-- Labels and input of the form -->
                    <label for="name">Add Diet:</label>
                    <input class="input" type="text" name="diet" value="{{ old('name')}}" required>
                    <label for="name">Add Holistic Activities:</label>
                    <input class="input" type="text" name="holistic_activities" value="{{ old('name')}}"required>
                    <label for="name">Add Remedies:</label>
                    <input class="input" type="text" name="natural_remedies" value="{{ old('name')}}" required>
            </div>
            <!-- Adding Save button -->
            <button class="button" type="submit">Save</button>
        </form>
    </div>
</x-layout>


