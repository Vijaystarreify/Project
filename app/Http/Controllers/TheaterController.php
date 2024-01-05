<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use App\Models\Screen;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
class TheaterController extends Controller
{

    public function addScreen(Request $request)
    {
        // Create a new screen
        Screen::create([
            'name' => $request->input('screenName'),
            'capacity' => $request->input('seats'),
             'theater_id' =>$request->theater_id
        ]);
        $redirectUrl = route('theaters-list');
        return response()->json(['redirect' => $redirectUrl], Response::HTTP_CREATED);
        
    }

    public function updateScreenCapacity(Request $request)
{
    $screenId = $request->input('screenId');
    $capacity = $request->input('capacity');
    $theaterId =$request->input('theaterId');
    // Update the screen capacity in the database
    $screen = Screen::find($screenId);
    if ($screen) {
        $screen->capacity = $capacity;
        $screen->save();
        return response()->json(['success' => true, 'redirect' => route('theater-form', ['id' => $theaterId])]);
    }
    return response()->json(['success' => false, 'error' => 'Something went wrong']);
}
public function deleteScreen(Request $req,$screenId, $theaterId): RedirectResponse
{
    $screen = Screen::find($screenId);
    if ($screen) {
        $screen->delete();
        return redirect()->route('theater-form', ['id' => $theaterId])
            ->with('status', 'Screen deleted successfully');
    }

    // If the screen doesn't exist, redirect back with an error message
    return redirect()->route('theater-form', ['id' => $theaterId])
        ->with('status', 'Screen not found');
}


public function getScreenDetails($screenId)
{
    $screen = Screen::find($screenId);
    if ($screen) {
        return response()->json([
            'id' =>$screen->id,
            'name' => $screen->name,
            'capacity' => $screen->capacity,
            'theater_id' =>$screen->theater_id
        ]);
    }
    return response()->json(['error' => 'Screen not found'], 404);
}

    public function theaterForm(string $id)
    {
        $theater = ($id == 'new') ? new Theater() : Theater::with('screens')->findOrFail($id);
    
     
        return view('admin.theater-form', ['id' => $id, 'theater' => $theater]);
    }

    public function saveTheaterData(Request $request): RedirectResponse
    {
        // dd($request);
        $request->validate($this->getValidationRules());
       
        $theater = Theater::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'location' => $request->location,
            ]
        );
        // $screen = Screen::updateOrCreate(
        //     [
        //         'name' => $request->screen_name,
        //         'capacity' => $request->capacity,
        //         'theater_id' =>$theater->id
        //     ]
        // );
    
        $status = ($request->id) ? 'update' : 'add';
        return redirect()->route('theaters-list')->with('status', 'Theater ' . $theater->id . ' ' . $status . ' successfully!');
    }

    public function deleteTheater(string $id): RedirectResponse
    {
        $theater = Theater::findOrFail($id);

        if ($theater) {
            $theater->delete();
            return redirect()->route('theaters-list')->with('status', 'Theater #' . $id . ' delete successfully!');
        }

        return redirect()->route('theaters-list')->with('status', 'Not Found');
    }

    private function getValidationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
         
        ];
    }
}
