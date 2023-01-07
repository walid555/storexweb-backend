<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Movie extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'rate',
        'category_id',
    ];

    public function getImgAttribute()
    {
        $file = $this->getMedia('movie_images')->last();

        if ($file) {
            $file->url = $file->getUrl();
            $file->localUrl = asset('storage/' . $file->id . '/' . $file->file_name);
        }

        return $file;
    }

    public function scopeOrder($query)
    {
        $query->orderBy('created_at' , 'desc');
    }

    public function scopeSearch(Builder $query, $request)
    {
        if (!isset($request->search)) return $query;

        return $query->where('title', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')
            ->orWhere('rate', 'like', '%' . $request->search . '%')
            ->orWhereHas('category',function ($q) use ($request){
                $q->where('title', 'like', '%' . $request->search . '%');
            });
    }

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
}
