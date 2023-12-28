<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{
    public function movieForm(string $id) 
	{
		if($id == 'new') {
			$movie = false;
			return view('admin.movie-form',['id' => $id])->with(compact(['movie']));
		}
		else {
			$movie = Movie::findOrFail($id);
			return view('admin.movie-form',['id' => $id])->with(compact(['movie']));		
		}
    }



public function saveMovieData(Request $request): RedirectResponse
{
	// dd($request);
    $request->validate([
        'title' => 'required|string|max:255',
        'trailer_url' => 'required|string|max:255',
        'description' => 'required|string',
        'release_date' => 'required|date',
        'genre' => 'required|string',
        'directors' => 'required|string',
        'cast' => 'required|string',
        'duration' => 'required|integer|min:1',
        'language' => 'required|string',
        'country' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'trailer_url' => 'url',
        'rating' => 'required|string|max:10',
        'ticket_price' => 'required|numeric|min:0.01',
        'showtimes' => 'required|string',
        'theater_name' => 'required|string',
        'location' => 'required|string',
        'screen_number' => 'nullable|integer|min:1',
    ]);

    $input = $request->all();

    $imageName = null;
    if ($request->hasFile('image')) {
        $product_file_dir = 'movies-img-' . env('APP_ENV');
        $imageName = time() . '-' . rand(1, 99) . '.' . $request->file('image')->extension();
        $moveImage = $request->file('image')->storeAs($product_file_dir, $imageName);
    }

    $movieData = [
        'title' => $input['title'],
        'user_id' => auth()->user()->id,
        'trailer_url' => $input['trailer_url'],
        'image' => $imageName,
        'description' => $input['description'],
        'release_date' => $input['release_date'],
        'genre' => $input['genre'],
        'directors' => $input['directors'],
        'cast' => $input['cast'],
        'duration' => $input['duration'],
        'language' => $input['language'],
        'country' => $input['country'],
        'trailer_url' => $input['trailer_url'],
        'rating' => $input['rating'],
        'ticket_price' => $input['ticket_price'],
        'showtimes' => $input['showtimes'],
        'theater_name' => $input['theater_name'],
        'location' => $input['location'],
        'screen_number' => $input['screen_number'],
    ];

    $movie = Movie::updateOrCreate(['id' => $input['id']], $movieData);

    $status = ($request->id) ? 'update' : 'add';
    return redirect()->route('movies-list')->with('status', 'Movie ' . $movie->id . ' ' . $status . ' successfully!');
}

	
	public function deleteMovie(string $id): RedirectResponse 
	{
	 	$variant = Movie::findOrFail($id);
	    if($variant) {
		  $variant->delete();
		  return redirect()->route('movies-list')->with('status','Movie #'.$id.' delete successfully!');
	    }
		return redirect()->route('movies-list')->with('status','Not Found');
	}
}
