<?php

namespace App\Http\Controllers;

use App\Models\roles;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorerolesRequest;
use App\Http\Requests\UpdaterolesRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */

    public function index(Roles $model)
    {
        //

        return  view('pages.roles.index', ['roles' => roles::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorerolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorerolesRequest $request)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        // $validateData['id'] = auth()->user()->id;
        
        roles::create($validateData);

        return redirect('roles')->withStatus(__('Roles successfully added.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $role)
    {
        // parameter = roles $roles
        // $data = roles::all();
        // return view('roles.edit', ['roles' => $data]);

        return $role;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(roles $role)
    {
        //
        return view('pages.roles.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdaterolesRequest  $request
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdaterolesRequest $request, roles $role)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        // $validateData['id'] = auth()->user()->id;
        
        roles::where('id', $role->id)
            ->update($validateData);

        return redirect('roles')->withStatus(__('Roles edited.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(roles $role)
    {
        //

        roles::destroy($role->id);
        return redirect('roles')->withStatus(__('Roles successfully deleted.'));
    }
}
