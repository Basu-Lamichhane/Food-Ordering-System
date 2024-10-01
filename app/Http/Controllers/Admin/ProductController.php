<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use App\Services\MediaService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'description' => ['required'],
            'price' => ['required','numeric'],
            'isVeg' => ['required','boolean'],
            'isDrink' => ['required','boolean'],
            'onStock' => ['required','boolean'],
            'category_id' => ['required'],
            'image' => ['required','image'],

        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->isVeg = $request->isVeg;
        $product->isDrink = $request->isDrink;
        $product->onStock = $request->onStock;
        $product->category_id = $request->category_id;
        $product->media_id= MediaService::upload($request->image);
        $product->save();
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product has been added sucessfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::all();
        return view('admin.products.edit')->with('categories',$categories)->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'description' => ['required'],
            'price' => ['required','numeric'],
            'isVeg' => ['required','boolean'],
            'isDrink' => ['required','boolean'],
            'onStock' => ['required','boolean'],
            'category_id' => ['required'],
 
        ]);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->isVeg = $request->isVeg;
        $product->isDrink = $request->isDrink;
        $product->onStock = $request->onStock;
        $product->category_id = $request->category_id;
       if(!empty($request->image))
       {
        $product->media_id= MediaService::upload($request->image);
       }
        $product->save();
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product has been Edited sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', "Product: $product->name  has been deleted sucessfully!");
    }
}
