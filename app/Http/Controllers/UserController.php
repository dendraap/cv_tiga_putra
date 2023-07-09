<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreuserRequest;
use App\Http\Requests\UpdateuserRequest;

class UserController extends Controller
{

    use RegistersUsers;
    /**
     * Display a listing of the users
     *
     * @return \Illuminate\Http\Response
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => user::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(user $data)
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreuserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreuserRequest $request)
    {
        //
        $validateData = $request->validate([
            // 'name' => 'required|max:255',
            // 'email' => 'required|max:255',
            // 'role' => 'required',
            // 'telepon' => 'required',
            // 'password' => 'required',

            // 'name' => $request['name'],
            // 'email' => $request['email'],
            // 'role' => $request['role'],
            // 'telepon' => $request['telepon'],
            // 'password' => Hash::make($request['password']),

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // $validateData['id'] = auth()->user()->id;
        
        // user::create($validateData);

        user::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'telepon' => $request['telepon'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('user')->withStatus(__('User successfully added.'));
    }

    public function option()
    {
        $options = roles::all();
        return view('users.create', ['options' => $options]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // parameter = roles $roles
        // $data = roles::all();
        // return view('roles.edit', ['roles' => $data]);

        return $user;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user, roles $role)
    {
        //

        $option = roles::all();
        return view('users.edit', ['user' => $user, 'options' =>$option, 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateuserRequest  $request
     * @param  \App\Models\user  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateuserRequest $request, user $user)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'role' => 'required',
            'telepon' => 'required',
            'password' => 'required',
        ]);

        // $validateData['id'] = auth()->user()->id;
        
        user::where('id', $user->id)
            ->update($validateData);

        return redirect('user')->withStatus(__('User edited.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //

        user::destroy($user->id);
        return redirect('user')->withStatus(__('User successfully deleted.'));
    }
}
