<?php
namespace App\Http\Controllers;

use App\Models\cabangs;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use App\Http\Requests\StorecabangsRequest;
use App\Http\Requests\UpdatecabangsRequest;

class CabangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Cabangs $model)
    {
        //

        return view('pages.cabangs.index', ['cabangs' => cabangs::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.cabangs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecabangsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecabangsRequest $request)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required|max:255'
        ]);

        // $validateData['id'] = auth()->user()->id;
        
        cabangs::create($validateData);

        return redirect('cabangs')->withStatus(__('Branchs successfully added.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cabangs  $cabangs
     * @return \Illuminate\Http\Response
     */
    public function show(Cabangs $cabang)
    {
        //

        return $cabang;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cabangs  $cabangs
     * @return \Illuminate\Http\Response
     */
    public function edit(cabangs $cabang)
    {
        //
        return view('pages.cabangs.edit', ['cabang' => $cabang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecabangsRequest  $request
     * @param  \App\Models\cabangs  $cabangs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecabangsRequest $request, cabangs $cabang)
    {
        //

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required|max:255'
        ]);

        // $validateData['id'] = auth()->user()->id;
        
        cabangs::where('id', $cabang->id)
            ->update($validateData);

        return redirect('cabangs')->withStatus(__('Branch edited.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cabangs  $cabangs
     * @return \Illuminate\Http\Response
     */
    public function destroy(cabangs $cabang)
    {
        //

        cabangs::destroy($cabang->id);
        return redirect('cabangs')->withStatus(__('Branch deleted.'));

    }
}
