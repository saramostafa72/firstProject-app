<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function index(){

        $products=Product::get();
        return response()->json(['data' => $products]);

    }

    function show($id)
    {
        $product=Product::find($id);
        if($product)
        {
            return response()->json(['data'=>$product]);
        }
        return response()->json(['message'=>'PRODUCT NOT FOUND']);

    }

    function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price' => 'required|numeric|min:0',
            'availability'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' =>'required|numeric|exists:categories,id',

        ]);

        $input = $request->except('_method','_token');
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imagename);
            $input['image'] = $imagename;
        }
       try {
            $product= Product::create($input);
            return response()->json(['data'=>$product]);

        } catch (\Throwable $th) {

            return response()->json(['message'=>'SERVER IS NOT AVAILABLE NOW' ,"status"=>503]);
        }
    }

    function edit($id,Request $request)
    {
        $product=Product::find($id);

        $request->validate([
            'name'=>'string|max:20|min:3',
            'price' => 'numeric|min:0',
        ]);

        $input = $request->except('_method','_token');
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imagename);
            $input['image'] = $imagename;
        }

        if($product)
        {
            $product->update($input);
            return response()->json(['data'=>$product,'message'=>"PRODUCT UPDATED SUCCESSFULLY"]);
        }

        return response()->json(['message'=>'PRODUCT NOT FOUND']);


    }
    function destroy($id)
    {
        $product=Product::find($id);
        if($product)
        {
            $product->delete();
            return response()->json(['data'=>$product,'message'=>'PRODUCT DELETED SUCCESSFULLY']);

        }
        return response()->json(['message'=>'PRODUCT NOT FOUND']);

    }


}
