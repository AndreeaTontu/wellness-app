<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Method for login form
    public function index()
    {
        // Display the log in form to the user
        return view('auth.login');
    }

    // Function to login the user using Auth facade
    public function login(Request $request)
    {   
        // Validation for data insput fields
        $request->validate([
            'email'=>'required|email', // Ensure the email field is required and valid
            'password'=>'required|min:6', // Ensure the password is required and at least 8 characters long
            ]);
        // Getting the user details from the form and put them in an array.
        $userDetails = [
            "email" => $request->email,
            "password" => $request->password
        ];
        // attempt() checks the details against the users database table.
        if (Auth::attempt($userDetails)) {
            $request->session()->regenerate(); // This will start a new session if the details are matched.
            return redirect('/health'); // Redirect the user to the homepage
        }
        // Redirect back with error message if login fails
        return back()->withErrors(['email', 'password'=>'Invalid email or password.']);

    }

    //Function to logut the user using Auth facade
    public function logout(Request $request)
    {
        Auth::logout();
        // Clean up the session data and redirect to the log in page.
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    
    // Registration form for new users
    public function registrationForm()
    {
        // Display the form to the user
        return view('auth.register');
    }
    public function register (Request $request)
    {
        // Validation  for the input fields
        $request->validate([
            'name' => 'required|string|max:255|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'email' => 'required|string|max:255|email|unique:users,email', //Unique email
            'password' => 'required|string|min:6|confirmed', // Must have a minimum 6 characters and passwards match
        ]);
        
        //This creates the new user in the database
        $user = User::create([
            "name"=>$request->name,
            'email' => $request->email,
            // Hide the passwords in the database using Hash facade.
            'password' => Hash::make($request->password), 
            // Assign role Id for regular user
            'role_id' => 2, 

        ]);

        auth()->login($user); //This will automatically log in the user after registration
        //Redirect the user to the home page
        return redirect('/health'); 

    }
}
