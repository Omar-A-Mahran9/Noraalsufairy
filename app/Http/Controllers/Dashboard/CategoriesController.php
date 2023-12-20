<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreCategoryRequest;
use App\Http\Requests\Dashboard\UpdateCategoryRequest;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Categories;
use App\Models\Category;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $this->authorize('view_categories');
        if ( $request->ajax() ) {
 
            $brands = getModelData( model: new Category() , searchingColumns: ['name_ar', 'name_en'] );

            return response()->json($brands);
        }
        return view('dashboard.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create_categories');
        $models = CarModel::select('id','name_' . getLocale())->get();

        return view('dashboard.categories.create',compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('create_categories');
        $data = $request->validated();
        Category::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
         $this->authorize('show_categories');

        return view('dashboard.categories.show',compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    public function edit(Category $category)
    {
        $this->authorize('update_categories');
        $models = CarModel::select('id','name_' . getLocale())->get();

        return view('dashboard.categories.edit',compact('category','models'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->authorize('update_categories');
        $data = $request->validated();
        $category->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
    public function destroy(Request $request,Category $category)
    {
    $this->authorize('delete_categories');
            $category->delete();
        }

}