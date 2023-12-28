<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use App\Models\Screen;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TheaterController extends Controller
{
    public function theaterForm(string $id)
    {
        $theater = ($id == 'new') ? new Theater() : Theater::with('screens')->findOrFail($id);
        // dd($theater);
        $screens = Screen::all();
        return view('admin.theater-form', ['id' => $id, 'theater' => $theater, 'screens' => $screens]);
    }

    public function saveTheaterData(Request $request): RedirectResponse
    {
        //  dd($request->id);
        $request->validate($this->getValidationRules());
       
        $theater = Theater::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'location' => $request->location,
            ]
        );
        $screen = Screen::updateOrCreate(
            [
                'name' => $request->screen_name,
                'capacity' => $request->capacity,
                'theater_id' =>$request->id
            ]
        );
    
           // Associate the screen with the theater
        //    $theater->screens()->sync([$screen->id]);

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
            'screen_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ];
    }
}
