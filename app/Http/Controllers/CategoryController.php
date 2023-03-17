<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResources;
use App\Models\Category;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return CategoryResources::collection(
        Category::all()
       );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $request->validated($request->all());
        $category = Category::create([
            'name'          =>  $request->name,
            'image'         =>  $request->has('image')? $request->image: '',
            'level'         =>  $request->has('level')? $request->level: Category::count(),
            'parent_id'     =>  $request->has('parent_id')? $request->parent_id: -1,
            'is_active'     =>  $request->has('is_active')? $request->is_active: 0,
        ]);
        return $category;
    }

    public function show(Category $category)
    {
        return new CategoryResources($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->validated($request->all());

        $category->name     = $request->name;
        $category->image     = $request->has('image')? $request->image: $category->image;
        $category->level     = $request->has('level')? $request->level: $category->level;
        $category->parent_id     = $request->has('parent_id')? $request->parent_id: $category->parent_id;
        $category->is_active     = $request->has('is_active')? $request->is_active: $category->is_active;

        $category->update();
        return $this->success($category, 'Category successfuly updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->success('', 'Category was deleted successfuly.', 404);
    }
}
