<x-layout title="Sign Up">
<!-- Registration form to display to the user. -->
    <div>
        <h1>Sign Up</h1>
        <!-- Adding the method and action defined in the route -->
        <form method="POST" action="/register">
            @csrf <!-- Security measure to protect the app from cross-site request forgery
            (unauthorised commands peformed on behalf of logged in users) -->
            <div>
                <label class="input-label">Full Name:</label>
                <input class="input" type="text" id="name" name="name" 
                    placeholder="Enter your full name" 
                    value="{{ old('name')}}"/> <!--This is a Laravel helper to retain the previous input if the validation fails -->
                 <!-- Print an error message if the name field is empty or invalid -->
                @error('name')
                    <!--The variable $message is from Laravel's validation system containing the error text.-->
                    <div class="error-message">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label class="input-label" for="email">Email:</label>
                <input class="input" type="email" id="email" name="email" 
                    placeholder="Enter your email" value="{{ old('email')}}"/>
                 <!-- Print an error message if the email field is empty or invalid -->
                @error('email')
                    <div class="error-message">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label class="input-label" for="password">Password:</label>
                <input class="input" type="password" id="password" name="password" 
                    placeholder="Create password"/>
                 <!-- Print an error message if the password field is empty or invalid -->
                @error('password')
                    <div class="error-message">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label class="input-label" for="password_confirmation">Confirm Password:</label>
                <input class="input" type="password" id="password_confirmation" name="password_confirmation" 
                    placeholder="Re-enter password"/>
                <!-- Print an error message if the password confirmation field is empty or invalid -->
                @error('password_confirmation')
                    <div class="error-message">{{$message}}</div>
                @enderror
            </div>
            
            <div>
                <!-- Sign up button -->
                <button class="button" type="submit">Sign Up</button>
            </div>
        </form>
    </div>
</x-layout>