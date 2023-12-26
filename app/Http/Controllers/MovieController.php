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
	    $input = $request->input();
		
		if (isset($request->image)) {
		 	$product_file_dir = 'movies-img-'.env('APP_ENV');
		 	$imageName = time().'-'.rand(1,99).'.'.$request->file('image')->extension();  
		 	$moveImage = Storage::putFileAs($product_file_dir,$request->file('image'),$imageName);
		}
		$movie = Movie::updateOrCreate(
		    [
			'id'   => ($request->id) ? $request->id : null,
			],
			[
	        'name' => $request->name,
	        'user_id' => auth()->user()->id,
		    'link' => $request->link,
		    'image' => (isset($imageName)) ? $imageName : null,
			'description' => $request->description,
			]
	    );
		
		$status = 'add/update';
        return redirect()->route('movies-list')->with('status','Movie '.$movie->id.' add/update successfully!');	
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
