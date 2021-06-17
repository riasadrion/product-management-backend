<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->with(array(
            'sub_category' => function($query){
                $query->with('category');
            }
        ))->paginate(5);
        return response()->json($products);
    }

    public function show($product)
    {
        $product = Product::with('images')->find($product);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->sub_category_id = $request->sub_category_id;
        $product->name = $request->name;
        if($product->save()){
            if($request->images){
                $totalImages = count($request->images);
                for($i = 0; $i<$totalImages;$i++){
                    $name = time().'.' . explode('/', explode(':', substr($request->images[$i], 0, strpos($request->images[$i], ';')))[1])[1];
                    \Image::make($request->images[$i])->save(public_path('storage/product-images/').$name);
                    $image = new Image;
                    $image->product_id = $product->id;
                    $image->name = $name;
                    $image->save();

                }
                return "success";
            }
        }

    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        if($product->delete()){
            return response()->json(['message' => 'Product Deleted!']);
        }else{
            return response()->json(['message' => 'Failed']);
        }
    }
}
