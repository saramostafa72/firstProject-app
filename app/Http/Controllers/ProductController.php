<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function index(){

        $products=Product::get();
        return view('product.index',['products'=>$products]);

    }
    function show($id){

        $product = Product::where('id',$id)->first();
        return view('product.show',compact('product'));
    }

    function update($id)
    {
        $product=Product::where('id',$id)->first();
        return view('product.update',compact('product'));

    }
    function edit($id,Request $request)
    {
        $product=Product::where('id',$id)->first();
        $input = $request->except('_method','_token');
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imagename);
            $input['image'] = $imagename;
        }
        $product->update($input);
        return redirect()->route('product.index');
    }

    function create()
    {
        return view('product.create');

    }
    function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price' => 'required|numeric|min:0',
            'availability'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        Product::create($input);
        return redirect()->route('product.index');

    }
    function destroy($id)
    {
        Product::where('id',$id)->first()->delete();
       return redirect()->route('product.index');
    }

}
