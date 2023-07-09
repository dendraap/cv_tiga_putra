<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreproductsRequest;
use App\Http\Requests\UpdateproductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Products $model)
    {
        //
        return view('pages.products.index', ['products' => products::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.products.create', ['products' => products::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductsRequest $request)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        // $validateData['id'] = auth()->user()->id;
        
        products::create($validateData);

        return redirect('products')->withStatus(__('Products successfully added.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
        return $products;

        // $products = DB::table('products')->get();
        // return view('pages.products.index', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $product)
    {
        //
        // $products = products::all();
        return view('pages.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductsRequest  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductsRequest $request, products $product)
    {
        //

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        // $validateData['id'] = auth()->user()->id;
        
        products::where('id', $product->id)
            ->update($validateData);

        return redirect('products')->withStatus(__('Products edited.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $product)
    {
        //
        products::destroy($product->id);
        return redirect('products')->withStatus(__('Products deleted.'));
    }
}
