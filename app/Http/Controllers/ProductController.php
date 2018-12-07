<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = app()->make('Product')->index();
        return view('products.list')->with('products', $products);
    }

    public function create()
    {
        return view('products.create');
    }
    
    public function store(ProductRequest $request){
        $validated = $request->validated();
        $product = app()->make('Product')->store($request);
        return redirect('products')->with('success', 'The product '.$product->name.' has been added');
    }
    
    public function update(ProductRequest $request, $id){
        $validated = $request->validated();
        $product = app()->make('Product')->update($request,$id);
        return redirect('products')->with('success', 'The product '.$product->name.' has been updated');
    }

    public function edit($id){
        $product = app()->make('Product')->edit($id);
        if($product){
            return view('products.edit')->with('product', $product);
        }else{
            return redirect('products')->with('danger','The product does not exist in database.');
        }
    }
    
    public function destroy($id)
    {
        $product = app()->make('Product')->destroy($id);
        if($product){
            return redirect('products')->with('success','The product has been deleted.');
        }else{
            return redirect('products')->with('danger','The product does not exist in database.');
        }
    }
    
    public function show($id){
        $product = app()->make('Product')->show($id);
        return view('products.details')->with('product', $product);
    }
}
