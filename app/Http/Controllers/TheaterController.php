<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use App\Models\Screen;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TheaterController extends Controller
{

    public function openScreenModal($theaterId)
    {
        $theater = Theater::findOrFail($theaterId);

        return view('admin.screen-modal', compact('theater'));
    }

    public function theaterForm(string $id)
    {
        $theater = ($id == 'new') ? new Theater() : Theater::with('screens')->findOrFail($id);
      
        return view('admin.theater-form', ['id' => $id, 'theater' => $theater]);
    }

    public function saveTheaterData(Request $request): RedirectResponse
    {
        // dd($request->capacity);
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
