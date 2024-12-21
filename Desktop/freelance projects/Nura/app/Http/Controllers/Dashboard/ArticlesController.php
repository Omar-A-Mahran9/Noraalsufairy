<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreArticlesRequest;
use App\Http\Requests\Dashboard\UpdateArticlesRequest;
use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view_articles');

        if ($request->ajax())
        {
            $data = getModelData(model: new Articles());
      
             return response()->json($data);
        }

        return view('dashboard.articles.index');
    }



    public function create()
    {
        $this->authorize('create_articles');

        return view('dashboard.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticlesRequest $request)
    {
         $this->authorize('create_articles');
        $data=$request->validated();
        if ($request->file('main_image'))
        $data['main_image'] = uploadImage( $request->file('main_image') , "articles");

        Articles::create($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $article)
    {
        $this->authorize('show_articles');
        return view('dashboard.articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $article)
    {
        $this->authorize('update_articles');
   
        return view('dashboard.articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticlesRequest $request, Articles $article)
    {
        $this->authorize('update_articles');
        $data=$request->validated();
        if ($request->file('main_image'))
        {
            deleteImage( $article['main_image'] , "articles");
            $data['main_image'] = uploadImage( $request->file('main_image') , "articles");
        }

        $article->update($data);

    }

    public function destroy(Request $request,Articles $article)
    {
        $this->authorize('delete_articles');

        if($request->ajax())
        {
            $article->delete();
            deleteImage($article->main_image , 'articles' );
        }
    }
}
