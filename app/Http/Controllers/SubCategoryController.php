<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::orderBy('name', 'asc')->with('category')->paginate(5);
        $categories = Category::orderBy('name', 'asc')->get();
        return response()->json(['subCategories' => $subCategories, 'categories' => $categories]);
    }

    public function get_sub_categories($category_id)
    {
        $subCategories = SubCategory::orderBy('name', 'asc')->where('category_id', $category_id)->get();
        return response()->json($subCategories);
    }


    public function store(Request $request)
    {
        $sub_category = new SubCategory;
        $sub_category->category_id = $request->category_id;
        $sub_category->name = $request->name;

        if($sub_category->save()){
            return response()->json(['message' => 'Sub Category Added!']);
        }else{
            return response()->json(['message' => 'Failed']);
        }
    }


    public function update(Request $request, SubCategory $sub_category)
    {
        $sub_category->category_id = $request->category_id;
        $sub_category->name = $request->name;

        if($sub_category->save()){
            return response()->json(['message' => 'Sub Category Updated!']);
        }else{
            return response()->json(['message' => 'Failed']);
        }
    }

    public function destroy(SubCategory $sub_category)
    {
        if($sub_category->delete()){
            return response()->json(['message' => 'Sub Category Deleted!']);
        }else{
            return response()->json(['message' => 'Failed']);
        }
    }
}
