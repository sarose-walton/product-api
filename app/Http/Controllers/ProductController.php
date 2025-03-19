<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function insertProduct(Request $request){
        $rules = array(
            'name'=> 'required | min: 2 | max: 500',
            'price' => 'required',
            "category" => 'required | min: 2 | max: 500',
            "details" => 'required | min: 2 | max: 500',
            "quantity" => 'required'
        );
        $validation = Validator::make($request->all(), $rules);
        if($validation->fails()){
            return $validation->errors();
        }else{
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->category = $request->category;
            $product->details = $request->details;
            $product->quantity = $request->quantity;
    
            if($product->save()){
                return ["result" => "Product added"];
            }else{
                return ["result"=> "Added Failed"];
            }
        }
    }

    function updateProduct(Request $request){
        $product = Product::find($request->id);
        $product->name= $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->details = $request->details;
        $product->quantity = $request->quantity;

        if($product->save()){
            return ["result"=> "Product Updated Success."];
        }else{
            return ["result"=> "Product Updated Failed."];
        }
    
    }
    function searchProduct($name){
        $product = Product::where('name', 'like', "%$name%")->get();
        if($product){
            return ["result"=> $product];
        }else{
            return ["result" => "Data not found"];
        }

    }
    function searchProductId($id){
        $product = Product::where('id', '=', "$id")->get();
        if($product){
            return ["result"=> $product];
        }else{
            return ["result" => "Data not found"];
        }

    }
    function deleteProduct($id){
        $product = Product::destroy($id);
        if($product){
            return ["result"=> "Product record deleted"];
        }else{
            return ["result" => "Product record not deleted"];
        }
    }


}
