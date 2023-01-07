<?php
namespace App\Repositories;

use App\Models\Movie;

class MovieRepository
{
    public function getAllMovies($request)
    {
        $movies = Movie::query();

        if (isset($request->search))  $movies->search($request);

        return $movies->select(['id','title' , 'description' , 'rate' , 'category_id' , 'created_at'])->order()->paginate(10);
    }

    public function storeMovie($data)
    {
        $movie = Movie::create($data);
        return $movie;
    }

    public function updateMovie($movie ,$data)
    {
        return $movie->update($data);
    }

    public function deleteMovie($movie)
    {
        return $movie->delete();
    }
}
