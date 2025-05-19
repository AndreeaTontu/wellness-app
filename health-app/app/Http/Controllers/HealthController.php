<?php

namespace App\Http\Controllers;

use App\Models\Health;
use App\Models\HealthCondition;
use App\Models\History;
use App\Models\Recommendation;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    public function index()
    {
        // Fetch all the health problems for guest users
        $health_conditions = HealthCondition::paginate(3); // Items per pagination
        // This returns the view index to the user with a list o health problems
        return view('health.index', ['health_conditions' => $health_conditions]);
    }

    // A "show" method to display the health problems with the description
    public function show($id)
    {
        // This finds the health probelm, if it fails it will throw a message
        $health_condition = HealthCondition::findOrFail($id);
        // Return the show view to the user.
        return view('health.show', ['health_condition' => $health_condition]);
    }

    // Method to display the about page
    public function about()
    {
        //Returns the view to the user.
        return view('health.about');
    }

    // Function to handle the form input (POST)
    public function getRecommendations(Request $request)
    {
        // Get user input
        $problem = $request->input('health_problem');

        // Find the health problem from database by name
        $healthProblem = HealthCondition::where('name', $problem)->first();

        // Abort a 404 error page if the health problem is not found
        if (! $healthProblem) {
            abort(404);
        }

        // Store the user history
        // Check if the user is authenicated
        if (auth()->check()) {
            // Create a new raw in the database histories table
            History::create([
                'user_id' => auth()->id(), // Retrieve the id of the logged in user
                'health_condition_id' => $healthProblem->id, // The id of the health problem
            ]);
        }

        // Redirecting the user to the recommendation page
        return redirect()->route('recommendations.show', $healthProblem->id);
    }

    // Function to show recommendations results(GET)
    public function showRecommendations($id)
    {
        // Fetching the health problem and related recommendations
        $healthProblem = HealthCondition::with('recommendation')->find($id);

        // Return the view to show recommendations based on the input.
        return view('recommendations.show', [
            'healthProblem' => $healthProblem,
            'recommendation' => $healthProblem->recommendation,
        ]);
    }

    // We define create() method used to display the creating form.
    public function create()
    {
        // Returns the view form to admin user.
        return view('admin.create');
    }

    // Defining the method to store the new created data.
    public function store(Request $request)
    {
        // Validating the user data input from the request
        $request->validate([
            // These are rules of the data input( the input is required, as string, maxim and range chracters)
            'name' => 'required|string|max:100|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'description' => 'required|string|max:100|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'diet' => 'required|string|max:100|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'holistic_activities' => 'required|string|max:100|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'natural_remedies' => 'required|string|max:100|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
        ]);

        // Using Elequent method (create) to create new health problem record in the database.
        $health = HealthCondition::create([
            // The form data submited from the user is accessed via Post request.
            'name' => $request->name, // Get the name input.
            'description' => $request->description, // Get the description input.
            // It records the user id that made the creation.
            'user_id' => auth()->id(),
        ]);

        // Using Elequent method (create) to create new recommendation records in the database.
        Recommendation::create([
            'health_condition_id' => $health->id, // Add the new health condition id in the recommendation table.
            'diet' => $request->diet, // Get the diet input.
            'holistic_activities' => $request->holistic_activities, // Get holistic activities input.
            'natural_remedies' => $request->natural_remedies, // Get remedies input.
        ]);

        // Redirect back the user with a succes message after the record is created.
        return redirect()->back()->with('message', 'The record was created succesfully. Thank You!');
    }
}
