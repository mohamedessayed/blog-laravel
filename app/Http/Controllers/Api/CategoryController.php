<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //

    function store(Request $request) : object {
        $valitaion = Validator::make($request->all(),[
            'category_title'=>'required|string|min:3'
        ],[],[
            "category_title"=>'category name'
        ]);


        if ($valitaion->fails()) {
            # code...

            return response()->json(['status'=>false, 'message'=>$valitaion->errors()]);
        }

        Category::create([
            'category_name'=>$request->category_title,
        ]);

        return response()->json(['status'=>true, 'message'=>'created Successfully!']);

    }
}
