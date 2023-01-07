<?php
namespace App\Services;

use App\Models\Movie;
use App\Repositories\MovieRepository;

class MovieService
{
    protected $movieRepository;


    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getAll($request)
    {
        return $this->movieRepository->getAllMovies($request);
    }

    public function save($data)
    {
        return $this->movieRepository->storeMovie($data);
    }

    public function update($movie , $data)
    {
        return $this->movieRepository->updateMovie($movie , $data);
    }

    public function delete($movie)
    {
        return $this->movieRepository->deleteMovie($movie);
    }
}
