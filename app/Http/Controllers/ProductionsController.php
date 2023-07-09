<?php

namespace App\Http\Controllers;

use App\Models\productions;
use App\Http\Requests\StoreproductionsRequest;
use App\Http\Requests\UpdateproductionsRequest;

class ProductionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productions  $productions
     * @return \Illuminate\Http\Response
     */
    public function show(productions $productions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productions  $productions
     * @return \Illuminate\Http\Response
     */
    public function edit(productions $productions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductionsRequest  $request
     * @param  \App\Models\productions  $productions
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductionsRequest $request, productions $productions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productions  $productions
     * @return \Illuminate\Http\Response
     */
    public function destroy(productions $productions)
    {
        //
    }
}
