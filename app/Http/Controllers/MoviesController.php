<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Movies\CreateMovieRequest;
use App\Http\Requests\Admin\Movies\UpdateMovieRequest;
use App\Models\Category;
use App\Models\Movie;
use App\Repositories\MovieRepository;
use App\Services\MovieService;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    protected $movieService;

    public function __construct()
    {
        $this->movieService = new MovieService(new MovieRepository());
    }

    public function index(Request $request)
    {
        try {
            $movies = $this->movieService->getAll($request);
            return view('admin.movies.index', get_defined_vars());

        } catch (\Exception $e) {
            return redirect()->back()->with(['alert-message' => 'sorry please try later ', 'alert-type' => 'error']);
        }

    }

    public function create()
    {
        $categories = Category::select(['id' , 'title'])->get();
        return view('admin.movies.create' , get_defined_vars());
    }

    public function store(CreateMovieRequest $request)
    {
        try {

            $movie = $this->movieService->save($request->only(['title' , 'description' , 'rate' , 'category_id']));

            if ($request->hasFile('image')) {

                $movie->addMediaFromRequest('image')->toMediaCollection('movie_images');
            }

            return redirect()->route('admin:movies.index')->with(['alert-message' => 'Movie saved successfully ', 'alert-type' => 'success']);

        } catch (\Exception $e) {
            return redirect()->back()->with(['alert-message' => 'sorry please try later ', 'alert-type' => 'error']);
        }

    }

    public function edit(Movie $movie)
    {
        $categories = Category::select(['id' , 'title'])->get();

        return view('admin.movies.edit' , get_defined_vars());
    }

    public function update(Movie $movie , UpdateMovieRequest $request)
    {
        try {

            $this->movieService->update($movie ,$request->only(['title' , 'description' , 'rate' , 'category_id']));

            if ($request->hasFile('image')) {

                $movie->addMediaFromRequest('image')->toMediaCollection('movie_images');
            }

            return redirect()->route('admin:movies.index')->with(['alert-message' => 'Movie updated successfully ', 'alert-type' => 'success']);

        } catch (\Exception $e) {
            return redirect()->back()->with(['alert-message' => 'sorry please try later ', 'alert-type' => 'error']);
        }

    }

    public function destroy(Movie $movie)
    {
        try {

            $this->movieService->delete($movie);
            return redirect()->route('admin:movies.index')->with(['alert-message' => 'Movie deleted successfully ', 'alert-type' => 'success']);

        } catch (\Exception $e) {
            return redirect()->back()->with(['alert-message' => 'sorry please try later ', 'alert-type' => 'error']);
        }

    }
}
