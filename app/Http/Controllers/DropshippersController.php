<?php

namespace App\Http\Controllers;

use App\Models\dropshippers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoredropshippersRequest;
use App\Http\Requests\UpdatedropshippersRequest;

class DropshippersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param \App\Models\dropshippers $model
     * @return \Illuminate\View\View
     */
    public function index(Dropshippers $model)
    {
        //
        return view('pages.dropshippers.index', ['dropshippers' => dropshippers::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.dropshippers.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredropshippersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredropshippersRequest $request)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required|max:255'
        ]);

        // $validateData['id'] = auth()->user()->id;
        
        dropshippers::create($validateData);

        return redirect('dropshippers')->withStatus(__('Dropshippers successfully added.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dropshippers  $dropshippers
     * @return \Illuminate\Http\Response
     */
    public function show(dropshippers $dropshipper)
    {
        //
        // $dropshippers = DB::table('dropshippers')->get();
        // return view('pages.dropshippers.index', ['dropshippers' => $dropshippers]);

        return $dropshipper;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dropshippers  $dropshippers
     * @return \Illuminate\Http\Response
     */
    public function edit(dropshippers $dropshipper)
    {
        //
        return view('pages.dropshippers.edit', ['dropshipper' => $dropshipper]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedropshippersRequest  $request
     * @param  \App\Models\dropshippers  $dropshippers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedropshippersRequest $request, dropshippers $dropshipper)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required|max:255'
        ]);

        // $validateData['id'] = auth()->user()->id;
        
        dropshippers::where('id', $dropshipper->id)
            ->update($validateData);

        return redirect('dropshippers')->withStatus(__('Dropshippers edited.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dropshippers  $dropshippers
     * @return \Illuminate\Http\Response
     */
    public function destroy(dropshippers $dropshipper)
    {
        //
        dropshippers::destroy($dropshipper->id);
        return redirect('dropshippers')->withStatus(__('Dropshippers deleted.'));
    }
}
