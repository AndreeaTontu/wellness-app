<x-layout title="Sign In">
    <!-- Log in form to display to the user -->
    <div>
        <h1>Sign In</h1>
        <!-- Adding the method and action defined in the route -->
        <form method="POST" action="/login">
            @csrf <!-- Security measure to protect the app from cross-site request forgery
            (unauthorised commands peformed on behalf of logged in users) -->
                <label class="input-label" for="email">Email:</label>
                <input class="input" type="text" id="email" name="email" />
                <!-- Print an error message if the email field is empty or invalid -->
                @error('email')
                        <div class="error-message">{{$message}}</div>
                @enderror
        
                <label class="input-label" for="password">Password:</label>
                <input  class="input" type="password" id="password" name="password" />
                <!-- Print an error message if the password field is empty or invalid -->
                @error('password')
                        <div class="error-message">{{$message}}</div>
                @enderror
                <!-- Sign in button -->
                <button class="button" type="submit">Sign in</button>
        </form>
    </div>
</x-layout>