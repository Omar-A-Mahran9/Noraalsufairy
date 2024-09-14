<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function all()
    {
        $news = NewResource::collection(News::get());

        return $news;
    }

    public function highlighted()
    {
        $news = NewResource::collection(News::whereHighlighted(true)->get());

        return $news;
    }

    public function singleNew(News $news)
    {
        return new NewResource($news);
    }
}
