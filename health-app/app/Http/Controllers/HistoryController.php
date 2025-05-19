<?php

namespace App\Http\Controllers;

use App\Models\History;

class HistoryController extends Controller
{
    // This method is created to get all the previous histories of the user.
    public function index()
    {
        // This retrieves the recommendation history of the user.
        $histories = History::with(['healthCondition.recommendation'])
            ->where('user_id', auth()->id())->latest()->get();

        // Display the histories by returning the history view.
        return view('history.index', ['histories' => $histories]);
    }

    // Method to delete history record based on its id.
    public function destroy($id)
    {
        // This instance finds the histoy by id or fails with error display.
        $history = History::find($id);
        // Elequent method that deletes specific recommendations history record from the database.
        $history->delete();

        // After deletion, redirect the user to the history page with a success message of deletion.
        return redirect()->back()->with('messaage', 'Health problem was deleted from your history.');
    }
}
