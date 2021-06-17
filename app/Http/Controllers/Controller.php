<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function search(Request $request){

        $stripSpecialCharacters = array("%20");
        $specialCharactersStripped = str_replace($stripSpecialCharacters, " ", $request->keyword);
        $keywordArray = preg_split ("/\ /", $specialCharactersStripped);

        $result['response'] = 'success';

        $data = [];

        switch ($request->type) {
            case "category":
                foreach($keywordArray as $keyword => $value){
                    $tmpData = Category::where([['name', 'LIKE', '%' . $value . '%']])->paginate(5);
                    // Checking max result count and passing to array
                    if(count($tmpData) > count($data)){
                        $data = $tmpData;
                    }
                }
                $result['categories'] = $data;
                if(empty($data)){
                    $result['response'] = 'error';
                    $result['message'] = 'No result found!';
                    return response()->json($result);
                }else{
                    return response()->json($result);
                }
            break;

            case "subCategory":
                foreach($keywordArray as $keyword => $value){
                    $tmpData = SubCategory::where([['name', 'LIKE', '%' . $value . '%']])->with('category')->paginate(5);
                    // Checking max result count and passing to array
                    if(count($tmpData) > count($data)){
                        $data = $tmpData;
                    }
                }
                $subCategories = $data;
                if(empty($data)){
                    $result['response'] = 'error';
                    $result['message'] = 'No result found!';
                    return response()->json($result);
                }else{
                    return response()->json(['subCategories' => $subCategories]);
                }
            break;

            case "product":
                foreach($keywordArray as $keyword => $value){
                    $tmpData = Product::where([['name', 'LIKE', '%' . $value . '%']])->with(array(
                        'sub_category' => function($query){
                            $query->with('category');
                        }
                    ))->paginate(5);
                    // Checking max result count and passing to array
                    if(count($tmpData) > count($data)){
                        $data = $tmpData;
                    }
                }
                $products = $data;
                if(empty($data)){
                    $result['response'] = 'error';
                    $result['message'] = 'No result found!';
                    return response()->json($result);
                }else{
                    return response()->json($products);
                }
            break;
        }
    }

}
