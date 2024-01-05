<?php

namespace App\Http\Controllers;
use App\Models\Show;
use App\Models\Movie;
use App\Models\Screen;
use Illuminate\Http\Request;
use App\Models\Theater;
use Illuminate\Http\RedirectResponse;

class ShowController extends Controller
{
    // public function index()
    // {
    //     $shows = Show::all();
    //     return view('admin.shows-list', compact('shows'));
    // }

    public function showForm(string $id)
    {
       
        $show = ($id == 'new') ? new Show() : Show::findOrFail($id);
        $movies = Movie::all();
        $theaters = Theater::with('screens')->get();
        // dd($theaters);
        

        return view('admin.show-form', ['id' => $id, 'show' => $show, 'movies' => $movies, 'theaters' => $theaters]);
    }

    public function saveShowData(Request $request): RedirectResponse
    {
        // dd($request);
        $request->validate($this->getValidationRules());

        $show = Show::updateOrCreate(
            ['id' => $request->id],
            [
                'movie_id' => $request->movie_id,
                'screen_id' => $request->screen_id,
                'show_time' => $request->showtime,
                'start_date' => $request->start_date,
            ]
        );

        $status = ($request->id) ? 'update' : 'add';
        return redirect()->route('shows-list')->with('status', 'Show ' . $show->id . ' ' . $status . ' successfully!');
    }

    public function deleteShow(string $id): RedirectResponse
    {
        $show = Show::findOrFail($id);

        if ($show) {
            $show->delete();
            return redirect()->route('shows-list')->with('status', 'Show #' . $id . ' deleted successfully!');
        }

        return redirect()->route('shows-list')->with('status', 'Not Found');
    }

    private function getValidationRules()
    {
        return [
            'movie_id' => 'required|exists:movies,id',
            'screen_id' => 'required|exists:screens,id',
            'showtime' => 'required',
            'start_date' => 'required|date',
        ];
    }
}
