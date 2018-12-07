<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;

class ProductServices{

    function index()
    {
        $products = \App\Model\Product::sortable()->paginate(10);
        return $products;
    }
    
    function edit($id)
    {
        $product = \App\Model\Product::find($id);
        if($product){
            return $product;
        }else{
            return false;
        }
    }
    
    function store($request){
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $path = Storage::putFile('public/products', $file);
        }
        $product= new \App\Model\Product;
        $product->name=$request->get('name');
        $product->price=$request->get('price');
        $product->description=$request->get('description');
        $product->picture=str_replace("public/products/","",$path);
        $product->save();
        return $product;
    }
    
    function update($request,$id){
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $path = Storage::putFile('public/products', $file);
        }
        $product = \App\Model\Product::find($id);
        $product->name=$request->get('name');
        $product->price=$request->get('price');
        $product->description=$request->get('description');
        $product->picture=str_replace("public/products/","",$path);
        $product->save();
        return $product;
    }
    
    function destroy($id)
    {
        $product = \App\Model\Product::find($id);
        if($product){
            $product->delete();
            return true;
        }else{
            return false;
        }
    }
    
    function show($id)
    {
        $product = \App\Model\Product::find($id);
        if($product){
            return $product;
        }else{
            return false;
        }
    }
    
}
