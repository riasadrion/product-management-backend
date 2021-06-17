<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->paginate(5);
        return response()->json($categories);
    }

    public function get_categories()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return response()->json($categories);
    }


    public function store(Request $request)
    {
        $category = new Category;

        $category->name = $request->name;

        if($category->save()){
            return response()->json(['message' => 'Category Added!']);
        }else{
            return response()->json(['message' => 'Failed']);
        }
    }


    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;

        if($category->save()){
            return response()->json(['message' => 'Category Updated!']);
        }else{
            return response()->json(['message' => 'Failed']);
        }
    }

    public function destroy(Category $category)
    {
        if($category->delete()){
            return response()->json(['message' => 'Category Deleted!']);
        }else{
            return response()->json(['message' => 'Failed']);
        }
    }
}
